/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import view.petugas.CekStatusBuku;
import controller.*;
import static java.awt.SystemColor.menu;
import javax.swing.JOptionPane;
import models.Application;
import models.Buku;
/**
 *
 * @author Fachri Ul
 */
public class ControllerCekStatusBuku implements ActionListener {
    private CekStatusBuku status;
    private Application model;

    public ControllerCekStatusBuku(Application model) {
        this.model = model;
        status = new CekStatusBuku();
        status.setVisible(true);
        status.AddListener(this);
                
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        Object obj = ae.getSource();
        if(obj.equals(status.getBtnOk())){
            String idBuku = status.getStringIdBuku();
            Buku buku = model.getBukuById(idBuku);
            if(buku != null){
                status.setDetailBuku(buku);
            }else {
                JOptionPane.showMessageDialog(null, "ID BUKU TIDAK DITEMUKAN!!");
            }
        }else if(obj.equals(status.getBtnBack())){
            new controller.petugas.ControllerMainPetugas(model);
            status.dispose();
        }
    }
    
}

