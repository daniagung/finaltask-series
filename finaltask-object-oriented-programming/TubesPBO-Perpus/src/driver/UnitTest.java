package driver;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import models.Anggota;
import models.Buku;
import models.Petugas;


/**
 *
 * @author g40
 */
public class UnitTest {
    
    public static void main(String[] args) throws ParseException {
        
        //Format Date
        SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
        Date date = null;
        
        // CLASS [BUKU] TESTING CASE
        // Create Object Buku
        Buku buku1 = new Buku("BK1", "Antara Aku dan Dia", 4);
        Buku buku2 = new Buku("BK2","Kekasihku yang telah tiada", 10, "Budi Rahardjo");
                
        // CLASS [ANGGOTA] TESTING CASE
        // Create Object Anggota
        Anggota anggota1 = new Anggota("AGT1","Andrew Darwis");
        int maxPinjam;
        
        // CLASS [PEMINJAMAN] TESTING CASE
        // Parsing date Tanggal Pinjam
        try {
           date = dateFormat.parse("02-02-2016");
        } catch (Exception e) {
           System.out.println("error at parsing");
        }
        
        // Create Object Pinjaman in Anggota Object (Composition)
        anggota1.createPeminjaman(date);        
        
        // CLASS [PETUGAS] TESTING CASE
        // Create Object Petugas
        Petugas petugas = new Petugas("PTG","Bambang");
        
        // Penambahan Pinjaman via Object Petugas
        petugas.addPinjamanAnggota(anggota1);
        
        // Penambahan Barang Buku pada Peminjaman Anggota 1 
        petugas.addBarangPinjaman(anggota1.getPeminjamanById("PJM2"), buku2); 
        petugas.addBarangPinjaman(anggota1.getPeminjamanById("PJM1"), buku2);        
        petugas.addBarangPinjaman(anggota1.getPeminjamanById("PJM1"), buku1);
        // Parsing date tanggal kembali
        try {
           date = dateFormat.parse("15-03-2016");
        } catch (Exception e) {
           System.out.println("error at parsing");
        }
        
        // kembalian Pinjaman suatu Anggota oleh Petugas 
        //petugas.kembaliPinjamanAnggota(anggota1, "PJM1" , date);
        
        // Parsing date tanggal pengembalian
        try {
           date = dateFormat.parse("20-03-2016");
        } catch (Exception e) {
           System.out.println("error at parsing");
        }
        
        // Pengembalian Pinjaman suatu Anggota oleh Petugas 
        petugas.pengembalianPinjamanAnggota(anggota1, "PJM1" , date);

        System.out.println("Data Peminjaman Anggota 1 : ");
        System.out.println("Nama : " + anggota1.getNama());
        System.out.println("Riwayat Peminjaman : ");
        
        for (int i = 0; i < anggota1.totalPeminjaman(); i++) {
            System.out.println("\tID Peminjaman : " + anggota1.getPeminjamanByIndex(i).getId());
            System.out.println("\tTanngal Peminjaman : " + anggota1.getPeminjamanByIndex(i).getTanggalPinjam());
            System.out.println("\tTanngal Kembali : " + anggota1.getPeminjamanByIndex(i).getTanggalTenggat());
            System.out.println("\tTanngal Pengambalian : " + anggota1.getPeminjamanByIndex(i).getTanggalPengembalian());
            System.out.println("\tStatus Peminjaman : " + anggota1.getPeminjamanByIndex(i).getStatus());
            System.out.println("\tBiaya Denda : " + String.valueOf(anggota1.getPeminjamanByIndex(i).getBiayaDenda()));
            System.out.println("\tList Buku : ");
            for (int j = 0; j < anggota1.getPeminjamanByIndex(i).totalbuku(); j++) {
                System.out.println("\t\tID Buku : " + anggota1.getPeminjamanByIndex(i).getBukuByIndex(j).getId() + 
                        ", Judul Buku : " + anggota1.getPeminjamanByIndex(i).getBukuByIndex(j).getJudul()
                        );
            }
            System.out.println();
        }
        
        //Output Object Data Buku
        System.out.println("\nList Data Buku : ");
        System.out.println("\tID : " + buku1.getId() +
                "\n\tJudul : " + buku1.getJudul() +
                "\n\tTotal Stock : " + buku1.getStockBuku() +
                "\n\tSisa Stock : " + buku1.getSisaBuku()+
                "\n\tDapat Dipinjam : " + buku1.dapatDipinjam()
                );
        
        System.out.println("\n\tID : " + buku2.getId() +
                "\n\tJudul : " + buku2.getJudul() +
                "\n\tTotal Stock : " + buku2.getStockBuku() +
                "\n\tSisa Stock : " + buku2.getSisaBuku()+
                "\n\tDapat Dipinjam : " + buku2.dapatDipinjam()
                );
        
        System.out.println("\nData Petugas: ");
        System.out.println("\tID : " + petugas.getId() + 
                "\n\tNama : " + petugas.getNama()
                );
        
        System.out.println("Status Sebelum : " + anggota1.getPeminjamanByIndex(0).getStatus());

        System.out.println(buku1.getSisaBuku());
        
        anggota1.getPeminjamanByIndex(0).addBuku(buku1);
        
        System.out.println(buku1.getSisaBuku());
        
    }
    
}
