/**
 * Created by dasoler on 18/02/19.
 */
public class Monitor
{
    Monitor myMonitor = new Monitor();

    public void doWait(){
        synchronized (myMonitor){
            try {
                myMonitor.wait();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    public void doNotify(){
        synchronized (myMonitor){
                myMonitor.notify();
        }
    }
}
