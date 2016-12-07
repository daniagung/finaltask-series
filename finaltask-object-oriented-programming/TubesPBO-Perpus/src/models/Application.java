package models;

import config.CounterObject;
import java.util.ArrayList;
import config.FileObject;

/*
    Created & Maintained : 
    Buku / Barang = Fachri Ul Albab
    Anggota = Thoriq Abdul Azziz
    Petugas = Dede Kiswanto
*/

public class Application {
    
    // Array List Container
    private ArrayList<Buku> daftarBuku;
    private ArrayList<Petugas> daftarPetugas;
    private ArrayList<Anggota> daftarAnggota;
    
    private CounterObject counter;

    public Application() {
        
        //Default Constructor
//        daftarBuku = new ArrayList();
//        daftarPetugas = new ArrayList();
//        daftarAnggota = new ArrayList();
        
        // Load from FileObject
        daftarBuku = FileObject.readListBuku();
        daftarPetugas = FileObject.readListPetugas();
        daftarAnggota = FileObject.readListAnggota();
        counter = FileObject.readCounter();
        
        if(daftarBuku == null)
            daftarBuku = new ArrayList();
        
        if(daftarPetugas == null)
            daftarPetugas = new ArrayList();
        
        if(daftarAnggota == null)
            daftarAnggota = new ArrayList();
        
        if(counter == null)
            counter = new CounterObject();
        
        //------ DUMMY DATA ----------//
        this.addPetugas("Agus"); // Dummy Petugas
//        this.addAnggota("Doni");
//        this.addAnggota("Dodo");
        
//        Anggota agt = getAnggotaById("AGT1");
//        agt.createPeminjaman(new Date());
//        agt.createPeminjaman(new Date());
//        agt.createPeminjaman(new Date());
        
//        Peminjaman pjm = agt.getPeminjamanByIndex(0);
        
//        this.addBuku("Cinta kan membawamu", 10);
//        this.addBuku("Pergi dari sini", 10);
//        this.addBuku("Aku ingin kembali", 10);
//        
//        Buku b = getBukuById("BK1");
//        Buku b1 = getBukuById("BK2");
//        pjm.addBuku(b);
//        pjm.addBuku(b1);
    }
    
    // ------ Method Applications Petugas -------- //
    
    public void addPetugas(String nama){
        String id = "PTG" + (counter.getnPetugas() + 1);
//        counter.incPetugas(); unncoment if you want create menu regist petugas
        Petugas petugas = new Petugas(id, nama);
        daftarPetugas.add(petugas);
    }
    
    public Petugas getPetugasByIndex(int idx){
        try{
            return daftarPetugas.get(idx);
        }catch(Exception e){
            return null;
        }
    }
    
    public Petugas getPetugasById(String id){
        for(Petugas ptg : daftarPetugas){
            if(ptg.getId().equals(id))
                return ptg;
        }
        return null;
    }
    
    public void deletePetugasById(String id){
        Petugas tempPtg = null;
        for(Petugas ptg : daftarPetugas){
            if(ptg.getId().equals(id)){
                tempPtg = ptg;
                break;
            }
        }
        daftarPetugas.remove(tempPtg);
    }
    
    // ------ Method Applications Buku  -------- //
    
    public void addBuku(String judul,int total) {
        String id = "BK" + (counter.getnBuku()+ 1);
        counter.incBuku();
        Buku buku = new Buku(id, judul, total);
        daftarBuku.add(buku);
    }
    
    //Overload
    public void addBuku(String judul,int total, String penulis, String penerbit, String isbn) {
        String id = "BK" + (counter.getnBuku()+ 1);
        counter.incBuku();
        Buku buku = new Buku(id, judul, total,penulis, penerbit, isbn);
        daftarBuku.add(buku);
    }
    
    public Buku getBukuByIdx(int idx){
        try{
            return daftarBuku.get(idx);
        }catch(Exception e){
            return null;
        }
    }
    
    public Buku getBukuById(String id){
        for(Buku b: daftarBuku){
            if (b.getId().equals(id))
                return b;
        }
        return null;
    }
    
    public Buku getBukuByJudul(String judul){
        for(Buku b: daftarBuku){
            if (b.getJudul().equals(judul))
                return b;
        }
        return null;
    }
    
    public boolean deleteBuku(String id){
        Buku tempBuku = getBukuById(id);
        if(tempBuku!=null){
            daftarBuku.remove(tempBuku);
            return true;
        } else {
            return false;
        }
            
    }    
    
    public ArrayList<Buku> getAllBuku(){
        return daftarBuku;
    }
    
    // ------ Method Applications Anggota    -------- //

    public String addAnggota(String name){
        String id = "AGT" + (counter.getnAnggota()+ 1);
        counter.incAnggota();
        Anggota a = new Anggota(id, name);
//        a.setAlamat(alamat);
        daftarAnggota.add(a);
        return a.getId();
    }
    
    public Anggota getAnggotaById(String id){
        for(Anggota a: daftarAnggota){
            if (a.getId().equals(id)){
                return a;
            }
        }
        return null;
    }
    
    public Anggota getAnggotaByIndex(int idx){
        try {
            return daftarAnggota.get(idx);
        } catch (Exception e) {
            return null;
        }
    }
    
    public void deleteAnggotaById(String id){
        for(Anggota a: daftarAnggota){
            if(a.getId().equals(id)){
                daftarAnggota.remove(a);
                break;
            }
        }
    }
    
    public ArrayList<Anggota> getAllAnggota(){
        return daftarAnggota;
    }
    
    //-------------- Saving it to File ------------//
    
    public void saveDataBuku(){
        try {
            FileObject.saveListBuku(this.daftarBuku);
            FileObject.saveCounter(counter);
        } catch (Exception ex) {
            System.out.println("Save daftarBuku error" + ex);
        }
    }
    
    public void saveDataAnggota(){
        try {
            FileObject.saveListAnggota(daftarAnggota);
            FileObject.saveCounter(counter);
        } catch (Exception e) {
            System.out.println("Save daftarAnggota error" + e);
        }
    }
    
    public void saveDataPetugas(){
        try {
            FileObject.saveListPetugas(daftarPetugas);
            FileObject.saveCounter(counter);
        } catch (Exception e) {
            System.out.println("Save daftarPetugas error" + e);
        }
    }
    
}

