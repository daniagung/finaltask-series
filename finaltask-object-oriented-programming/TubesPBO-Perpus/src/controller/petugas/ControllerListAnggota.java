/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import controller.anggota.ControllerMainAnggota;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import models.Anggota;
import view.petugas.ViewAnggota;
import models.Application;
import models.Buku;

/**
 *
 * @author g40
 */
public class ControllerListAnggota implements ActionListener{
    private ViewAnggota view;
    private Application model;
    
    public ControllerListAnggota(Application model){
        this.model = model;
        view = new ViewAnggota();
        view.setVisible(true);
        view.addListener(this);
        this.displayAllAnggota();
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object obj = e.getSource();
        if(obj.equals(this.view.getBtnBack())){
            //back to main menu
            new ControllerMainPetugas(model);
            view.dispose();
        } 
    }
    
    public void displayAllAnggota(){
        ArrayList<Anggota> listAnggota = model.getAllAnggota();
        int i = 0;
        for(Anggota agt : listAnggota){
            view.getTableListAnggota().setValueAt(i+1,i, 0);
            view.getTableListAnggota().setValueAt(agt.getId(),i, 1);
            view.getTableListAnggota().setValueAt(agt.getNama(),i, 2);
            view.getTableListAnggota().setValueAt(agt.getNoHandphone(),i, 3);
            i++;
        }
    }
}
