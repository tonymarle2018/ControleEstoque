<?php

/**
* Vendas
*/

require_once 'connect.php';

class Vendas extends Connect
{

                                            /*parametos da função*/
	public function itensVendidos($iditem, $quant, $cliente, $email, $CPFcliente, $idUsuario, $perm)
	{

    	
        if($perm == 3){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `itens` WHERE `idItens`= '$iditem'";
        $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

        if($this->result){

        		//------Verificação da Venda-----------

        		if($row = mysqli_fetch_array($this->result)){

        			$q = $row['QuantItens'];
        			$v = $row['QuantItensVend'];

        			$quantotal = $v + $quant;

        			if($q >= $quantotal){

                        $valor = ($row['ValVendItens'] * $quant);

                        $id = Vendas::idcliente($CPFcliente);

                        if($id > 0){
                            $idcliente = $id;
                        }else{

                            $this->novoclient = "INSERT INTO `cliente`(`idcliente`, `Nomecliente`, `Emailcliente`, `CPFcliente`, `Ativo`, `Usuario_idUser`) VALUES (NULL,'$cliente','$email','$CPFcliente',1,'$idUsuario')";

                               if(mysqli_query($this->SQL, $this->novoclient) or die (mysqli_error($this->SQL))){
                                $idcliente = mysqli_insert_id($this->SQL);
                             }                            
                        }
                        
                        
                        $this->query = "INSERT INTO `vendas`(`idvendas`, `quantitens`, `valor`, `iditem`, `cliente_idcliente`, `idusuario`) VALUES (NULL, '$quant', '$valor', '$iditem', '$idcliente', '$idUsuario')";
                        if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){


        				$this->query = "UPDATE `itens` SET `QuantItensVend` = '$quantotal' WHERE `idItens`= '$iditem'";
        				if($this->result = mysqli_query($this->SQL, $this->query) or die (mysqli_error($this->SQL))){

        					echo 'Venda efetuada!';
                        }

        				}else{
        					echo 'Não foi possivel efetuar a venda!';
        				}

        			}else{

        				$estoque = $row['QuantItens'] - $row['QuantItensVend'];
        				echo 'Quantidade maior do que em estoque! </br> Quantidade em estoque disponivel: '.$estoque;
        			}


        		}


        		//------------------

        }else{
        	header('Location: ../../views/vendas/index.php?alert=0');
        }


	}// itensVendidos

    public function idcliente($CPFcliente){

        $this->client = "SELECT * FROM `cliente` WHERE `CPFcliente` = '$CPFcliente'";

            if($this->resultcliente = mysqli_query($this->SQL, $this->client)  or die (mysqli_error($this->SQL))){

                $row = mysqli_fetch_array($this->resultcliente);
                return $idcliente = $row['idcliente'];
            }
    }

}//Class