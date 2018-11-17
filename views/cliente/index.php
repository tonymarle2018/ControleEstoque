<?php
require_once '../../App/auth.php';
require_once '../../layout/script.php';
require_once '../../App/Models/cliente.class.php';

echo $head;
echo $header;
echo $aside;
echo '<div class="content-wrapper">
<!-- Content Header (Page header) -->
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
  ';
  require '../../layout/alert.php';
  echo '
  <!-- Small boxes (Stat box) -->
  <div class="row">
   <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>

      <h3 class="box-title">Lista de cliente do venda Balcão</h3>

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
    <div class="box-body">
      <ul class="todo-list not-done">';


        if(isset($_POST['public']) != NULL){               

          $value = $_POST['public']; 
          if($value == 1){
            $public = 0;
            $button_name = "Listar Desativados";

          }else{
            $public = 1;
            $button_name = "Listar Publicados";
          }     

        }else{
          $value = 1;
          $public = 0;
          $button_name = "Listar Desativados";
        }


        $cliente->index($value, $perm);

        echo '</ul>
        <br/>
        <!-- /.box-body -->
        <div class="left">
         <form action="index.php" method="post">

         <button name="public" type="submit" value="'.$public.'" class="btn btn-default pull-left"><i class="fa fa-plus"></i> '.$button_name.'</button></div></form>

           <a href="addcliente.php" type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add cliente</a>
         </div>
       </div>
       ';
       echo '</div>';
       echo '</section>';

       


       echo '</div>';

       echo  $footer;
       echo $javascript;
       ?>
