/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import view.petugas.LoginPetugas;
import controller.*;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import models.Application;

/**
 *
 * @author Fachri Ul
 */
public class ControllerLoginPetugas implements ActionListener {
    private LoginPetugas login;
    private Application model;

    public ControllerLoginPetugas(Application model) {
        this.model = model;
        login = new LoginPetugas();
        login.addListener(this);
        login.setVisible(true);
        
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        Object object = ae.getSource();
        if(object.equals(login.getBtnBack())){
            new controller.ControllerMainMenu(model);
            login.dispose();
        } else if(object.equals(login.getBtnLogin())) {
            String idPetugas = login.getStringTextFieldId();
            if(model.getPetugasById(idPetugas)==null){
                JOptionPane.showMessageDialog(null,"ID Tidak Ditemukan");
            }else{
            new controller.petugas.ControllerMainPetugas(model);
            login.dispose();
            }
        } 
    }
    
}
