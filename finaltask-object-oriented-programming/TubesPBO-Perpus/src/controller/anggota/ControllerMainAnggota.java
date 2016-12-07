/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller.anggota;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import models.Anggota;
import view.anggota.AnggotaMainAnggota;
import models.Application;
/**
 *
 * @author Async
 */
public class ControllerMainAnggota implements ActionListener{
    private AnggotaMainAnggota main;
    private Application model;
    private Anggota anggota;
    
    public ControllerMainAnggota(Application model,Anggota agt){
        this.model = model;
        main = new AnggotaMainAnggota();
        main.setVisible(true);
        main.addListener(this);
        this.anggota = agt;
    }
    @Override
    public void actionPerformed(ActionEvent ae) {
        Object obj = ae.getSource();
        if(obj.equals(main.getBtnDetilPjm())){
            new controller.anggota.ControllerAnggotaDetilPeminjaman(model,anggota);
            main.dispose();
        }else if(obj.equals(main.getBtnListPjmAktif())){
            new controller.anggota.ControllerAnggotaPjmAktif(model,anggota);
            main.dispose();
        }else if(obj.equals(main.getBtnLogout())){
            new controller.ControllerMainMenu(model);
            main.dispose();
        }else if(obj.equals(main.getBtnRiwayatPeminjaman())){
            new controller.anggota.ControllerRiwayatPjm(model,anggota);
            main.dispose();
        }
    }
    
}
