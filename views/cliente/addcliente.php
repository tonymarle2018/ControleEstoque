  <?php
  require_once '../../App/auth.php';
  require_once '../../layout/script.php';

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
          Adicionar <small>cliente</small>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">cliente</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="../../App/Database/insertcliente.php" method="POST">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto do Produtor</label>
                    <input id="arquivo" name="cliente_imagem" type="file" class="form-control" id="exampleInputEmail1" placeholder="imagem">
                    <br/><br/>

                    <label for="exampleInputEmail1">Nome do Produtor</label>
                    <input type="text" name="Nomecliente" class="form-control" id="exampleInputEmail1" placeholder="Nome cliente">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input type="text" name="CPFcliente" class="form-control" id="cpf" placeholder="CPF">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefone Cliente</label>
                    <input type="text" name="Telefonecliente" class="form-control" id="telefone" placeholder="Telefone do Cliente">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="Emailcliente" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cota</label>
                    <input type="text" name="Cotacliente" class="form-control" id="exampleInputEmail1" placeholder="Cota">
                  </div>
                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Cidade</label>
                    <select name="Cidadecliente" class="form-control">
                    <option value="1"></option>
                    <option value="2">Acrelandia</option>
                    <option value= "3">Assis Brasil</option>
                    <option value= "4">Brasileia</option>
                    <option value= "5">Bujari</option>
                    <option value= "6">Capixaba</option>
                    <option value= "7">Cruzeiro do Sula</option>
                    <option value= "8">Epitaciolandia</option>
                    <option value= "9">Feijo</option>
                    <option value= "10">Manoel Urbano</option>
                    <option value= "11">Mancio Lima</option>
                    <option value= "12">Placido de Castro</option>
                    <option value= "13">Porto Acre</option>
                    <option value= "14">Porto Walter</option>
                    <option value= "15">Rio Branco</option>
                    <option value= "16">Rodrigues Alves</option>
                    <option value= "17">Sena Madureira</option>
                    <option value= "18">Senador Guiomard</option>
                    <option value= "19">Taraucá</option>
                    <option value= "20">Xapuri</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">DAP</label>
                    <select name="Dapcliente" class="form-control">
                    <option value="1"></option>
                    <option value="2">Sim</option>
                    <option value= "3">Nao</option>
                    <option value= "4">Isento</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CAR</label>
                    <select name="Carcliente" class="form-control">
                    <option value="1"></option>
                    <option value="2">Sim</option>
                    <option value= "3">Nao</option>
                    <option value= "4">Isento</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Sican</label>
                    <select name="Sicancliente" class="form-control">
                    <option value="1">Sim</option>
                    <option value= "2">Nao</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data Cadastro</label>
                    <input type="date" name="Cadastrocliente" class="form-control" id="exampleInputEmail1" placeholder="Data de Cadastro">
                  </div>
                  <hr />
                  <div class="form-group">
                  <label class="radio-inline">
                    <input type="radio" name="status" value="1">Sim
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="status" value="0">Não
                  </label>
                  </div>

                  <div class="box-header with-border">
                <h3 class="box-title">Pode comprar Milho no Nome do titular</h3>
              </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Foto do Representante</label>
                    <input id="imageRepCliente" name="imageRepCliente" type="file" class="form-control" id="exampleInputEmail1" placeholder="Imagem">
                    <br/><br/>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Representante</label>
                    <input type="text" name="NomeRepresentante" class="form-control" id="exampleInputEmail1" placeholder="Nome do Representante">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">CPF Representante</label>
                    <input type="text" name="CPFrepresentante" class="form-control" id="cpf2" placeholder="CPF Representante">
                  </div>
                                     
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

  echo '</div>';
  echo '</div>';
  echo '</section>';
  echo '</div>';
  echo  $footer;
  echo $javascript;
  ?>