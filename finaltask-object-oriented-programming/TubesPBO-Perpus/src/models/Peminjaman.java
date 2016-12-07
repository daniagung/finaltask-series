package models;


// Author Fachri Ul Albab & Thoriq & Dede
// Keterangan : 
//  1. +7 Tanggal Kembali
//  2. Hitung Denda

import java.io.Serializable;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;

public class Peminjaman implements Serializable {
    
    //Class Variable / Attribute
    private ArrayList<Buku> listBuku = new ArrayList();
    private String idPeminjaman;
    private Date tanggalPinjam;
    private Date tanggalTenggat;
    private Date tanggalPengembalian;
    private boolean statusPeminjaman;
    private double biayaDenda = 0;
    private static int countPinjam = 1;

    // CONSTRUCTOR //
    public Peminjaman(String idPeminjaman, Date tanggalPinjam){
        this.idPeminjaman = idPeminjaman;
        this.tanggalPinjam = tanggalPinjam;
        this.tanggalPengembalian = null;
        //True berarti peminjaman masih aktif
        this.statusPeminjaman = true;
        
        //Add 7 Days to tanggalPinjam sebagai tanggal Pengembalian
        //using java.util.calender
        Calendar cal = Calendar.getInstance();
        cal.setTime(tanggalPinjam);
        cal.add(Calendar.DATE, 7);
        this.tanggalTenggat = cal.getTime();
    }

    // CLASS METHOD //
    public void addBuku(Buku b){
        b.kurangSisaBuku();
        listBuku.add(b);
    }

    public void removeBukuByObject(Buku b){
        if(listBuku.size() > 0){    
            listBuku.remove(b);
            b.kurangSisaBuku();
        }else{
            System.out.println("Tidak ada buku pada peminjaman ID : " + getId() );
        }
    }

    public void removeBukuByIndex(int idx){
        if(listBuku.size() > 0){    
            listBuku.remove(idx);
        }else{
            System.out.println("Tidak ada buku yang dipinjam");
        }
    }
    
    public void removeBukuById(String idBuku){
        Buku buku = getBukuById(idBuku);
        removeBukuByObject(buku);
    }

    public Buku getBukuByIndex(int idx){
        try {
            return listBuku.get(idx);
        } catch (Exception e) {
            return null; //Jika tidak ditemukan
        }
    }   

    public Buku getBukuById(String id){
        for(Buku bk : listBuku){
            if(bk.getId() == id)
                return bk;
        }
        return null; //Jika tidak ditemukan
    }

    public String getId(){
        return idPeminjaman;
    }

    public Date getTanggalTenggat(){
        return tanggalTenggat;
    }

    public Date getTanggalPengembalian(){
        return tanggalPengembalian;
    }

    public Date getTanggalPinjam(){
        return tanggalPinjam;
    }

    public boolean getStatus(){
        return statusPeminjaman;
    }

    public double getBiayaDenda(){
        return biayaDenda;
    }

    public void setTanggalPinjam(Date tanggalPinjam){
        this.tanggalPinjam = tanggalPinjam;
    }

    public void setTanggalTenggat(Date tanggalTenggat){
        this.tanggalTenggat = tanggalTenggat;
    }

    public void setTanggalPengembalian(Date tanggalPengembalian){
        this.tanggalPengembalian = tanggalPengembalian;
    }

    public void setStatusPeminjaman(boolean statusPeminjaman){
        this.statusPeminjaman = statusPeminjaman;
    }

    public void setId(String IdPeminjaman){
        this.idPeminjaman = IdPeminjaman;
    }

    public void setBiayaDenda(double biayaDenda){
        this.biayaDenda = biayaDenda;
    }
    
    public int totalbuku(){
        return listBuku.size();
    }
    
    public ArrayList<Buku> getListBuku(){
        return this.listBuku;
    }
    
    @Override
    public String toString() {
        SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
        return idPeminjaman + " - " + dateFormat.format(tanggalPinjam);
    }
}
