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
import view.ListAllBuku;
import models.Application;
import models.Buku;

/**
 *
 * @author g40
 */
public class ControllerListAllBuku implements ActionListener{
    private ListAllBuku view;
    private Application model;
    
    public ControllerListAllBuku(Application model){
        this.model = model;
        view = new ListAllBuku();
        view.setVisible(true);
        view.addListener(this);
        displayAllBuku();
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object obj = e.getSource();
        if(obj.equals(this.view.getBtnbBackToMainMenu())){
            //back to main menu
            new ControllerMainPetugas(model);
            view.dispose();
        } 
    }
    
    public void displayAllBuku(){
        ArrayList<Buku> ar = model.getAllBuku();
        int i = 0;
        for(Buku bk : ar){
            view.getTableListBuku().setValueAt(i+1,i, 0);
            view.getTableListBuku().setValueAt(bk.getJudul(),i, 1);
            view.getTableListBuku().setValueAt(bk.getId(),i, 2);
            view.getTableListBuku().setValueAt(bk.getPenulis(),i, 3);
            view.getTableListBuku().setValueAt(bk.getSisaBuku(),i, 4);
            i++;
        }
    }
}
