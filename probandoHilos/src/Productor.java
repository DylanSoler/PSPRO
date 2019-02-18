import java.util.Random;

/**
 * Created by dasoler on 18/02/19.
 */
public class Productor implements Runnable
{
    private Buffer buffer;
    private int veces = 10;
    private Monitor monitor;

    public Productor(Buffer b, Monitor mon){
        this.buffer = b;
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

            if (buffer.getNumBuffer().size() > buffer.maximoCapacidad) {
                buffer.add(i);
                monitor.doNotify();
            } else {
                i--;
                monitor.doWait();
            }
        }

    }
}
