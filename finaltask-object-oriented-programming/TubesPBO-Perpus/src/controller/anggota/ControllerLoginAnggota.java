/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.anggota;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import models.Anggota;
import view.anggota.AnggotaLoginAnggota;
import models.Application;
/**
 *
 * @author Async
 */
public class ControllerLoginAnggota implements ActionListener{
    private AnggotaLoginAnggota login;
    private Application model;

    public ControllerLoginAnggota(Application model) {
        this.model = model;
        login = new AnggotaLoginAnggota();
        login.setVisible(true);
        login.addListener(this);
    }
    @Override
    public void actionPerformed(ActionEvent ae) {
        Object obj = ae.getSource();
        if(obj.equals(login.getBtnLoginAnggota())){
            String idFromLogin = login.getStringLoginAnggota();
            Anggota a = model.getAnggotaById(idFromLogin);
            if(a != null){
                new ControllerMainAnggota(model,a);
                login.dispose();
            }else {
                JOptionPane.showMessageDialog(null, "ID ANGGOTA TIDAK DITEMUKAN!!");
            }
        } else if(obj.equals(login.getBtnCancel())){
            new controller.ControllerMainMenu(model);
            login.dispose();
        }
    }
    
}
