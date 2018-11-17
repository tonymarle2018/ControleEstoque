<?php
require_once '../auth.php';
require_once '../Models/fabricante.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$NomeFabricante = $_POST['NomeFabricante'];


//---Fabricante---//
$CNPJFabricante = $_POST['CNPJFabricante'];
$EmailFabricante = $_POST['EmailFabricante'];
$EnderecoFabricante = $_POST['EnderecoFabricante'];
$TelefoneFabricante = $_POST['TelefoneFabricante'];
$Public = $_POST['Public'];
$status = $_POST['status'];

//--Representante--//
			$NomeRepresentante = $_POST['NomeRepresentante'];
			$TelefoneRepresentante = $_POST['TelefoneRepresentante'];
			$EmailRepresentante = $_POST['EmailRepresentante'];

$iduser = $_POST['iduser'];

if($iduser == $idUsuario && $NomeFabricante != NULL && $NomeRepresentante != NULL && $TelefoneRepresentante != NULL && $EmailRepresentante != NULL){

		

			
			$fabricante->InsertFabricante($NomeFabricante, $CNPJFabricante, $EmailFabricante, $EnderecoFabricante, $TelefoneFabricante, $idUsuario,  $NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $status, $perm);
		

	}else{

		if (!isset($_POST['idFabricante'])){
			$idFabricante = $_POST['idFabricante'];
			$fabricante->UpdateFabricante($idFabricante, $NomeFabricante, $CNPJFabricante, $EmailFabricante, $EnderecoFabricante, $TelefoneFabricante, $Public, $idUsuario , $perm);		
			
		
	}else{
			header('Location: ../../views/fabricante/index.php?alert=3');
		}
		
	}
 }else{
	header('Location: ../../views/fabricante/index.php');
}

