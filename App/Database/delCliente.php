<?php
require_once '../auth.php';
require_once '../Models/cliente.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

$idcliente = $_POST['idcliente'];

$cliente->Delcliente($idcliente);

}else{
	header('Location: ../../views/cliente/index.php');
}

?>