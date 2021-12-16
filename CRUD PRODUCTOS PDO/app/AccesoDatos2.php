<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;

    public static function getModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }



    // Constructor privado  Patron singleton

    private function __construct()
    {

        $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DATABASE . ";charset=utf8";
        $this->dbh = new PDO($dsn, DB_USER, DB_PASSWD);

        //Consultas
        $this->stmt_productos  = $this->dbh->prepare("select * from PRODUCTOS");
        $this->stmt_producto   = $this->dbh->prepare("select * from PRODUCTOS where PRODUCTO_NO=:PRODUCTO_NO");
        $this->stmt_borpro   = $this->dbh->prepare("delete from PRODUCTOS where PRODUCTO_NO =:PRODUCTO_NO");
        $this->stmt_modpro   = $this->dbh->prepare("update PRODUCTOS set DESCRIPCION=:DESCRIPCION, PRECIO_ACTUAL=:PRECIO_ACTUAL, STOCK_DISPONIBLE=:STOCK_DISPONIBLE where PRODUCTO_NO=:PRODUCTO_NO");
        $this->stmt_creapro  = $this->dbh->prepare("insert into PRODUCTOS (PRODUCTO_NO,DESCRIPCION,PRECIO_ACTUAL,STOCK_DISPONIBLE) Values(?,?,?,?)");
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo()
    {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            $obj->stmt_productos = null;
            $obj->stmt_producto  = null;
            $obj->stmt_borpro  = null;
            $obj->stmt_modpro  = null;
            $obj->stmt_creapro = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }


    // SELECT Devuelvo la lista de Producto

    public function getProductos(): array
    {
        $tproduct = [];
        $this->stmt_productos->setFetchMode(PDO::FETCH_CLASS, 'Producto');

        if ($this->stmt_productos->execute()) {
            while ($pro = $this->stmt_productos->fetch()) {
                $tproduct[] = $pro;
            }
        }
        return $tproduct;
    }

    // Devuelvo un usuario o false
    public function getProducto(String $id)
    {
        $pro = false;

        $this->stmt_producto->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        $this->stmt_producto->bindParam(':PRODUCTO_NO', $id);
        if ($this->stmt_producto->execute()) {
            if ($obj = $this->stmt_producto->fetch()) {
                $pro = $obj;
            }
        }
        return $pro;
    }

    //UPDATE
    public function modProducto($product):bool{
      
        $this->stmt_modpro->bindValue(':PRODUCTO_NO',$product->PRODUCTO_NO);
        $this->stmt_modpro->bindValue(':DESCRIPCION',$product->DESCRIPCION);
        $this->stmt_modpro->bindValue(':PRECIO_ACTUAL',$product->PRECIO_ACTUAL);
        $this->stmt_modpro->bindValue(':STOCK_DISPONIBLE',$product->STOCK_DISPONIBLE);
        $this->stmt_modpro->execute();
        $resu = ($this->stmt_modpro->rowCount () == 1);
        return $resu;
    }


    //INSERT
    public function addProducto($product):bool{
        
        $this->stmt_creapro->execute( [$product->PRODUCTO_NO, $product->DESCRIPCION, $product->PRECIO_ACTUAL, $product->STOCK_DISPONIBLE]);
        $resu = ($this->stmt_creapro->rowCount () == 1);
        return $resu;
    }

    //DELETE 
    public function borrarProducto(String $pro):bool {
        $this->stmt_borpro->bindParam(':PRODUCTO_NO', $pro);
        $this->stmt_borpro->execute();
        $resu = ($this->stmt_borpro->rowCount () == 1);
        return $resu;
    }   

    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
    
}
