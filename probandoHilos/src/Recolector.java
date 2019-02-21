import java.util.Random;

/**
 * Created by dasoler on 18/02/19.
 */
public class Recolector implements Runnable
{

    private int veces = 10;
    private Monitor monitor;

    public Recolector(Monitor mon){
        this.monitor = mon;
    }

    @Override
    public void run() {

        for(int i=0; i<veces; i++)
        {
            Random ram = new Random();
            int tiempo = ram.nextInt(3000)+1000;
            System.out.println("Recolector duerme: "+tiempo);

            try {
                Thread.sleep(tiempo);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }

            if (Buffer.numBuffer.size()>0) {
                int n = Buffer.numBuffer.get(0);
                System.out.println("Recolector coge el numero: "+n);
                Buffer.picker();
                monitor.doNotify();
                System.out.println("Recolector notifica");
            } else {
                i--;
                System.out.println("Recoletor duerme, buffer vacio");
                monitor.doWait();
            }
        }

    }
}
