/**
 * Created by dasoler on 11/02/19.
 */
public class Main {

    public static void main (String[]args)
    {
        Buffer b = new Buffer();
        Productor prod = new Productor(b);
        Recolector recol = new Recolector(b);

        Thread threadP = new Thread(prod);
        Thread threadR = new Thread(recol);

        threadP.start();
        threadR.start();
    }

}
