/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.anggota;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import models.Anggota;
import view.anggota.DetilPeminjaman;
import models.Application;
import models.Buku;
import models.Peminjaman;

/**
 *
 * @author g40
 */

public class ControllerAnggotaDetilPeminjaman implements ActionListener {
    private view.anggota.DetilPeminjaman view;
    private Application model; 
    private Anggota anggota;
    SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
    
    public ControllerAnggotaDetilPeminjaman(Application model, Anggota agt){
        this.model = model;
        view = new DetilPeminjaman();
        view.addListener(this);
        view.setVisible(true);
        this.anggota = agt;
    }
    
    @Override
    public void actionPerformed(ActionEvent e){
        Object obj = e.getSource();
        if(obj.equals(this.view.getBtnBack())){
            new controller.anggota.ControllerMainAnggota(model,anggota);
            view.dispose();
        } else if(obj.equals(this.view.getBtnOk())){
            try {
                String detil = view.getStringFieldIdPjm();
                Peminjaman p = anggota.getPeminjamanById(detil);
                if (p != null) {
                    view.getTextAreaBuku().setText("");
                    view.setTxTenggat(dateFormat.format(p.getTanggalTenggat()));
                    view.setTxPjm(dateFormat.format(p.getTanggalPinjam()));
                    if (p.getStatus() == true) {
                        view.setTxStatus("Belum dikembalikan");
                    } else {
                        view.setTxStatus("Sudah dikembalikan");
                    }
                    if (p.getTanggalPengembalian() != null) {
                        view.setTxKembali(dateFormat.format(p.getTanggalPengembalian()));
                        view.setTxDenda(String.valueOf(p.getBiayaDenda()));
                    } else {
                        view.setTxKembali("-");
                        view.setTxDenda("-");
                    }
                    
                    ArrayList<Buku> listPinjam = p.getListBuku();
                    for(Buku b : listPinjam){
                        view.getTextAreaBuku().append(b.getId() + " - " + b.getJudul() + "\n");
                    }
                    
                } else {
                    JOptionPane.showMessageDialog(null, "Not Found Peminjaman");
                }         
            } catch (Exception exx) {
                    JOptionPane.showMessageDialog(null, "Error Found");
            }
        }
    }
    
}
