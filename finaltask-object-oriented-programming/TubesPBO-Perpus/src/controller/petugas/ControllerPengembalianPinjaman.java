
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Date;
import javax.swing.JOptionPane;
import models.Anggota;
import view.petugas.PengembalianPinjaman;
import models.Application;
import models.Peminjaman;

/**
 *
 * @author Fachri Ul
 */
public class ControllerPengembalianPinjaman implements ActionListener {

    private PengembalianPinjaman kembali;
    private Application model;
    private Anggota agt;

    public ControllerPengembalianPinjaman(Application model, Anggota agt) {
        kembali = new PengembalianPinjaman();
        kembali.setVisible(true);
        kembali.addListener(this);
        this.model = model;
        this.agt = agt;
        displayPeminjamanAktif();
    }
    
    @Override
    public void actionPerformed(ActionEvent ae){
        Object obj = ae.getSource();
        if(obj.equals(kembali.getBtnOk())){
            Peminjaman pjm = (Peminjaman) kembali.getCbPeminjamanAktif().getSelectedItem();
            Date date = kembali.getDate();
            double denda = agt.pengembalianPeminjaman(pjm.getId(), date);
            
            model.saveDataBuku();
            model.saveDataAnggota();
            
            if(denda == 0)
                JOptionPane.showMessageDialog(null,"Pengembalian Peminjaman berhasil");
            else
                JOptionPane.showMessageDialog(null,"Terdapat denda pada pengembalian sebanyak "
                        + denda);
            
            new controller.petugas.ControllerMainPetugas(model);
            kembali.dispose();
        }else if(obj.equals(kembali.getBtnBack())){
             new controller.petugas.ControllerMainPetugas(model);
             kembali.dispose();
        }
    }
    
    public void displayPeminjamanAktif(){
        ArrayList<Peminjaman> listPjm = agt.getRiwayatPeminjaman();
            
        for(Peminjaman pjm : listPjm){
            if(pjm.getStatus() == true)
                kembali.getCbPeminjamanAktif().addItem(pjm);
        }
    }
    
}
