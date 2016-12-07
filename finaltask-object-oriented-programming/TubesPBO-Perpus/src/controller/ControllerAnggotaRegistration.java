/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import models.Anggota;
import models.Application;
import view.*;

/**
 *
 * @author g40
 */
public class ControllerAnggotaRegistration implements ActionListener{
    
    private AnggotaRegistration menu;
    private Application model;

    public ControllerAnggotaRegistration(Application model){
        this.model = model;
        menu = new AnggotaRegistration();
        menu.setVisible(true);
        menu.addListener(this);
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object obj = e.getSource();
        if(obj.equals(this.menu.getBtnCreateAccount())){
            String fullName = menu.getStringFullName();
            String phone = menu.getStringPhone();
            String identitas = menu.getStringId();
            try {
                String id = model.addAnggota(fullName);
                Anggota agt = model.getAnggotaById(id);
                agt.setNoHandphone(phone);
                agt.setIdIdentitas(identitas);
                model.saveDataAnggota();
                JOptionPane.showMessageDialog(null, "Account Created, your ID : " + id);
                new ControllerMainMenu(model);
                menu.dispose();
            } catch (Exception ex) {
                JOptionPane.showMessageDialog(null, "Something wrong!!");
            }
        } else if(obj.equals(this.menu.getBtnBackToMainMenu())) {
            new ControllerMainMenu(model);
            menu.dispose();
        }
    }
    
}    
