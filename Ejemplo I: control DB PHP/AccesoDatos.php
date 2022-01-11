<?php
include_once "Pedido.php";
include_once "Cliente.php";
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
        $this->stmt_pedidos  = $this->dbh->prepare("select * from pedidos where cod_cliente =:COD_CLIENTE ");
        $this->stmt_login   = $this->dbh->prepare("select * from clientes where nombre=:NOMBRE and clave=:CLAVE");
        $this->stmt_entrada   = $this->dbh->prepare("update clientes set veces = veces + 1 where cod_cliente=:COD_CLIENTE");
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

    public function getPedidos($cod): array
    {
        $tproduct = [];
        $this->stmt_pedidos->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $this->stmt_pedidos->bindParam(':COD_CLIENTE', $cod);
        if ($this->stmt_pedidos->execute()) {
            while ($pro = $this->stmt_pedidos->fetch()) {
                $tproduct[] = $pro;
            }
        }
        return $tproduct;
    }

    public function getLogin($nombre,$clave){
        $this->stmt_login->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt_login->bindParam(':NOMBRE', $nombre);
        $this->stmt_login->bindParam(':CLAVE', $clave);
        if ($this->stmt_login->execute()) {
            return $this->stmt_login->fetch();
        }else return false;
    }
    
    public function entrada($cod){
        $this->stmt_entrada->bindParam(':COD_CLIENTE', $cod);
        $this->stmt_entrada->execute();
        return true;
    }
    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
    
}
