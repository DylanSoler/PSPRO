import java.util.Random;

/**
 * Created by dasoler on 18/02/19.
 */
public class Productor implements Runnable
{
    private int veces = 10;
    private Monitor monitor;

    public Productor(Monitor mon){
        this.monitor = mon;
    }

    @Override
    public void run() {

        for(int i=0; i<veces; i++)
        {
            Random ram = new Random();
            int tiempo = ram.nextInt(3000)+1000;
            System.out.println("Productor duerme: "+tiempo);

            try {
                Thread.sleep(tiempo);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }

            if (Buffer.numBuffer.size() < Buffer.maximoCapacidad) {
                Buffer.add(i);
                System.out.println("Productor añade "+i);
                monitor.doNotify();
                System.out.println("Productor notifica ");
            } else {
                i--;
                System.out.println("Productor duerme (Buffer lleno)");
                monitor.doWait();
            }
        }

    }
}
