/**
 * Created by dasoler on 30/11/18.
 */
public class Pedido {

    private int id;
    private Producto[] productos;

    public Pedido(int id, Producto[] productos) {
        this.id = id;
        this.productos = productos;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public Producto[] getProductos() {
        return productos;
    }

    public void setProductos(Producto[] productos) {
        this.productos = productos;
    }
}
