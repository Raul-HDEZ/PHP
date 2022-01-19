<?php
include_once "Producto.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería PDO
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
        $this->stmt_no_pedidos = $this->dbh->prepare("select * from PRODUCTOS where PRODUCTO_NO NOT IN (SELECT PRODUCTO_NO FROM PEDIDOS) " );
        $this->stmt_descuento = $this->dbh->prepare("update productos set precio_actual = precio_actual * 1,10 where producto_no=:PRODUCTO_NO");
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo()
    {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            $obj->stmt_pedidos = null;
            $obj->stmt_login = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }


    // SELECT Devuelvo la lista de Producto

    public function getPedidos(): array
    {
        $tproduct = [];
        $this->stmt_no_pedidos->setFetchMode(PDO::FETCH_CLASS, 'Producto');
        if ($this->stmt_no_pedidos->execute()) {
            while ($pro = $this->stmt_no_pedidos->fetch()) {
                $tproduct[] = $pro;
            }
        }
        return $tproduct;
    }

    public function descuento($cod){
        $this->stmt_descuento->bindParam(':PRODUCTO_NO', $cod);
        return $this->stmt_descuento->execute();
    }

    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
    
}
