<?php
require_once '../auth.php';
require_once '../Models/cliente.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$Nomecliente = $_POST['Nomecliente'];


//---cliente---//
$cliente_imagem = $_POST['cliente_imagem'];
$CPFcliente = $_POST['CPFcliente'];
$Cotacliente = $_POST['Cotacliente'];
$Emailcliente = $_POST['Emailcliente'];
$Cidadecliente = $_POST['Cidadecliente'];
$Dapcliente = $_POST['Dapcliente'];
$Carcliente = $_POST['Carcliente'];
$Sicancliente = $_POST['Sicancliente'];
$Cadastrocliente = $_POST['Cadastrocliente'];
//$Public = $_POST['Public'];
$status = $_POST['status'];



//$iduser = $_POST['iduser']; 

if(isset($idUsuario) != NULL && $Nomecliente != NULL){

		if (!isset($_POST['idcliente'])){

			$NomeRepresentante = $_POST['NomeRepresentante'];
			$imageRepCliente = $_POST['imageRepCliente'];
			$TelefoneRepresentante = $_POST['TelefoneRepresentante'];
			$EmailRepresentante = $_POST['EmailRepresentante'];

			
			$cliente->Insertcliente($cliente_imagem, $Nomecliente, $CPFcliente, $Cotacliente, $Emailcliente, $Cidadecliente, $Dapcliente, $Carcliente, $Sicancliente, $Cadastrocliente, $idUsuario, $NomeRepresentante, $imageRepCliente, $TelefoneRepresentante, $EmailRepresentante, $status , $perm);
		

	}else{

		
			$idcliente = $_POST['idcliente'];
			$cliente->Updatecliente($idcliente, $Nomecliente, $CPFcliente, $Cotacliente, $Emailcliente, $Cidadecliente, $Dapcliente, $Carcliente, $Cadastrocliente, $idUsuario,  $status, $perm);		
			
		}
	}else{
			header('Location: ../../views/cliente/index.php?alert=3');
		}
		
	
 }else{
	header('Location: ../../views/cliente/index.php');
}