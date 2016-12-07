/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.petugas;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import view.petugas.AddDataBuku;
import controller.*;
import static java.awt.SystemColor.menu;
import javax.swing.JOptionPane;
import models.Application;
/**
 *
 * @author Fachri Ul
 */
public class ControllerAddDataBuku implements ActionListener {
    private AddDataBuku data;
    private Application model;

    public ControllerAddDataBuku(Application model) {
        this.model = model;
        data = new AddDataBuku();
        data.setVisible(true);
        data.addListener(this);
    }
    
    @Override
    public void actionPerformed(ActionEvent ae) {
        Object obj = ae.getSource();
        if(obj.equals(data.getBtnBack())){
            new controller.petugas.ControllerMainPetugas(model);
            data.dispose();
        }else if(obj.equals(data.getBtnSubmit())){
            try {
                String judul = data.getStringTextFieldJudul();
                int stock = Integer.parseInt(data.getStringTextFieldStock());
                data.getStringTextFieldJudul();
                String penulis = data.getStringTextPenulis();
                String penerbit = data.getStringTextPenerbit();
                String isbn = data.getStringTextISBN();

                model.addBuku(judul,stock,penulis, penerbit, isbn);
                model.saveDataBuku();

                JOptionPane.showMessageDialog(null,"Buku Berhasil Disubmit");
                new ControllerMainPetugas(model);
                data.dispose();
            } catch (Exception exx){
                JOptionPane.showMessageDialog(null,"Isi stock dengan angka!!");
            }

        }
        
   }
}
