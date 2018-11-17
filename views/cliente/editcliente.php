<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/cliente.class.php';

echo $head;
echo $header;
echo $aside;



echo '<div class="content-wrapper">';

if($perm == 3){
          echo "Você não tem permissão! </div>";

          exit();
        }
        
echo '<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">cliente</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">';

echo ' <a href="./" class="btn btn-success">Voltar</a>
      <div class="row">
        <!-- left column -->
';
        if(isset($_GET['id'])){

          $idcliente = $_GET['id'];
  
       $resp = $cliente->Editcliente($idcliente);


  echo '<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../../App/Database/insertcliente.php" method="POST">
              <div class="box-body">
              <div class="form-group">
                    <label for="exampleInputEmail1">Foto do Produtor</label>
                    <input id="arquivo" name="cliente_imagem" type="file" class="form-control" id="exampleInputEmail1" placeholder="imagem">
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome do Produtor</label>
                  <input type="text" name="Nomecliente" class="form-control" id="exampleInputEmail1" placeholder="Nome cliente" value="'.$resp['representante_cliente']['Nome'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CPF Cliente</label>
                  <input type="text" name="CPFcliente" class="form-control" id="exampleInputEmail1" placeholder="CPF" value="'.$resp['representante_cliente']['CPF'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cota</label>
                  <input type="text" name="Cotacliente" class="form-control" id="exampleInputEmail1" placeholder="Cota" value="'.$resp['representante_cliente']['Cota'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" name="Emailcliente" class="form-control" id="exampleInputEmail1" placeholder="E-mail" value="'.$resp['representante_cliente']['Email'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telefone</label>
                  <input type="text" name="Telefonecliente" class="form-control" id="exampleInputEmail1" placeholder="Telefone do Cliente" value="'.$resp['representante_cliente']['Telefone'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cidade</label>
                  <input type="text" name="Cidadecliente" class="form-control" id="exampleInputEmail1" placeholder="Cidade" value="'.$resp['representante_cliente']['Cidade'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">DAP</label>
                  <input type="text" name="Dapcliente" class="form-control" id="exampleInputEmail1" placeholder="Dap" value="'.$resp['representante_cliente']['Dap'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CAR</label>
                  <input type="text" name="Carcliente" class="form-control" id="exampleInputEmail1" placeholder="Car" value="'.$resp['representante_cliente']['Car'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sican</label>
                  <input type="text" name="Sicancliente" class="form-control" id="exampleInputEmail1" placeholder="Sican" value="'.$resp['representante_cliente']['Sican'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Data Cadastro</label>
                  <input type="text" name="Cadastrocliente" class="form-control" id="exampleInputEmail1" placeholder="Cadastro" value="'.$resp['representante_cliente']['Cadastro'].'">
                </div>
               

                <div class="box-header with-border">
                <h3 class="box-title">Pode comprar Milho no Nome do titular</h3>
                </div>

               <div class="form-group">
                  <label for="exampleInputEmail1">Foto do Autorizado</label>
                  <input type="text" name="imageRepCliente" class="form-control" id="exampleInputEmail1" placeholder="Foto" value="'.$resp['representante_cliente']['imageRep'].'">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Nome Representante</label>
                  <input type="text" name="NomeRepresentante" class="form-control" id="exampleInputEmail1" placeholder="Nome" value="'.$resp['representante_cliente']['NomeRep'].'">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CPF Representante</label>
                  <input type="text" name="CPFrepresentante" class="form-control" id="cpf" placeholder="CPF Representante" value="'.$resp['representante_cliente']['CPFrepresentante'].'">
                </div>
                          


                <div class="form-group">
                  <label for="exampleInputEmail1">Publicar</label>
                  
                  <select name="status">
                  ';
                    $Ativo = $resp['cliente']['Ativo'];
                  if($Ativo == 1){
                    $selected1 = "selected";
                    $selected0 = " ";
                  }else{
                    $selected1 = " ";
                    $selected0 = "selected";
                  }

                  echo '
                  <option value="1" '.$selected1.' >SIM</option>
                  <option value="0" '.$selected0.' >NÃO</option>
                  </select>
                  
                </div>
                                
                 <input type="hidden" name="iduser" value="'.$idUsuario.'">
                 <input type="hidden" name="idcliente" value="'.$idcliente.'">
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary" value="Cadastrar">Cadastrar</button>
                <a class="btn btn-danger" href="../../views/cliente">Cancelar</a>
              </div>
            </form>
          </div>
        <!-- /.box -->
          </div>
</div>';
 }//if

echo '</div>';
echo '</div>';
echo '</section>';
echo '</div>';
echo  $footer;
echo $javascript;
?>