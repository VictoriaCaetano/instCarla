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

$curso=$_POST['codigo'];


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

        <button type="button" class="btn btn-dark" onclick="window.location.href='home.php'">voltar</button>
      </div>
      <form class="d-flex">
        <button type="button" class="btn btn-dark" onclick="window.location.href='teste.php'">perfil</button>
        <button type="button" name="sair"class="btn btn-dark" href="?AlunoLogOut" ><a class="text-decoration-none text-white"href="?AlunoLogOut">Sair</a></button>

     </form>
    </nav>

    <?php   $querySelect =sprintf("SELECT * FROM tb_curso1 where id_curso='$curso';");
              $exec=mysqli_query($conexao,$querySelect);

              while ($dados=mysqli_fetch_array($exec)) { //mostra o nome do curso
                echo "<section style='background:#DBB522;'  class='jumbotron  text-start'>
                  <div class='container'>


                      <h1 class='jumbotron-heading text-dark text-center'>".$dados['nm_curso']."</h1>
                      <h3 class='text-dark  '>".$dados['intro_curso']."</h3><br>

                  </div>
                </section>
                <section class='jumbotron text-center'>
                  <div class='container'>
                  <h3 class='text-muted'>".$dados['desc_curso']."</h3>
                  </div>

                </section>
                "; }


    ?>
    <section class="jumbotron text-center bg-white">
      <div class="container">

          <div class="row">
            <?php
            $querySelectModulo =sprintf("SELECT nm_modulo, id_modulo, desc_modulo FROM tb_modulo1 where id_curso='$curso';");
                    $exec2=mysqli_query($conexao,$querySelectModulo);
             while ($dados2=mysqli_fetch_array($exec2)) {

              echo "<tr><div class='col-sm-4'>
                  <div class='card shadow-lg p-3'>
                      <div class='card-body'>

                      <h5 class='card-title'>".$dados2['nm_modulo']."</h5>
                       <p> código: - ".$dados2['id_modulo']."<p>
                          <p>".$dados2['desc_modulo']."<p><br>_______________________
                          ";



                          $modulo=$dados2['id_modulo'];

                                $querySelectAula=sprintf("SELECT id_aula, nm_aula FROM tb_aula1  where id_modulo='$modulo';");
                                        $exec3=mysqli_query($conexao,$querySelectAula);
                                     while ($dados3=mysqli_fetch_array($exec3)) {
                                          echo  "
                                            <form class='text-start' action='assistirAula.php' method='post'>
                                            <button type='submit'class='btn btn-white text-start' name='aula' value=".$dados3['id_aula']."><p class='fs- fw-bold'>".$dados3['nm_aula']."</p></button>
                                          </form>


                                          ";
                                     }
                      echo "
                      </div>
                  </div><br>
              </div>
              <td>
              ";
            }

             ?>
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
