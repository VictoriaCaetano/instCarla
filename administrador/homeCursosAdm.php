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
include '../conexao.php';
$idAdm=$_SESSION['Adm'];
?>
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
        <button type="button" class="btn btn-dark" onclick="window.location.href='home.php'">voltar</button>
      </div>
      <form class="d-flex">
        <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>
    </nav>





    <section class="jumbotron text-center text-dark">
      <div class="container">
        <h1 class="jumbotron-heading">Nossos Cursos</h2>
      </div>
    </section>

<div class="container">
  <p class=" float-right xt-dark font-weight-bold text-monospace">CURSO</p>
  <div class="float-right"><svg style="fill:#DBB522;" onclick="window.location.href='criaCurso.php'" xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
</div><br>

</div>

    <section class="jumbotron text-center">
          <div class="container">
              <div class="row">
              <!--daqui pra cima é dados do banco-->
              <?php header("Content-type: text/html; charset=utf-8");
              $querySelect =sprintf("SELECT id_curso, nm_curso, img_curso, intro_curso FROM tb_curso1;");
                      $exec=mysqli_query($conexao,$querySelect);
              while ($dados=mysqli_fetch_array($exec)) {
                echo "<tr><div class='col-sm-4'>
                    <div class='card shadow-lg p-3'>
                        <img class='card-img-top' src=../imagens/".$dados['img_curso']."  height='300' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$dados['nm_curso']."</h5>
                              <p class='card-text'>".$dados['intro_curso']."</p>
                              <form class='form-signin' action='alteraCurso.php' method='post'>
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
    </div>
  </section>
</footer>
  </body>
</html>
