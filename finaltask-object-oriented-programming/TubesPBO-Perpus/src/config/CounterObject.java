/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package config;

import java.io.Serializable;

/**
 *
 * @author g40
 */
public class CounterObject implements Serializable{
    private int nAnggota;
    private int nBuku;
    private int nPetugas;
    
    public CounterObject() {
        nAnggota = 0;
        nBuku = 0;
        nPetugas = 0;
    }
    
    public void incAnggota(){ nAnggota++; }
    public void incBuku(){ nBuku++; }
    public void incPetugas(){ nPetugas++; }

    public int getnAnggota() {
        return nAnggota;
    }

    public int getnBuku() {
        return nBuku;
    }

    public int getnPetugas() {
        return nPetugas;
    }
    
    
    
}
