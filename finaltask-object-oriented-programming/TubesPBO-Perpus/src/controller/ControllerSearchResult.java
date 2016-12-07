/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import models.Application;
import models.Buku;
import view.ListAllBuku;
import view.SearchResult;

/**
 *
 * @author g40
 */
public class ControllerSearchResult implements ActionListener{
    private SearchResult view;
    private Application model;

    public ControllerSearchResult(Application model, Buku buku){
        this.model = model;
        view = new SearchResult();
        view.setVisible(true);
        view.addListener(this);
        view.setBookSearch(buku);
    }
    
    @Override
    public void actionPerformed(ActionEvent e) {
        Object source = e.getSource();
        if(source.equals(view.getBtnBack())){
            new ControllerMainMenu(model);
            view.dispose();
        }
    }
}
