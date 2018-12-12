import retrofit2.Call;
import retrofit2.http.*;

import java.util.List;


public interface LibroInterface {

	@GET("/libro/{id}")
	Call<Libro> getLibro(@Path("id") int id);

	@GET("/libro")
	Call<List<Libro>> getLibro();

	@DELETE("/libro/{id}")
	Call<Void> deleteLibro(@Path("id") int id);

	@Headers({"Content-type:application/json"})
	@PUT("/libro/{id}")
	Call<Void> putLibro(@Path("id") int id, @Body Libro libro);

	@Headers({"Content-type:application/json"})
	@POST("/libro/")
	Call<Void> postLibro(@Body Libro libro);

	@DELETE("/libro")
	Call<Void> deleteLibro();

	@GET("/libro")
	Call<List<Libro>> getLibroFiltered(@Query("numpagMax") int numpagMax);
}
