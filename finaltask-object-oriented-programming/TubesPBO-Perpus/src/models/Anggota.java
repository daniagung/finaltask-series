package models;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.concurrent.TimeUnit;


/**
 *
 * @author Thoriq & DedeKiswanto
 * Ket : 1. PengembalianHitungDenda
 */

public class Anggota extends Orang implements Serializable {
    //CLASS VARIABLE
    private ArrayList<Peminjaman> riwayatPeminjaman = new ArrayList();
    private String idAnggota;
    private String tanggalPendaftaran;
    private static int countAnggota = 1;
    //Maksimal Anggota pinjam barang, akan berkurang;
    private int sisaPinjam = 5;
    

    // CONSTRUCTOR
    public Anggota(String idAnggota, String name){
        super(name);
        this.idAnggota = idAnggota;
    }
    
    public Anggota(String idAnggota, String name, int countPinjam){
        super(name);
        this.idAnggota = idAnggota;
        this.sisaPinjam = countPinjam;
    }
    
    public Anggota(String idAnggota, String name, String tanggalPendaftaran){
        super(name);
        this.idAnggota = idAnggota;
        this.tanggalPendaftaran = tanggalPendaftaran;
    }
    
    // METHOD
    public String createPeminjaman(Date tanggal){
        Peminjaman pjm;
        //Object created di dalam method (komposisi)
        String id = Integer.toString(riwayatPeminjaman.size() + 1);
        pjm = new Peminjaman("PJM" + id, tanggal);
        //Insert it to array list
        riwayatPeminjaman.add(pjm);
        return pjm.getId();
    }
    
    public double pengembalianPeminjaman(String idPinjaman, Date tanggalPengembalian){
        double denda = 0; //Inisialisasi
        try {
            Peminjaman pjm = getPeminjamanById(idPinjaman);        
            pjm.setTanggalPengembalian(tanggalPengembalian);
            pjm.setStatusPeminjaman(false);

            //Mengembalikan Stock
            for (int i = 0; i < pjm.totalbuku(); i++) {
                pjm.getBukuByIndex(i).tambahSiSaBuku();
                this.sisaPinjam++;
            }
            
            if(tanggalPengembalian.after(pjm.getTanggalTenggat())){
                long time = tanggalPengembalian.getTime()-pjm.getTanggalTenggat().getTime();
                long days = TimeUnit.MILLISECONDS.toDays(time);
                denda = 1000 * days;
                pjm.setBiayaDenda(denda);
            }else
                denda = 0;

        } catch(NullPointerException ne){
            return -1;
        }
        
        return denda;
    }
    
    public Peminjaman getPeminjamanByIndex(int idx) {
        try {
            return riwayatPeminjaman.get(idx);
        } catch (Exception e) {
            return null; //Jika tidak ditemukan; indexoutofbonds
        }
    }
    
    public Peminjaman getPeminjamanById(String idPeminjaman){
        for(Peminjaman pjm : riwayatPeminjaman){
            if(pjm.getId().equals(idPeminjaman))
                return pjm;
        }
        return null; //Jika tidak ditemukan
    }
    
    public String getTanggalPendaftaran(){
        return tanggalPendaftaran;
    }
    
    public String getId(){
        return idAnggota;
    }
    
    public void setId(String idAnggota){
        this.idAnggota = idAnggota;
    }
    
    public int totalPeminjaman() {
        return riwayatPeminjaman.size();
    }
    
    public ArrayList<Peminjaman> getRiwayatPjm(){
        return riwayatPeminjaman;
    }
    
    public int getSisaPinjam(){
        return sisaPinjam;
    }
    
    public void setSisaPinjam(int countPinjam){
        this.sisaPinjam = countPinjam;
    }

    public ArrayList<Peminjaman> getRiwayatPeminjaman() {
        return riwayatPeminjaman;
    }
    
    
    
}
