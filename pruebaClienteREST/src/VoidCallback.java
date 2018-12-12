import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by dasoler on 29/11/18.
 */
public class VoidCallback implements Callback<Void>{


    @Override
    public void onResponse(Call<Void> call, Response<Void> response) {

        System.out.println(response.code()+", "+response.message());

    }

    @Override
    public void onFailure(Call<Void> call, Throwable throwable) {

        System.out.println("Peto");

    }
}
