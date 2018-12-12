import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * Created by dasoler on 30/11/18.
 */
public class Principal {

    private final static String SERVER_URL = "https://putsreq.com";

    public static void main (String[]args){


        Retrofit retrofit;

        retrofit = new Retrofit.Builder()
                .baseUrl(SERVER_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        PedidoInterface pedidoInter = retrofit.create(PedidoInterface.class);

        //get coleccion
        PedidosCallback coleccion = new PedidosCallback();
        pedidoInter.getPedidos().enqueue(coleccion);
    }
}
