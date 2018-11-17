<?php
require_once '../auth.php';
require_once '../Models/representante.class.php';

if(isset($_POST['update']) == 'Cadastrar'){

//--Representante--//
$NomeRepresentante = $_POST['NomeRepresentante'];
$TelefoneRepresentante = $_POST['TelefoneRepresentante'];
$EmailRepresentante = $_POST['EmailRepresentante'];
$idcliente = $_POST['idcliente'];



if($idUsuario != NULL && $idcliente != NULL && $NomeRepresentante != NULL && $TelefoneRepresentante != NULL && $EmailRepresentante != NULL){

		if (isset($_POST['idRepCliente'])){

			$idRepCliente = $_POST['idRepCliente'];

						$representante->UpdateRepresentante($NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $idUsuario);		
			
		}elseif($_POST['iduser'] == $idUsuario){
			
			$representante->InsertRepresentante(null, $NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $idUsuario);
		}

	}else{
		header('Location: ../../views/representante/index.php?alert=3');
	}


 }else{
	header('Location: ../../views/representante/index.php');
}