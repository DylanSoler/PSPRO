import java.util.ArrayList;

/**
 * Created by dasoler on 18/02/19.
 */
public class Buffer
{
    public static ArrayList<Integer> numBuffer = new ArrayList<>();
    public static int maximoCapacidad = 10;

    public synchronized static void add(int n)
    {
       if(numBuffer.size()<maximoCapacidad)
           numBuffer.add(n);
    }

    public synchronized static void picker()
    {
        if(numBuffer.size()>0)
            numBuffer.remove(0);

    }

}
