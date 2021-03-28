<?php
session_start();

if (!isset($_SESSION['AdmLog'])) {
header("location:../acesso/loginAdm.php");
session_destroy();
}
if (isset($_GET['AdmLogOut'])) {
header("location:../index.php");
session_destroy();
}

include '../conexao.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>pagina inicial do Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-dark" onclick="window.location.href='homeCursosAdm.php'">voltar</button>
      </div>
      <form class="d-flex">
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>

    </nav>
    <section class="jumbotron text-center text-dark">
      <div class="container">
        <h1 class='jumbotron-heading'>Cadastro de Novo Modulo</h1>
      </div>
    </section>


      <section class="jumbotron text-center bg-white">
          <div class="container">
              <div class="container col-md-6 shadow-lg p-3 mx-auto">
                  <section class="jumbotron  ">
                    <form class="form-entrar" action="criaModulo.php" method="post">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Nome</label>
                            <div class="col-sm-10">
                                <input name="nome"type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Descrição</label>
                            <div class="col-sm-10">
                              <textarea class="form-control"  name="desc"placeholder="Descrição detalhada do Modulo" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Curso</label>
                              <div class="col-sm-10">
                            <select class="form-select" aria-label=".form-select-lg example">
                              <?php
                              $sql1="SELECT id_curso, nm_curso FROM tb_curso1";
                              $resultado=$conexao->query($sql1);
                              while($dados = $resultado->fetch_assoc()){
                                  echo "<option value=".$dados['id_curso'].">".$dados['nm_curso']."</option>";
                              }
                              ?>
                          </select>
                              </div>
                        </div>
                      <br>    <button class="btn btn-lg btn-warning btn-block" name="Enviar" type="submit">Enviar</button>
                    </form>
                  </section>
              </div>
          </div>
      </section>
<footer>
  <section  style="background:#DBB522;" class="jumbotron text-center">
    <div class="container">
    </div>
    </div>
  </section>
</footer>
  </body>
</html>
<?php

if (isset($_POST['Enviar'])) {
    $nome=$_POST['nome'];
    $desc=$_POST['desc'];
    $curso=$_POST['curso'];

    $sqlModulo="SELECT nm_modulo FROM tb_modulo1 WHERE nm_modulo='$nome';";
    $result=mysqli_query($conexao,$sqlModulo);
     $cont=mysqli_num_rows($result);
      if($cont==0){

         $sql="INSERT INTO `tb_modulo1`(`nm_modulo`, `id_curso`, `desc_modulo`) VALUES ('$nome', '$curso', '$desc');";
          mysqli_query($conexao,$sql);

}
}
?>
