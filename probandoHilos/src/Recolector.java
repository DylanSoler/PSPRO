import java.util.Random;

/**
 * Created by dasoler on 18/02/19.
 */
public class Recolector implements Runnable
{

    private Buffer buffer;
    private int veces = 10;
    private Monitor monitor;

    public Recolector(Buffer b, Monitor mon){
        this.buffer = b;
        this.monitor = mon;
    }

    @Override
    public void run() {

        for(int i=0; i<veces; i++)
        {
            Random ram = new Random();
            int tiempo = ram.nextInt(3000)+1000;

            try {
                Thread.sleep(tiempo);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }

            if (buffer.getNumBuffer().size()>0) {
                int n = buffer.getNumBuffer().get(0);
                buffer.picker();
                monitor.doNotify();
            } else {
                i--;
                monitor.doWait();
            }
        }

    }
}
