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
import javax.swing.table.DefaultTableModel;
import models.Anggota;
import view.anggota.AnggotaRiwayatPjm;
import models.Application;
import models.Peminjaman;

/**
 *
 * @author g40
 */

public class ControllerRiwayatPjm implements ActionListener {

    private AnggotaRiwayatPjm view;
    private Application model;
    private Anggota anggota;
    
    public ControllerRiwayatPjm(Application model, Anggota a){
        this.model = model;
        view = new AnggotaRiwayatPjm();
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
        ArrayList<Peminjaman> list_pjm = anggota.getRiwayatPjm();
        
//        DefaultTableModel tableModel = new DefaultTableModel();
//        view.setTableRiwayat(tableModel);
//        tableModel.addRow(list_pjm.);
        
        SimpleDateFormat dateFormat = new SimpleDateFormat("dd-MM-yyyy");
                
        int i = 0;
        for(Peminjaman p : list_pjm){
            view.getTableRiwayat().setValueAt(i+1,i, 0);
            view.getTableRiwayat().setValueAt(p.getId(),i, 1);
            if(p.getStatus() == true)
                view.getTableRiwayat().setValueAt("Aktif",i, 3);
            else
                view.getTableRiwayat().setValueAt("Sudah Dikembalikan",i, 3);
            
            view.getTableRiwayat().setValueAt(dateFormat.format(p.getTanggalPinjam()),i, 2);
            view.getTableRiwayat().setValueAt(dateFormat.format(p.getTanggalTenggat()),i, 4);
            view.getTableRiwayat().setValueAt("Rp." + p.getBiayaDenda(),i, 5);
            i++;
        }
    }
}
