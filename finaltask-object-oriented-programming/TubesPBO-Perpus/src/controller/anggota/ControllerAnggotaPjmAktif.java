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
import models.Anggota;
import models.Application;
import models.Peminjaman;

import view.anggota.*;
/**
 *
 * @author g40
 */
public class ControllerAnggotaPjmAktif implements ActionListener {

    private view.anggota.AnggotaPjmAktif view;
    private Application model;
    private Anggota anggota;
    
    public ControllerAnggotaPjmAktif(Application model,Anggota a){
        this.model = model;
        view = new AnggotaPjmAktif();
        view.addListener(this);
        view.setVisible(true);
        this.anggota = a;
        displayRiwayat();
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object obj = e.getSource();
        if(obj.equals(this.view.getBtnBacktoMenuAnggota())){
            new controller.anggota.ControllerMainAnggota(model,anggota);
            view.dispose();
        } 
    }
    
    public void displayRiwayat(){
        SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");

        ArrayList<Peminjaman> list_pjm = anggota.getRiwayatPjm();
        int i = 0;
        for(Peminjaman p : list_pjm){
            if(p.getStatus() == true){
                view.getTableAktif().setValueAt(i+1,i, 0);
                view.getTableAktif().setValueAt(p.getId(),i, 1);            
                view.getTableAktif().setValueAt(dateFormat.format(p.getTanggalPinjam()),i, 2);
                view.getTableAktif().setValueAt(dateFormat.format(p.getTanggalTenggat()),i, 3);
                i++;
            }
        }
    }
    
}
