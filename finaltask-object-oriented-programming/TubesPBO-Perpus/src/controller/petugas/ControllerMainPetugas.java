/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import models.Anggota;
import view.petugas.MainPetugas;
import models.Application;
import models.Peminjaman;

/**
 *
 * @author Fachri Ul
 */
public class ControllerMainPetugas implements ActionListener {
    
    private MainPetugas main;
    private Application model;
    
    public ControllerMainPetugas(Application model){
        this.model = model;
        main = new MainPetugas();
        main.setVisible(true);
        main.addListener(this);
    }
    
    @Override
    public void actionPerformed(ActionEvent ae) {
        Object obj = ae.getSource();
        if(obj.equals(main.getBtnAddDataBuku())){
            new controller.petugas.ControllerAddDataBuku(model);
            main.dispose();
        }else if(obj.equals(main.getBtnBack())){ //this is logout
            new controller.ControllerMainMenu(model);
            main.dispose();
        }else if(obj.equals(main.getBtnCheckStatusBuku())){
            new controller.petugas.ControllerCekStatusBuku(model);
            main.dispose();
        }else if(obj.equals(main.getBtnCreatePeminjaman())){
            String id = JOptionPane.showInputDialog("ID Anggota yang akan ditambah Peminjaman");
            Anggota agt = model.getAnggotaById(id);
            if(agt != null){
                if(agt.getSisaPinjam() > 0 ){
                    JOptionPane.showMessageDialog(null, "Anggota Tersedia");
                    main.dispose();
                    new controller.petugas.ControllerCreatePeminjaman(model, agt);
                } else {
                    JOptionPane.showMessageDialog(null, "Kuota Peminjaman Anggota : " 
                            + agt.getId() + " Penuh" );
                }
            }else
                JOptionPane.showMessageDialog(null, "Anggota tidak terdeteksi");
        }else if(obj.equals(main.getBtnDeleteBuku())){
            new controller.petugas.ControllerDeleteDataBuku(model);
            main.dispose();
        }else if(obj.equals(main.getBtnPengembalianPinjaman())){
            String id = JOptionPane.showInputDialog("ID Anggota yang akan ditambah Peminjaman");
            Anggota agt = model.getAnggotaById(id);
            if(agt != null){
                
                //Check Apakah ada Pinjaman Aktif
                boolean check = false;
                for(Peminjaman pjm : agt.getRiwayatPjm()){
                    if(pjm.getStatus() == true)
                    check = true;
                }
                
                if(check){
                    JOptionPane.showMessageDialog(null, "Anggota Ditemukan");
                    main.dispose();
                    new controller.petugas.ControllerPengembalianPinjaman(model, agt);
                } else {
                    JOptionPane.showMessageDialog(null, "Tidak ada peminjaman aktif pada anggota " +
                            agt.getId());
                }
            }else
                JOptionPane.showMessageDialog(null, "Anggota tidak ditemukan");
        }else if(obj.equals(main.getBtnViewAnggota())){
            new controller.petugas.ControllerListAnggota(model);
            main.dispose();
        }else if(obj.equals(main.getBtnViewBuku())){            
            new controller.petugas.ControllerListAllBuku(model);
            main.dispose();
        }
    }
}