<html>
<head>
<script>
    function esta(){
        alert("hola...");
        window.location = "menu1.php";
    }
    
            
    function esta1(){
        alert("hola user 2...");
        window.location = "menuform/menu2.php";
    }   
    
    function noesta(){
        alert("Cliente no existe...");
        window.location = "login.php";
            }           
</script>
</head>
<body>
<?php require_once('conexion.php')  ?>
<?php
mysql_select_db($database_prueba, $prueba);
$query_Recordset1 = "SELECT * FROM usuario WHERE nombre_usuario = '".$_POST['usuario']."' and clave_usuario='".$_POST['contrasena']."'" ;
$Recordset1 = mysql_query($query_Recordset1, $prueba) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 
ob_start();
?>
<title>control de login </title>
<?
//recuperar usuario
$usuario = $row_Recordset1['nombre'];
$permiso = $row_Recordset1['permiso'];
//iniciamos sesion 
session_start();
//asignamos variables de sesion 
 
$_SESSION['usuario']=$usuario;
$_SESSION['permiso']=$permiso;
//si la ejecución de la sentencia SQL nos da algún resultado 
//si existe la conbinación usuario/contraseña se da acceso
if ($totalRows_Recordset1!=0){ 
    //usuario y contraseña válidos 
  switch ($row_Recordset1['permiso']) {
   
   case 1:
        echo '<script>esta()</script>';
        break;
   case 2:
       echo '<script>esta1()</script>';
        break;  
    }
}else { 
    //si no existe le mando otra vez a la portada 
    echo '<script>noesta()</script>';
} 
?>
<?php
mysql_free_result($Recordset1);
 
ob_end_flush(); 
?>
</body>
</html>