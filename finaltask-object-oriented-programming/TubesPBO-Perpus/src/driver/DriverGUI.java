/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package driver;

import view.MainMenu;
import controller.*;
import models.Application;
/**
 *
 * @author g40
 */
public class DriverGUI {
    public static void main(String[] args) {
        Application app = new Application();
        ControllerMainMenu contr = new ControllerMainMenu(app);
        Console console = new Console(app);
        console.mainMenu();
    }
}
