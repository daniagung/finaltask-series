package driver;


import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.Scanner;
import models.*;

/*
    Created & Maintained : 
    Buku / Barang = Fachri Ul Albab
    Anggota = Thoriq Abdul Azziz
    Petugas = Dede Kiswanto
*/

public class Console {
    
    private Application app;
    
    Scanner inp = new Scanner(System.in);
    
    SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");

    public Console(Application app) {
        this.app = app;
    }
    
    public void clearScreen(){
        final String ANSI_CLS = "\u001b[2J";
        final String ANSI_HOME = "\u001b[H";
        System.out.print(ANSI_CLS + ANSI_HOME);
        System.out.flush();
    }
    
    // Menu yang pertama kali berjalan
    public void mainMenu(){
        boolean loop = true;
        while(loop){            
            System.out.println("#### SISTEM INFORMASI PERPUSTAKAAN ####");
            System.out.println("# Main Menu #\n" + 
                "\t1. View List Buku \n" +
                "\t2. Cari Buku di Perpustakaan \n" + 
                "\t3. Login sebagai Anggota \n" + 
                "\t4. Login sebagai Petugas \n" +
                "\t5. Registrasi Anggota Perpustakaan \n" +
                "\t666. Exit");

            System.out.print("Option : ");

            String opt = inp.nextLine(); 
            switch(opt){ 
             case "1" : this.menuListBuku(); break;
             case "2" : this.menuCariBuku(); break;
             case "3" : this.menuAnggota(); break;
             case "4" : this.menuPetugas();break;
             case "5" : this.menuRegistrasiAnggota(); break;
             case "666" : loop = false; break;
             default: System.out.println("Wrong Number"); 
            }
            this.clearScreen();
        }
    }
    
    // Option 1
    public void menuListBuku(){
        this.clearScreen();
        ArrayList<Buku> bk = app.getAllBuku();
        int count = 1;
        System.out.println("----# List Buku in Perpustakan #---");
        for(Buku b:bk){
            System.out.print(count++);
            System.out.print(". ID : "+b.getId() + " - ");
            System.out.println("Judul : "+b.getJudul());
            System.out.print("   Total Stok : "+b.getStockBuku() + " - ");
            System.out.println("Tersedia : "+b.getSisaBuku());
        }
        System.out.println();
        //Holder menu
        inp.nextLine();
    }
    
    // Option 2
    public void menuCariBuku(){
        this.clearScreen();
        System.out.print("## Search Buku in Perpustakaan ## "
                + "\nMasukkan ID Buku : ");
        String id = inp.nextLine();
        try{
            Buku buku = app.getBukuById(id);
            System.out.println("ISBN : "+buku.getISBN() + 
                    "\nID : "+ buku.getId() + 
                    "\nJudul : "+ buku.getJudul() +
                    "\nPenerbit : "+ buku.getPenerbit() + 
                    "\nPenulis : "+ buku.getPenulis() + 
                    "\nStock : "+ buku.getStockBuku() + 
                    "\nSisa Tersedia : "+ buku.getSisaBuku() + 
                    "\nPeminjaman : "+ buku.dapatDipinjam()
            );
        }catch(NullPointerException npe){
            System.out.println("Buku Tidak Ada \n");
        }
        inp.nextLine();
    }
    
    // Option 6
    public void menuRegistrasiAnggota(){
        this.clearScreen();
        System.out.println("## Registrasi Anggota ##");
        String id, nama, number, identitas;
        System.out.print("Nama  : "); nama = inp.nextLine();
        System.out.print("Phone Number : "); number = inp.nextLine();
        System.out.print("No Identitas (KTP/SIM/KP) : "); identitas = inp.nextLine();

        id = app.addAnggota(nama);
        Anggota agt = app.getAnggotaById(id);
        agt.setIdIdentitas(identitas);
        agt.setNoHandphone(number);
        
        //Display ID Anggota created
        System.out.println("Akun berhasil dibuat \n" + 
                "ID Akun Anggota anda : " + id );
        
        app.saveDataAnggota();
        inp.nextLine();
    }
    
    //------------BAGIAN MENU ANGGOTA ------------//
    
