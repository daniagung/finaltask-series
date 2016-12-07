/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import javax.swing.JList;
import javax.swing.JOptionPane;
import models.Anggota;
import view.petugas.PetugasCreatePeminjaman;
import models.Application;
import models.Buku;
import models.Peminjaman;

/**
 *
 * @author g40
 */
public class ControllerCreatePeminjaman implements ActionListener{
    private PetugasCreatePeminjaman view;
    private Application model;
    private Anggota agt;
    
    public ControllerCreatePeminjaman(Application model,Anggota agt){
        this.model = model;
        this.agt = agt;
        view = new PetugasCreatePeminjaman();
        view.setVisible(true);
        view.addListener(this);
        displaySettings();

    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object obj = e.getSource();
        if(obj.equals(this.view.getBtnBack())){
            //back to main menu
            new ControllerMainPetugas(model);
            view.dispose();
        } else if(obj.equals(view.getBtnCreate())){
            ArrayList<Buku> listDipinjam = (ArrayList) view.getListBuku().getSelectedValuesList();
            if(listDipinjam.size() > agt.getSisaPinjam()){
                JOptionPane.showMessageDialog(null, "Melebihi batas maksimum sisa pinjam");
            } else {
                // Get Peminjaman Object, tak perlu eksepsi
                String idPjm = this.agt.createPeminjaman(view.getDate());
                Peminjaman pjm = this.agt.getPeminjamanById(idPjm);
                
                //insert buku to peminjaman
                for(Buku tempBuku : listDipinjam){
                    pjm.addBuku(tempBuku);
                    int temp = this.agt.getSisaPinjam();
                    this.agt.setSisaPinjam(--temp);                
                }
                model.saveDataBuku();
                model.saveDataAnggota();
                JOptionPane.showMessageDialog(null, "Peminjaman Berhasil");
                new ControllerMainPetugas(model);
                view.dispose();
            }
        }   
    }
    
    public void displaySettings(){
        ArrayList<Buku> listBuku =  model.getAllBuku();
        
        /*  Dibuat array list baru, karena array list tidak dapat
            dimodifikasi pada saat di looping, "raising concurency modification"
        */
        
        ArrayList<Buku> listDipinjam = new ArrayList<>();
        
        for(Buku buku : listBuku){
            if(buku.dapatDipinjam()){
                listDipinjam.add(buku);
            }
        }
        view.getListBuku().setListData(listDipinjam.toArray());
        view.getLabelMessage().setText(agt.getNama() + " - "
            + agt.getId() + " akan ditambahkan peminjaman");
        view.getLabelMax().setText(String.valueOf(agt.getSisaPinjam()));
    }
}
