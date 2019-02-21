/**
 * Created by dasoler on 11/02/19.
 */
public class Main {

    public static void main (String[]args)
    {
        Buffer b = new Buffer();
        Monitor mon = new Monitor();

        Productor prod = new Productor(mon);
        Recolector recol = new Recolector(mon);

        Thread threadP = new Thread(prod);
        Thread threadR = new Thread(recol);

        threadP.start();
        threadR.start();
    }

}
