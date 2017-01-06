<?php
$db_host="localhost";
$db_user="usuario_base_de_datos";
$db_password="clave__base_de_datos";
$db_name="nombre_base_de_datos";
$db_table_name="tabla_base_de_datos";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);
 
if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['name']);
$subs_email = utf8_decode($_POST['email']);
$subs_tema = utf8_decode($_POST['tema']);
$subs_mensaje = utf8_decode($_POST['mensaje']);
 
$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."'", $db_connection);

	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`name` , `email` , `tema`, `mensaje`) VALUES ("' . $subs_name . '", "' . $subs_email . '", "' . $subs_tema . '", "' . $subs_mensaje . '")';
 
mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);
 
if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: index.html');

 
mysql_close($db_connection);
		
?>
