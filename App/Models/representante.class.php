  <?php

  /*
   Class produtos
  */

   require_once 'connect.php';

    class Representante extends Connect
   {
   	
   	public function index($value = NULL)
      {
        if($value == NULL){
          $value = 1;
        }
   		$this->query = "SELECT * FROM `representante_cliente`, `fabricante` WHERE `Fabricante_idFabricante` = `idFabricante` AND (`repPublic` = '$value')";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

   		if($this->result){
   		
   			while ($row = mysqli_fetch_array($this->result)) {
   				
          if($row['Rep_Ativo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
            echo '<li '.$c.'>

          <!-- drag handle -->
          <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
          </span>
          <!-- checkbox -->
          <form class="label" name="ativ'.$row['idRepCliente'].'" action="../../App/Database/action.php" method="post">
                    <input type="hidden" name="id" id="id" value="'.$row['idRepCliente'].'">
                    <input type="hidden" name="status" id="status" value="'.$row['Rep_Ativo'].'">
                    <input type="hidden" name="tabela" id="tabela" value="representante">                  
                    <input type="checkbox" id="status" name="status" ';
                     if($row['Rep_Ativo'] == 1){ echo 'checked'; } 
                    echo ' value="'.$row['Rep_Ativo'].'" onclick="this.form.submit();" /></form>

                    <!-- todo text -->
                    <span class="text"><span class="badge left">'.$row['Nomecliente'].' </span> '.$row['NomeRepresentante'].'</span>
                    <!-- Emphasis label -->
                    <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
                    <!-- General tools such as edit or delete-->
                     <div class="tools right">

                      <a href="" data-toggle="modal" data-target="#myModalup'.$row['idRepCliente'].'"><i class="fa fa-edit"></i></a> 
                    
                      <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idRepCliente'].'">';

                    if($row['repPublic'] == 0){echo '<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>';}

                    echo '</a> </div>

    <!-- Modal -->

  <div class="modal fade" id="myModal'.$row['idRepCliente'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="delRep'.$row['idRepCliente'].'" name="delRep'.$row['idRepCliente'].'" action="../../App/Database/delRepresentante.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem serteza que deseja alterar o status deste item na sua lista.</h4>
          </div>
          <div class="modal-body">
            Nome: '.$row['NomeRepresentante'].'
          </div>
          <div class="modal-body">
            Nome: '.$row['TelefoneRepresentante'].'
          </div>
          <div class="modal-body">
            Nome: '.$row['EmailRepresentante'].'
          </div>
          <input type="hidden" id="idRepCliente" name="idRepCliente" value="'.$row['idRepCliente'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      
    </form>
    </div>

    <!-- Modal UPDATE -->
  <div class="modal fade" id="myModalup'.$row['idRepCliente'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="Up'.$row['idRepCliente'].'" name="Up'.$row['idRepCliente'].'" action="../../App/Database/insertrepresentante.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualização de dados.</h4>
          </div>
          <div class="modal-body">
            Nome Atual:
            <input type="text" id="NomeRepresentante" name="NomeRepresentante" value="'.$row['NomeRepresentante'].'">
          </div>
          <div class="modal-body">
            Nome Telefone Atual:
            <input type="text" id="TelefoneRepresentante" name="TelefoneRepresentante" value="'.$row['TelefoneRepresentante'].'">
          </div>
          <div class="modal-body">
            Nome Email Atual:
            <input type="text" id="EmailRepresentante" name="EmailRepresentante" value="'.$row['EmailRepresentante'].'">
          </div>        
          <input type="hidden" id="idFabricante" name="idFabricante" value="'.$row['Fabricante_idFabricante'].'">

          <input type="hidden" id="idRepCliente" name="idRepCliente" value="'.$row['idRepCliente'].'">
                   
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      </form>
    </div>
                  </li>';
                   				
   			}
   			
   		}

   	}

   	public function listRepresentantes(){

   		$this->query = "SELECT *FROM `representante_cliente`";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

   		if($this->result){
   		
   			while ($row = mysqli_fetch_array($this->result)) {
   				echo '<option value="'.$row['idRepCliente'].'">'.$row['NomeRepresentante'].'</option>';
   			}

   	}
   }

   	public function InsertRepresentante($NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $Fabricante_idFabricante, $idUsuario){

   		$this->query = "INSERT INTO `representante_cliente`(`idRepCliente`, `NomeRepresentante`, `TelefoneRepresentante`, `EmailRepresentante`,`Rep_Ativo`,`repPublic`, `Fabricante_idFabricante`, `idUsuario`) VALUES (NULL, '$NomeRepresentante', '$TelefoneRepresentante', '$EmailRepresentante', 1, 1, '$Fabricante_idFabricante', '$idUsuario')";
   		if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

   			header('Location: ../../views/representante/index.php?alert=1');
   		}else{
   			header('Location: ../../views/representante/index.php?alert=0');
   		}


   	}

    public function UpdateRepresentante($idRepCliente, $NomeRepresentante, $TelefoneRepresentante, $EmailRepresentante, $idUsuario)
    {
      $this->query = "UPDATE `representante_cliente` SET `NomeRepresentante`='$NomeRepresentante',`TelefoneRepresentante`='$TelefoneRepresentante',`EmailRepresentante`='$EmailRepresentante',`idUsuario`='$idUsuario' WHERE `idRepCliente` = '$idRepCliente'";

      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

        header('Location: ../../views/representante/index.php?alert=1');
      }else{
        header('Location: ../../views/representante/index.php?alert=0');
      }

    }

    public function DelRepresentante($id)
    {
        $this->query = "SELECT * FROM `representante_cliente` WHERE `idRepCliente` = '$id'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){

                $id = $row['idRepCliente'];
                $public = $row['repPublic'];

                if($public == 1){
                  $p = 0;
                }else{
                  $p = 1;
                }

                mysqli_query($this->SQL, "UPDATE `representante_cliente` SET `repPublic` = '$p' WHERE `idRepCliente` = '$id'") or die(mysqli_error($this->SQL));
                header('Location: ../../views/representante/index.php?alert=1');
        }else{
                header('Location: ../../views/representante/index.php?alert=0');
              } 

    }

    public function Ativo($value, $id)
  {

    if($value == 0){ $v = 1; }else{ $v = 0; }

    $this->query = "UPDATE `representante_cliente` SET `Rep_Ativo` = '$v' WHERE `idRepCliente` = '$id'";
    $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

    header('Location: ../../views/representante/');


    }//Ativo
    
   }

   $representante = new Representante;