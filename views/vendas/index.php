<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/vendas.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
		<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Itens cadastrados
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Itens</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    ';
    require '../../layout/alert.php';
    echo '
      <!-- Small boxes (Stat box) -->
      <div class="row">
      	<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Lista de Itens</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">';
?>
            <form action="index.php" method="POST">
              <div class="box-body">

              <div class="form-group">
                <label for="exampleInputEmail1">CPF</label>
                <input type="text" name="CPFcliente" class="form-control" id="cpf" placeholder="CPF">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nome Cliente</label>
                <input type="text" name="Nomecliente" class="form-control" id="exampleInputEmail1" placeholder="Nome Cliente">
              </div>

              
              <div class="form-group">
              <label for="exampleInputEmail1">ID Item</label>
              <select name="id" class="form-control">
              <option value="1">1</option>
              </select>


              <div class="form-group">
                <label>Quantidade Item</label>
                <input type="text" class="form-control" name="quant">
              </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">NFe nº Nota</label>
                    <input type="text" name="" class="form-control" id="exampleInputEmail1" disabled="disabled">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="Emailcliente" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>
                                                   
                  
                   <input type="hidden" name="iduser" value="'.$idUsuario.'">
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="comprar" class="btn btn-primary" value="Cadastrar">Comprar</button>
                  <a class="btn btn-danger" href="../../views/prod">Cancelar</a>
                </div>
              </form>

<?php
          if(isset($_POST['id']) != NULL){
            $id = $_POST['id'];
            $quant = $_POST['quant'];
            $cliente = $_POST['Nomecliente'];
            $email = $_POST['Emailcliente'];
            $CPFcliente = $_POST['CPFcliente'];
            $vendas = new Vendas;
            $vendas->itensVendidos($id, $quant, $cliente, $email, $CPFcliente, $idUsuario, $perm);
          }

        echo'
          </div>
	 
';
echo '</div>';
echo '</section>';
      
       
	  

echo '</div>';

echo  $footer;
echo $javascript;
?>

