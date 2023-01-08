<?php

class db{
	public static $predeterminada=array('SGBD'=>'MYSQL','HOST'=>'localhost','PUERTO'=>'3306','BD'=>'ejecrud1','USUARIO'=>'root','CLAVE'=>'');
	public static $db;
	public static function conectar($argumentos=null){
		if (is_null($argumentos)):
			$argumentos=self::$predeterminada;
		endif;
		switch($argumentos){
			case($argumentos['SGBD'])=='MYSQL':
			case($argumentos['SGBD'])=='MARIADB':
				$host=$argumentos['HOST'];
				$puerto=$argumentos['PUERTO'];
				$bd=$argumentos['BD'];
				$usuario=$argumentos['USUARIO'];
				$clave=$argumentos['CLAVE'];
				$opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_LOCAL_INFILE=>true,PDO::ATTR_PERSISTENT => true);
				try{
					self::$db=new PDO('mysql:host='.$host.';port='.$puerto.';dbname='.$bd,$usuario,$clave,$opciones);
					return self::$db;
				}
				catch(PDOException $e){
			    	echo '<script type="text/javascript">swal("Error al conectarse al servidor '.$argumentos['SGBD'].'","'.$e->getMessage().'", "error");</script>';
			    }
		    break;
		    case($argumentos['SGBD'])=='SQLITE':
				$ruta=$argumentos['RUTA'];
				self::$db=new PDO('sqlite:'.$ruta.'',null,null, array(PDO::ATTR_PERSISTENT => true));
				return self::$db;
		    break;
		    default:
	        	die('<div align="center"><b>¡Error!</b> No se pudo conectar al <b>SGBD '.$argumentos['SGBD'].'</b>, No soportado...</div>');
		}
	}
	public static function desconectar()
	{
		self::$db=null;
		unset($db);
	}
}
?>
