/**
 * Created by dasoler on 30/11/18.
 */
public class Producto {

    private int cod;
    private String nombre;
    private double precio;

    public Producto(int cod, String nombre, double precio) {
        this.cod = cod;
        this.nombre = nombre;
        this.precio = precio;
    }

    public int getCod() {
        return cod;
    }

    public void setCod(int cod) {
        this.cod = cod;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }
}
