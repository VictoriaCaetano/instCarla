<?php
session_start();

if (!isset($_SESSION['AlunoLog'])) {
header("location:../acesso/loginUsuario.php");
session_destroy();
}
if (!isset($_SESSION['Usuario'])) {
header("location:../acesso/loginUsuario.php");
session_destroy();
}

 $idPessoa=$_SESSION['Usuario']; //variavel que armazena id da pessoa que realizou login


if (isset($_GET['AlunoLogOut'])) {
header("location:../index.php");
session_destroy();
}

 include '../conexao.php';
$posicao=0;


/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador
o caminho para a página principal do site (sistema), burlando assim a obrigação de
fazer um login, com isso se ele não estiver feito o login não será criado a session,
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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

        <button type="button" class="btn btn-dark" onclick="window.location.href='../index.php'">voltar</button>
      </div>
      <form class="d-flex">
        <button type="button" class="btn btn-dark" onclick="window.location.href='teste.php'">perfil</button>
        <button type="button" name="sair"class="btn btn-dark" href="?AlunoLogOut" ><a class="text-decoration-none text-white"href="?AlunoLogOut">Sair</a></button>

     </form>
    </nav>

    <section class="jumbotron text-center bg-white">
          <div class="container">
              <div class="row">
              <!--daqui pra cima é dados do banco-->
              <?php header("Content-type: text/html; charset=utf-8");
              $sqlCursos="select A.id_curso, nm_curso, img_curso, intro_curso from tb_curso1 A, tb_pessoacurso1 C where A.id_curso=C.id_curso and C.id_pessoa='$idPessoa' ;";
                      $exec=mysqli_query($conexao,$sqlCursos);
              while ($dados=mysqli_fetch_array($exec)) {
                echo "<tr><div class='col-sm-4'>
                    <div class='card shadow-lg p-3'>
                        <img class='card-img-top' src=../imagens/".$dados['img_curso']."  height='300' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$dados['nm_curso']."</h5>
                              <p class='card-text'>".$dados['intro_curso']."</p>
                              <form class='form-signin' action='vizualizaCurso.php' method='post'>
                                <button class='btn btn-lg btn-dark btn-block' value=".$dados['id_curso']." name='codigo'type='submit'>Entrar</button>
                              </form>
                        </div>
                    </div><br>
                </div><td>";
              }
               ?>
              <!----->
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
