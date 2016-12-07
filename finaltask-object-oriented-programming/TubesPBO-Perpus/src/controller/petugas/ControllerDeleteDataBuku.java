/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import view.petugas.DeleteDataBuku;
import controller.*;
import models.Application;
import models.Buku;

/**
 *
 * @author Fachri Ul
 */
public class ControllerDeleteDataBuku implements ActionListener {
    private DeleteDataBuku delete;
    private Application model;

    public ControllerDeleteDataBuku(Application model) {
        this.model = model;
        delete = new DeleteDataBuku();
        delete.setVisible(true);
        delete.addListener(this);
    }

    @Override
    public void actionPerformed(ActionEvent ae) {
        Object obj = ae.getSource();
        if(obj.equals(delete.getBtnSubmit())){
            String idBuku = delete.getStringTextFieldIdBuku();
            Buku buku = model.getBukuById(idBuku);
            if(model.getBukuById(idBuku)==null){
                JOptionPane.showMessageDialog(null,"Buku Tidak Ditemukan");
                delete.getTextFieldIdBuku().setText("");
            } else {
                model.deleteBuku(idBuku);
                JOptionPane.showMessageDialog(null,"Buku Berhasil Dihapus");
                model.saveDataBuku();
                delete.getTextFieldIdBuku().setText("");
            }
        }else if(obj.equals(delete.getBtnBack())){
            new controller.petugas.ControllerMainPetugas(model);
            delete.dispose();
        }
    }
 }
