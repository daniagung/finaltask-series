package driver;
import models.*;
/**
 *
 * @author g40
 */
public class DriverConsole {
    public static void main(String[] args) {
        Application app = new Application();
        Console console = new Console(app);
        console.mainMenu();
    }
    
}