    public void menuAnggota(){
        this.clearScreen();
        System.out.print("---# Login Anggota #---"
                + "\nMasukan ID : ");
        String id = inp.nextLine();
        Anggota a = app.getAnggotaById(id);
        if(a!=null){
            boolean loop = true;
            while(loop){
                this.clearScreen();
                System.out.println("Loggin Account : " + a.getNama());
                System.out.println("## Menu Anggota ## \n" + 
                    "\t1. Riwayat Peminjaman \n" + 
                    "\t2. List Peminjaman Aktif  \n" +
                    "\t3. Detail Peminjaman \n" + 
                    "\t666. Exit Menu Anggota");
                System.out.print("Option : ");
                String opt = inp.nextLine(); 
                switch(opt){ 
                 case "1" : menuAnggotaRiwayatPjm(a); break;
                 case "2" : menuAnggotaListPjmAct(a); break;
                 case "3" : menuAnggotaListPeminjamanDetail(a); break;
                 case "666" : loop = false; break;
                 default: System.out.println("Wrong Number"); 
                }
            }
        } else {
            System.out.println("ID Anggota tidak ditemukan \n");
        }
        inp.nextLine();
    }

    void menuAnggotaRiwayatPjm(Anggota a){
        this.clearScreen();
        ArrayList<Peminjaman> riwayatPjm = a.getRiwayatPjm();
        int count = 1;
        System.out.println("----------- Riwayat Peminjaman ------------");        
        for(Peminjaman pjm:riwayatPjm){
            System.out.print((count++) + ". ID : " + pjm.getId() + 
                    " - Tanggal Pinjam : " + dateFormat.format(pjm.getTanggalPinjam())
            );
            if(pjm.getStatus()==true){
                System.out.println(" - Status : Aktif");
            }else{
                System.out.println(" - Status : Sudah Dikembalikan");
            }
        }
        System.out.println();
        inp.nextLine(); 
    }
    
    void menuAnggotaListPjmAct(Anggota a){
        this.clearScreen();
        ArrayList<Peminjaman> riwayatPjm = a.getRiwayatPjm();
        System.out.println("------------- Peminjaman Aktif ----------------");
        int count = 1;
        for(Peminjaman pjm:riwayatPjm){
            if(pjm.getStatus() == true){
                System.out.print(count++);
                System.out.println(". ID Peminjaman :"+pjm.getId());
                System.out.println("Tanggal Kembali : " + dateFormat.format(
                        pjm.getTanggalTenggat()
                ));
                System.out.println("Total Buku dipinjam : " + 
                        pjm.getListBuku().size() + "\n" );
            }
        }
        System.out.println();
        inp.nextLine();
    }

    void menuAnggotaListPeminjamanDetail(Anggota a){
        this.clearScreen();
        System.out.print("--# Detail Peminjaman #--"
                + "\nMasukan ID Peminjaman : ");
        String id = inp.nextLine();
        try{
            Peminjaman pjm = a.getPeminjamanById(id);
            System.out.println("ID : " + pjm.getId());
            System.out.println("Tanggal Pinjam  : " + dateFormat.format(pjm.getTanggalPinjam()));
            System.out.println("Tanggal Kembali : " + dateFormat.format(pjm.getTanggalTenggat()));
            System.out.println("Status : " + pjm.getStatus());
            
            //Detail apabila sudah dikembalikan
            if(pjm.getTanggalPengembalian() != null){
                System.out.println("Tanggal Pengembalian :" + dateFormat.format(pjm.getTanggalPengembalian()));
                System.out.println("Denda :" + pjm.getBiayaDenda());
            }
            
            //Tampilkan buku yang dipinjam
            int n = 1;
            System.out.println("List Buku yang dipinjam : ");
            for(Buku buku : pjm.getListBuku()){
                System.out.print("\t" + n++ + " : ");
                System.out.println(buku.getJudul() + " - " + buku.getPenulis());
            }
            System.out.println();
        }catch(Exception ex){
            System.out.println("ID Peminjaman not found");
        }
        inp.nextLine();
    }
    
    //------------BAGIAN MENU PETUGAS------------//
    
