package config;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;

import java.util.ArrayList;
import models.*;

/**
 *
 * @author g40
 */
public class FileObject {
       
    public static void saveListBuku(ArrayList<Buku> buku) {
        try {
            FileOutputStream fos = new FileOutputStream("FileBuku.dat"); //always overwrite
            ObjectOutputStream objOutStream = new ObjectOutputStream(fos);
            objOutStream.writeObject(buku);
            
            //Close IO Stream
            objOutStream.flush();
            fos.close();
            
        } catch(IOException ioe){
            System.out.println("save error - " + ioe);
        }
    }
    
    public static ArrayList<Buku> readListBuku() {
        try {
            FileInputStream fis = new FileInputStream("FileBuku.dat");
            ObjectInputStream objInStream = new ObjectInputStream(fis);
            
            // Passing it to ArrayList Buku
            ArrayList<Buku> buku = (ArrayList) objInStream.readObject();
            
            //Close IO Stream
            objInStream.close();
            fis.close();
            return buku;
        } catch(FileNotFoundException fe) {
            System.out.println("FileBuku.dat not Found");
            return null;
        } catch(IOException e){
            System.out.println(e + "read error - ");
            return null;
        } catch (ClassNotFoundException ex) {
            System.out.println("class not found");
            return null;
        }
    }
    
    public static void saveListPetugas(ArrayList<Petugas> petugas) {
        try {
            FileOutputStream fos = new FileOutputStream("FilePetugas.dat"); //always overwrite
            ObjectOutputStream objOutStream = new ObjectOutputStream(fos);
            objOutStream.writeObject(petugas);
            
            //Close IO Stream
            objOutStream.flush();
            fos.close();
            
        } catch(IOException ioe){
            System.out.println("save error - " + ioe);
        }
    }
    
    public static ArrayList<Petugas> readListPetugas() {
        try {
            FileInputStream fis = new FileInputStream("FilePetugas.dat");
            ObjectInputStream objInStream = new ObjectInputStream(fis);
            
            // Passing it to ArrayList Buku
            ArrayList<Petugas> petugas = (ArrayList) objInStream.readObject();
            
            //Close IO Stream
            objInStream.close();
            fis.close();
            return petugas;
        } catch(FileNotFoundException fe) {
            System.out.println("FilePetugas.dat not Found");
            return null;
        } catch(IOException e){
            System.out.println(e + "read error - ");
            return null;
        } catch (ClassNotFoundException ex) {
            System.out.println("class not found");
            return null;
        }
    }

    public static void saveListAnggota(ArrayList<Anggota> anggota) {
        try {
            FileOutputStream fos = new FileOutputStream("FileAnggota.dat"); //always overwrite
            ObjectOutputStream objOutStream = new ObjectOutputStream(fos);
            objOutStream.writeObject(anggota);
            
            //Close IO Stream
            objOutStream.flush();
            fos.close();
            
        } catch(IOException ioe){
            System.out.println("save anggota error - " + ioe);
        }
    }
    
    public static ArrayList<Anggota> readListAnggota() {
        try {
            FileInputStream fis = new FileInputStream("FileAnggota.dat");
            ObjectInputStream objInStream = new ObjectInputStream(fis);
            
            // Passing it to ArrayList Buku
            ArrayList<Anggota> anggota = (ArrayList) objInStream.readObject();
            
            //Close IO Stream
            objInStream.close();
            fis.close();
            return anggota;
        } catch(FileNotFoundException fe) {
            System.out.println("FileAnggota.dat not Found");
            return null;
        } catch(IOException e){
            System.out.println(e + " READ ANGGOTA ERROR - ");
            return null;
        } catch (ClassNotFoundException ex) {
            System.out.println("class not found");
            return null;
        }
    }

    public static void saveCounter(CounterObject counter) {
        try {
            FileOutputStream fos = new FileOutputStream("FileCounter.dat"); //always overwrite
            ObjectOutputStream objOutStream = new ObjectOutputStream(fos);
            objOutStream.writeObject(counter);
            
            //Close IO Stream
            objOutStream.flush();
            fos.close();
            
        } catch(IOException ioe){
            System.out.println("save counter error - " + ioe);
        }
    }
    
    public static CounterObject readCounter() {
        try {
            FileInputStream fis = new FileInputStream("FileCounter.dat");
            ObjectInputStream objInStream = new ObjectInputStream(fis);
            
            // Passing it to obj counter
            CounterObject counter = (CounterObject) objInStream.readObject();
            
            //Close IO Stream
            objInStream.close();
            fis.close();
            return counter;
        } catch(FileNotFoundException fe) {
            System.out.println("FileCounter.dat not Found");
            return null;
        } catch(IOException e){
            System.out.println(e + " READ COUNTER ERROR - ");
            return null;
        } catch (ClassNotFoundException ex) {
            System.out.println("class not found");
            return null;
        }
    }
    
}