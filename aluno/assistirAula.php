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

 $aula=$_POST['aula']; //variavel, aula clicada

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
   <section  class="jumbotron text-center">
     <div class="container">
       <div class="row">
        <div class="col-md-8">
        <?php
        $sqlCurso="select nm_curso, nm_modulo from tb_aula1 A, tb_modulo1 B, tb_curso1 C where A.id_aula='$aula' and A.id_modulo=B.id_modulo and B.id_curso=C.id_curso ;";
               $exec2=mysqli_query($conexao,$sqlCurso);
               while ($dados2=mysqli_fetch_array($exec2)) {
                 echo "<p>".$dados2['nm_curso']." ---- ".$dados2['nm_modulo']."</p>";

               }
         ?>
        </div>
        <div class="col-6 col-md-4">
          <p>materiais complementares</p>
        </div>
      </div>
       <div class="row">
       <div class="col-8 bg-dark text-center">
         <?php  $sqlAula="select nm_aula, video_aula from tb_aula1 where id_aula='$aula' ;";
                 $exec=mysqli_query($conexao,$sqlAula);
         while ($dados=mysqli_fetch_array($exec)) {
           echo "<video width='640' height='360'  class='video' src='../videos/".$dados['video_aula']."' controls></video>";
         }
              ?>
       </div>
       <div class="col-4 bg-white">

       </div>
     </div>
     <div class="row">
     <div class="col-8 bg-dark text-center">
       <?php  $sqldesc="select desc_aula from tb_aula1 where id_aula='$aula' ;";
               $exec3=mysqli_query($conexao,$sqldesc);
       while ($dados3=mysqli_fetch_array($exec3)) {
         echo "<p class='text-white'>".$dados3['desc_aula']."</p>";
       }
            ?>
     </div>
   </div>

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