    public void menuPetugas(){
        this.clearScreen();
        System.out.println("## Login Petugas ##");        
        System.out.print("Masukan ID Petugas : ");
        String id = inp.nextLine();
        
        Petugas ptg = app.getPetugasById(id);
        
        if(ptg!= null){
            boolean loop = true;
            while(loop){
                this.clearScreen();
                System.out.println("Login Petugas : " + ptg.getNama());
                System.out.println("## Menu Petugas ## \n" + 
                    "\t1. Add Data Buku \n" + 
                    "\t2. Delete Data Buku \n" +
                    "\t3. Tambah Pinjaman Anggota \n" + 
                    "\t4. Pengembalian Pinjaman Anggota \n" +
                    "\t5. Check Status Buku \n"+
                    "\t6. View List Anggota \n"+
                    "\t7. View List Buku \n" +
                    "\t666. Exit" );
                Scanner scanMenu = new Scanner(System.in);
                System.out.print("Option : ");
                String opt = scanMenu.nextLine(); 
                switch(opt){ 
                    case "1" : menuPetugasAddBuku(); break;
                    case "2" : menuPetugasDeleteBuku();break;
                    case "3" : menuPetugasCreatePjmAnggota(ptg); break;
                    case "4" : menuPetugasPengembalianPjmAnggota(); break;
                    case "5" : menuPetugasCekStatusBuku(); break;
                    case "6" : menuPetugasViewAnggota(); break;
                    case "7" : menuListBuku(); break;                        
                    case "666" : loop = false; break;
                    default : System.out.println("Wrong Number"); 
                }
            }    
        } else {
            System.out.println("Petugas not Found!!");
        }
        
        inp.nextLine();
    }
    
    public void menuPetugasViewAnggota(){
        this.clearScreen();
        ArrayList<Anggota> daftarAnggota = app.getAllAnggota();
        System.out.println("----- List Anggota Perpustakaan ------");
        int count = 1;
        for(Anggota a:daftarAnggota){
            System.out.println(count++ + ". ID : "+a.getId()+" - "+"Nama : "+a.getNama());
        }
        System.out.println();
        inp.nextLine();
    }

    public void menuPetugasAddBuku(){
        this.clearScreen();
        String judul, penulis, penerbit, isbn;
        String stock;
        System.out.println("## Petugas -> Input Data Buku ##");
        System.out.print("Judul Buku : "); judul = inp.nextLine();
        System.out.print("Stock Buku : "); stock = inp.nextLine();
        System.out.print("Penulis : "); penulis = inp.nextLine();
        System.out.print("Penerbit : "); penerbit = inp.nextLine();
        System.out.print("ISBN : "); isbn = inp.nextLine();
        
        try {
            app.addBuku(judul, Integer.parseInt(stock), penulis, penerbit, isbn);
            app.saveDataBuku();
            System.out.println("Data Buku Saved");
        } catch (NumberFormatException numberFormatException) {
            System.out.println("input buku error, stock must be integer");
        }
        
        inp.nextLine();
    }

    public void menuPetugasDeleteBuku(){
        clearScreen();
        try {
            System.out.println("## Petugas -> Delete Buku ##");
            System.out.print("ID Buku yang akan di delete : ");
            String id = inp.nextLine();
            boolean stat = app.deleteBuku(id);
            if (stat) {
                System.out.println("ID Buku " + id + " deleted");
            } else {
                System.out.println("ID Buku not found!");
            }
            app.saveDataBuku();
        } catch (Exception e) {
            System.out.println("Buku not found");
        }
        inp.nextLine();
    }
    
    public void menuPetugasCreatePjmAnggota(Petugas p){
        
        this.clearScreen();
        System.out.println("## Tambah Pinjaman suatu Anggota ##");
        System.out.print("ID Anggota : ");
        String idAgt = inp.nextLine();
        
        Anggota a = app.getAnggotaById(idAgt);
        
        if(a != null){
            int x = a.getSisaPinjam();
            if(x == 0){
                System.out.println("Kapasitas Peminjaman Anggota " + idAgt + " sudah penuh");
            } else {
                System.out.println("Anggota : " + a.getNama() + " akan ditambah Peminjaman");
                String dd, mm, yyyy;
                Date tanggalPeminjaman = null;

                while(true){
                    System.out.println("\nInput Tanggal Peminjaman ");
                    System.out.print("Hari (DD) : "); dd = inp.nextLine();
                    System.out.print("Bulan (BB) : "); mm = inp.nextLine();
                    System.out.print("Tahun (YYYY): "); yyyy = inp.nextLine();
                    try {
                        tanggalPeminjaman  = dateFormat.parse(dd+"-"+mm+"-"+yyyy);
                        break;
                    } catch (Exception e) {
                        System.out.println("Error at parsing, ulangi dengan format!\n");
                    }
                }

                // Get Peminjaman Object, tak perlu eksepsi
                String idPjm = a.createPeminjaman(tanggalPeminjaman);
                Peminjaman pjm = a.getPeminjamanById(idPjm);

                //Output Buku yang dapat dipinjam, sisa masih ada;
                System.out.println("----- List Buku yang dapat dipinjam ----");
                for (Buku buku :  app.getAllBuku()) {
                    if(buku.dapatDipinjam())
                        System.out.println(buku.getId() + " - " + buku.getJudul());
                }        

                //Insert Book
                System.out.println("\nMasukan ID buku yang ingin dipinjam"
                        + "\nInput \"X\" untuk selesai");
                
                System.out.println("\nKuota Peminjaman  : " + x);
                int i = 1;
                while(i <= x) {
                    System.out.print("ID Buku : "); String idBuku = inp.nextLine();
                    try{
                        if(idBuku.equals("X"))
                            break;
                        Buku tempBuku = app.getBukuById(idBuku);
                        if(tempBuku.dapatDipinjam()){
                            pjm.addBuku(tempBuku);
                            int temp = a.getSisaPinjam();
                            a.setSisaPinjam(--temp);
                            i++;
                            System.out.println("Buku berhasil dipinjam \n");
                        }else {
                            System.out.println("Buku tidak dapat dipinjam \n");
                        }

                    }catch(NullPointerException e){
                        System.out.println("Buku ID tidak tersedia");
                    }
                }
                
                System.out.println("Peminjaman Buku telah selesai");
                app.saveDataBuku();
                app.saveDataAnggota();
            }
        } else {
            System.out.println("ID Anggota tidak ditemukan");
        }
        
        inp.nextLine();

    }
    
