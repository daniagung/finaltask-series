/*
 * Class Petugas
 * Ket : Tested!!!!!!! 
 */
package models;

import java.util.Date;
import java.io.Serializable;

/**
 *
 * @author kiswanto-d
 */
public class Petugas extends Orang implements Serializable {
    
    private String idPetugas;
    private static int countPetugas = 1;
    
    //Constructor
    public Petugas(String idPetugas, String nama) {
        super(nama);
        this.idPetugas = idPetugas;
    }
    
    public void addPinjamanAnggota(Anggota a){
        Date now = new Date();
        a.createPeminjaman(now);
    }
    
    public void pengembalianPinjamanAnggota(Anggota a, String idPinjaman, Date tanggalPengembalian){
        a.pengembalianPeminjaman(idPinjaman, tanggalPengembalian);
    }
    
    public void changeStatusPinjaman(Peminjaman pjm, boolean status){
        pjm.setStatusPeminjaman(status);
    }
    
    public void addBarangPinjaman(Peminjaman pjm, Buku buku){
        pjm.addBuku(buku);
    }
    
    public void removeBarangPinjaman(Peminjaman pjm, String idBuku){
        Buku buku = pjm.getBukuById(idBuku);
        pjm.removeBukuByObject(buku); //Method ini belum ditulis di dalam ClassDiagram
    }
    
    public boolean cekStatusPinjaman(Peminjaman pjm){
        return pjm.getStatus();
    }
    
    public String getId(){
        return idPetugas;
    }
    
}