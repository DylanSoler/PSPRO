/**
 * Created by dasoler on 18/02/19.
 */
public class Monitor
{
    Inutil inutilMonitorObject = new Inutil();

    public void doWait(){
        synchronized (inutilMonitorObject){
            try {
                inutilMonitorObject.wait();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    public void doNotify(){
        synchronized (inutilMonitorObject){
            inutilMonitorObject.notify();
        }
    }
}

class Inutil{}