    public void menuPetugasPengembalianPjmAnggota(){
        this.clearScreen();
        System.out.println("## Petugas -> Pengembalian Pinjaman Anggota ##");
        System.out.print("ID Anggota : "); String idAgt = inp.nextLine();
        Anggota a = app.getAnggotaById(idAgt);
        if(a!= null){
            
            //Check Apakah ada Pinjaman Aktif
            boolean check = false;
            for(Peminjaman pjm : a.getRiwayatPjm()){
                if(pjm.getStatus() == true)
                    check = true;
            }
            
            if(check){
                //Output List Pinjaman Aktif
                System.out.println("\n# Peminjaman yang masih Aktif #");
                int count = 1;

                for(Peminjaman pjm: a.getRiwayatPjm()){
                    if(pjm.getStatus() == true){
                        System.out.print(count++);
                        System.out.println(". ID Peminjaman :"+pjm.getId());
                        System.out.println("Tanggal Pinjam : " + dateFormat.format(
                                pjm.getTanggalPinjam()
                        ));
                        System.out.println("Tanggal Tenggat : " + dateFormat.format(
                                pjm.getTanggalTenggat()
                        ));
                        System.out.println("Total Buku dipinjam : " + 
                                pjm.getListBuku().size() + "\n" );
                    }
                }

                String idPjm;
                System.out.println("Peminjaman yang ingin dikembalikan");
                System.out.print("ID Peminjaman : "); idPjm = inp.nextLine();

                if(a.getPeminjamanById(idPjm) != null){

                    String dd,mm,yyyy;
                    Date tanggalPengembalian = null;

                    while(true){
                        System.out.println("\nInput Tanggal Penembalian ");
                        System.out.print("Hari (DD) : "); dd = inp.nextLine();
                        System.out.print("Bulan (BB) : "); mm = inp.nextLine();
                        System.out.print("Tahun (YYYY): "); yyyy = inp.nextLine();
                        try {
                            tanggalPengembalian  = dateFormat.parse(dd+"-"+mm+"-"+yyyy);
                            break;
                        } catch (Exception e) {
                            System.out.println("Error at parsing, ulangi dengan format!\n");
                        }
                    }
                    
                    double denda = a.pengembalianPeminjaman(idPjm, tanggalPengembalian);
                    
                    System.out.println("\nPengembalian Berhasil");
                    System.out.println("Denda dibayar " + denda);
                    
                    app.saveDataBuku();
                    app.saveDataAnggota();
                    
                }else{
                    System.out.println("ID Peminjaman Salah");
                }
            }else{
                System.out.println("Tidak ada Peminjaman Aktif");
            }
        } else {
            System.out.println("ID Anggota tidak ditemukan!");
        }
        inp.nextLine();
    }
    
    public void menuPetugasCekStatusBuku(){
        clearScreen();
        System.out.println("## Petugas -> Check Status Buku ##");
        System.out.print("Insert ID buku : ");
        String id = inp.nextLine();
        Buku b = app.getBukuById(id);
        if(b!=null){
            if(b.dapatDipinjam()==true){
                System.out.println("Status Buku : Stock masih tersedia, dapat dipinjam");
            }else{
                System.out.println("Status Buku : Stock kosong, tidak dapat dipinjam");
            }
        } else {
            System.out.println("Buku id tersebut tidak ditemukan");
        }
        
        inp.nextLine();
    }

}

    