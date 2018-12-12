import java.io.IOException;
import com.google.gson.Gson;
import okio.*;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;





/***************************************
 * SE PUEDEN DESCARGAR JARS DE CONVERTIDORES DE AQUÍ:
 * http://search.maven.org/
 * 
 * Por ejemplo:
 * http://search.maven.org/#search%7Cga%7C1%7Cg%3A%22com.squareup.retrofit2%22
 * 
 * Si usamos gradle, simplemente añadiríamos la dependencia:
 * com.squareup.retrofit2:converter-gson/home/migue/Descargas/converter-gson-2.1.0.jar
 *
 */



public class Principal {
	
	private final static String SERVER_URL = "http://pruebaREST:8080";

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		Retrofit retrofit;
		
		retrofit = new Retrofit.Builder()
							   .baseUrl(SERVER_URL)
							   .addConverterFactory(GsonConverterFactory.create())
							   .build();
		
		LibroInterface libroInter = retrofit.create(LibroInterface.class);

		//get libro
		LibroCallback libroCallback = new LibroCallback();
		libroInter.getLibro(9).enqueue(libroCallback);

		//get coleccion
		ColeccionLibroCallback coleccion = new ColeccionLibroCallback();
		libroInter.getLibro().enqueue(coleccion);

		//delete libro
		VoidCallback voidCallback = new VoidCallback();
		libroInter.deleteLibro(10).enqueue(voidCallback);

		//put libro
		Libro libro = new Libro();
		libro.setCodigo(7);
		libro.setTitulo("Actualizando desde el cliente");
		libro.setNumpag("60");
		libroInter.putLibro(7,libro).enqueue(voidCallback);

		//post libro
		libro.setCodigo(0);
		libro.setTitulo("Insertando desde el cliente");
		libro.setNumpag("66");
		libroInter.postLibro(libro).enqueue(voidCallback);

		//delete coleccion
		libroInter.deleteLibro().enqueue(voidCallback);

		//get con query
		libroInter.getLibroFiltered(100).enqueue(coleccion);

	}


	


}
