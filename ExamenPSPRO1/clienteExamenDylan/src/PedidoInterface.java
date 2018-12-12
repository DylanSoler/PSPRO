import retrofit2.Call;
import retrofit2.http.*;

import java.util.List;


public interface PedidoInterface {


	@GET("https://www.putsreq.com/zMlnOHfWCx0mS6kFSkJe")
    Call<List<Pedido>> getPedidos();

}
