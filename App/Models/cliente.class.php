    <?php

    /*
     Class Cliente
    */


     require_once 'connect.php';

      class cliente extends Connect    /*pede herança de connect
                                        banco de dados*/

    {
      public function index($value)
    {
      $this->query = "SELECT * FROM `cliente` WHERE (`idcliente` = `idcliente`) AND `Public` = '$value'";
      $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

      if($this->result){

        echo '<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Ativo</th>
        <th>Nome Cliente</th>
        <th>CPF </th>
        <th>Cota </th>
        <th>Email </th>
        <th>Cidade</th>
        <th>DAP</th>
        <th>CAR</th>
        <th>SICAN</th>
        <th>Data de Cadastro</th>
        <th>Edit</th>
        <th>Public</th>
      </tr>
    </thead>
    <tbody>';

        while ($row = mysqli_fetch_array($this->result)) {

          if($row['Ativo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
          echo '<tr '.$c.'><th>
          <!-- drag handle -->
          <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
          </span>

          <!-- checkbox -->';
          $id = $row['idcliente'];
          $Ativo = $row['Ativo'];

          echo '<form class="label" name="ativ'.$id.'" action="../../App/Database/action.php" method="post">
          <input type="hidden" name="id" id="id" value="'.$id.'">
          <input type="hidden" name="status" id="status" value="'.$Ativo.'">
          <input type="hidden" name="tabela" id="tabela" value="cliente">  
          <input type="checkbox" id="status" name="status" ';
          if($Ativo == 1){ echo 'checked'; } 
          echo ' value="'.$Ativo.'" onclick="this.form.submit();"></form>
          </th>
          <td>'.$row['Nomecliente'].'</td>
          <td>'.$row['CPFcliente'].'</td>
          <td>'.$row['Cotacliente'].'</td>
          <td>'.$row['Emailcliente'].'</td>
          <td>'.$row['Cidadecliente'].'</td>
          <td>'.$row['Dapcliente'].'</td>
          <td>'.$row['Carcliente'].'</td>
          <td>'.$row['Sicancliente'].'</td>
          <td>'.$row['Cadastrocliente'].'</td>
                 
          
          <td>
                <a href="editcliente.php?q='.$row['idcliente'].'"><i class="fa fa-edit"></i></a>
          </td>
          <td>
              <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idcliente'].'">';

                    if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>';}

                    echo '</a>


  <!-- Modal -->

  <div class="modal fade" id="myModal'.$row['idcliente'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="delFab'.$row['idcliente'].'" name="delcliente'.$row['idcliente'].'" action="../../App/Database/delCliente.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem certeza que deseja alterar o status deste item na sua lista.</h4>
          </div>
          <div class="modal-body">
            Nome: '.$row['Nomecliente'].'
          </div>

          <input type="hidden" id="idcliente" name="idcliente" value="'.$row['idcliente'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      
    </form>
    </div>
    

          </td>
            </tr>';

          }
          echo '</tbody>
  </table>';
        }

      }

      

     	public function listcliente(){

        
     		$this->query = "SELECT * FROM `cliente` WHERE (`Public` = 1) AND (`Ativo` = 1)";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

     		if($this->result){
     		
     			while ($row = mysqli_fetch_array($this->result)) {
            if($value == $row['idcliente']){
              $selected = "selected";
            }else{
              $selected = "";
            }
     				echo '<option value="'.$row['idcliente'].'" '.$selected.' >'.$row['Nomecliente'].'</option>';
     			}

     	}

     }


 

     	public function Insertcliente($cliente_imagem, $Nomecliente, $CPFcliente, $Cotacliente, $Emailcliente, $Cidadecliente, $Dapcliente, $Carcliente, $Sicancliente, $Cadastrocliente, $idUsuario, $imageRepCliente, $NomeRepresentante, $CPFrepresentante, $status , $perm)
      {

        if($perm == 3){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `cliente` WHERE `Nomecliente` = '$Nomecliente'";
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        if($row = mysqli_fetch_array($this->result)){          

          $idcliente = $row['idcliente'];

        }else{

     		$this->query2 = "INSERT INTO `cliente` (
          `idcliente`, 
          `cliente_imagem`, 
          `Nomecliente`, 
          `CPFcliente`, 
          `Cotacliente`,
          `Telefonecliente`,
          `Emailcliente`, 
          `Cidadecliente`, 
          `Dapcliente`, 
          `Carcliente`, 
          `Sicancliente`, 
          `Cadastrocliente`, 
          `Public`, 
          `Ativo`, 
          `Usuario_idUser`) 
          VALUES ( NULL, NULL, '$Nomecliente', '$CPFcliente', '$Cotacliente', '$Telefonecliente', '$Emailcliente', '$Cidadecliente', '$Dapcliente', '$Carcliente', '$Sicancliente', '$Cadastrocliente', 1, 1, '$idUsuario')";
     		
        if($this->result2 = mysqli_query($this->SQL, $this->query2) or die(mysqli_error($this->SQL))){

          $idcliente = mysqli_insert_id($this->SQL);

        }
      }
        
          if($NomeRepresentante != NULL){

          $this->representante = "INSERT INTO `representante_cliente`(`idRepresentante`, `imageRepCliente`, `NomeRepresentante`, `CPFrepresentante`, `Usuario_idUsuario`) VALUES (NULL, '$imageRepCliente', '$NomeRepresentante', '$CPFrepresentante', '$idcliente')";
             
              if($this->rep = mysqli_query($this->SQL, $this->representante) or die(mysqli_error($this->SQL))){
                  header('Location: ../../views/cliente/index.php?alert=1'); 
              }else{
                  header('Location: ../../views/cliente/index.php?alert=0');
              }                      
            
          }else{
                header('Location: ../../views/cliente/index.php?alert=0');
              }
          
            
     	}//Insert

      public function Editcliente($idcliente){

        $this->query = "SELECT *FROM `cliente` , `representante_cliente`  WHERE `idcliente` = '$idcliente'";
        if($this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL))){

          if($row = mysqli_fetch_array($this->result)){

            $Nomecliente = $row['Nomecliente'];
            $CPFcliente = $row['CPFcliente'];
            $Cotacliente = $row['Cotacliente'];
            $Telefonecliente = $row['Telefonecliente'];
            $Emailcliente = $row['Emailcliente'];
            $Cidadecliente = $row['Cidadecliente'];
            $Dapcliente = $row['Dapcliente'];
            $Carcliente = $row['Carcliente'];
            $Sicancliente = $row['Sicancliente'];
            $Cadastrocliente = $row['Cadastrocliente'];
            $imageRepCliente = $row['imageRepCliente'];
            $NomeRepresentante = $row['NomeRepresentante'];
            $CPFrepresentante = $row['CPFrepresentante'];
                      

            $Ativo = $row['Ativo'];
            $Usuario_idUser = $row['Usuario_idUser'];

              $array = array('cliente' , 'representante_cliente' => [ 'Nome' => $Nomecliente, 'CPF' => $CPFcliente, 'Cota'=> $Cotacliente, 'Telefone'=> $Telefonecliente, 'Email'=> $Emailcliente, 'Cidade'=>$Cidadecliente, 'Dap'=>$Dapcliente, 'Car'=>$Carcliente, 'Sican'=>$Sicancliente, 'Cadastro'=>$Cadastrocliente, 'imageRep' => $imageRepCliente, 'NomeRep' => $NomeRepresentante, 'CPFrepresentante' => $CPFrepresentante, 'Ativo' => $Ativo, 'Usuario' => $Usuario_idUser,]);
              return $array;
          }

        }else{
          return 0;
        }



      }

      public function Updatecliente($idcliente, $Nomecliente, $CPFcliente, $Cotacliente, $Telefonecliente, $Emailcliente, $Cidadecliente, $Dapcliente, $Carcliente, $Cadastrocliente, $idUsuario,  $status, $perm)
      {

        if($perm == 3){
          echo "Você não tem permissão!";
          exit();
        }

        $this->representante = "UPDATE `cliente` SET `Nomecliente`= '$Nomecliente', `CPFcliente`='$CPFcliente',`Cotacliente`='$Cotacliente', `Telefonecliente`='$Telefonecliente', `Emailcliente`='$Emailcliente',`Cidadecliente`='$Cidadecliente', `Ativo` = '$status' ,`Usuario_idUser`='$idUsuario' WHERE `idcliente` = '$idcliente'";

        if($this->rep = mysqli_query($this->SQL, $this->representante) or die(mysqli_error($this->SQL))){

                  header('Location: ../../views/cliente/index.php?alert=1'); 
              }else{
                  header('Location: ../../views/cliente/index.php?alert=0');
              } 


      }//update

      public function Delcliente($idcliente, $perm)
      {

        if($perm == 3){
          echo "Você não tem permissão!";
          exit();
        }

        $this->query = "SELECT * FROM `cliente` WHERE `idcliente` = '$idcliente'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){

                $id = $row['idcliente'];
                $public = $row['Public'];

                if($public == 1){
                  $p = 0;
                }else{
                  $p = 1;
                }

                mysqli_query($this->SQL, "UPDATE `cliente` SET `Public` = '$p' WHERE `idcliente` = '$id'") or die(mysqli_error($this->SQL));
                header('Location: ../../views/cliente/index.php?alert=1');
        }else{
                header('Location: ../../views/cliente/index.php?alert=0');
        } 
        
  }
    
    public function Ativo($value, $id)
    {
      if($value == 0){ $v = 1; }else{ $v = 0; }

      $this->query = "UPDATE `cliente` SET `Ativo` = '$v' WHERE `idcliente` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
         
      header('Location: ../../views/cliente/');
      
    }

  }

     $cliente = new cliente;
