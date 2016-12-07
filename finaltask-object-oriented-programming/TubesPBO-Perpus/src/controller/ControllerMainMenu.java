/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.awt.SystemColor;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import view.MainMenu;
import controller.*;
import javax.swing.JOptionPane;
import models.Application;
import models.Buku;
/**
 *
 * @author g40
 */
public class ControllerMainMenu implements ActionListener{

    private MainMenu menu;
    private Application model;
    
    public ControllerMainMenu(Application model){
        this.model = model;
        menu = new MainMenu();
        menu.setVisible(true);
        menu.addListener(this);
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object obj = e.getSource();
        if(obj.equals(this.menu.getBtnSearch())){
            String idFromView = menu.getStringTextFieldSearch();
            Buku buku = model.getBukuById(idFromView);
            
            if(buku == null)
                buku = model.getBukuByJudul(idFromView);
            
            if(buku != null){
                new ControllerSearchResult(model, buku);
                menu.dispose();
            }else {
                JOptionPane.showMessageDialog(null, "ID BUKU TIDAK DITEMUKAN!!");
            }
//            System.out.println((menu.getStringTextFieldSearch());
//            JOptionPane.showMessageDialog(null, menu.getTextFieldSearch());
            
        } else if(obj.equals(this.menu.getBtnLoginPetugas())) {
            new controller.petugas.ControllerLoginPetugas(model);
            menu.dispose();
            
        } else if(obj.equals(this.menu.getBtnLoginAnggota())) {
            new controller.anggota.ControllerLoginAnggota(model);
            menu.dispose();
        } else if(obj.equals(this.menu.getBtnListBuku())) {
            new ControllerListAllBuku(model);
            menu.dispose();
            
        } else if(obj.equals(this.menu.getBtnRegistrasiAnggota())) {
            new ControllerAnggotaRegistration(model);
            menu.dispose();
        }
    }
    
}
