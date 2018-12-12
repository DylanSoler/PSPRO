//import javax.security.auth.callback.Callback;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import okhttp3.Headers;

import java.util.List;

/**
 * Created by dasoler on 29/11/18.
 */
public class ColeccionLibroCallback implements Callback<List<Libro>> {


    @Override
    public void onResponse(Call<List<Libro>> call, Response<List<Libro>> response) {

        List<Libro> libros;
        libros = response.body();

        if(response.isSuccessful())
        {
            for(Libro libro : libros)
            {
                System.out.println(libro.getCodigo()+" "+libro.getTitulo()+" "+libro.getNumpag());
            }
        }
        else
        {
            System.out.println(response.code()+", "+response.message());
        }

    }

    @Override
    public void onFailure(Call<List<Libro>> call, Throwable throwable) {

        int i;

        i=0;

    }
}
