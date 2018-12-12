import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import java.util.List;

/**
 * Created by dasoler on 30/11/18.
 */
public class PedidosCallback implements Callback<List<Pedido>> {

    @Override
    public void onResponse(Call<List<Pedido>> call, Response<List<Pedido>> response) {

        List<Pedido> pedidos;
        pedidos = response.body();

        if(response.isSuccessful())
        {
            for(Pedido p : pedidos)
            {
                System.out.println(p.getId()+"\n");

                Producto[] products = p.getProductos();

                for(Producto pr : products)
                {
                    System.out.println("productos: \n"+pr.getCod()+",\n"+pr.getNombre()+",\n"+pr.getPrecio());
                }
            }
        }
        else
        {
            System.out.println(response.code()+", "+response.message());
        }
    }

    @Override
    public void onFailure(Call<List<Pedido>> call, Throwable throwable) {

    }
}
