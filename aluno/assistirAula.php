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


//variavel, aula clicada
if (isset($_POST['aula'])) {
   $_SESSION['aula']= $_POST['aula'] ;
}
$aula=$_SESSION['aula'];

  ?>
</section>


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
          <?php $querySelectAula =sprintf("SELECT nm_aula FROM tb_aula1 where id_aula='$aula';");
                   $exec3=mysqli_query($conexao,$querySelectAula);

                   while ($dados3=mysqli_fetch_array($exec3)) {
                     echo "<h2 class='text-start'>".$dados3['nm_aula']." </h2>";
                   } ?>

        </div>
        <div class="col-6 col-md-4">

          <h2>material complementar</h2>
        </div>
      </div>
       <div class="row">
       <div class="col-8 bg-dark text-center">
         <?php
         $querySelectVideo =sprintf("SELECT video_aula FROM tb_aula1 where id_aula='$aula';");
                  $exec2=mysqli_query($conexao,$querySelectVideo);

                  while ($dados2=mysqli_fetch_array($exec2)) {
                    echo "<br><video width='640' height='360'  class='video' src='../videos/".$dados2['video_aula']."'controls controlsList='nodownload'></video><br><br>";
                  }
         ?>
       </div>
       <div class="col-4 bg-white text-start">
        <?php
        $querySelectMaterial =sprintf("SELECT link_material, desc_material FROM tb_material1 where id_aula='$aula';");
                 $exec4=mysqli_query($conexao,$querySelectMaterial);

                 while ($dados4=mysqli_fetch_array($exec4)) {
                   echo "<br><a href=../material/".$dados4['link_material'].">".$dados4['desc_material']."</a><br>";
                 } ?>
       </div>
     </div>
     <div class="row bg-white">

     <div class="col-8 bg-white text-start"><br><br>
       <?php
       $querySelectDesc=sprintf("SELECT desc_aula FROM tb_aula1 where id_aula='$aula';");
                $exec5=mysqli_query($conexao,$querySelectDesc);

                while ($dados5=mysqli_fetch_array($exec5)) {
                  echo "<p>".$dados5['desc_aula']."</p>";
                } ?>
     </div>
   </div>

     </div>
     </div>
     <div class="container bg-dark">
      <h3 class='text-white'>comentarios</h3>
      </div>

   </section>
   <section>
      <form class="" action="assistirAula.php" method="post">
          <div class="container">
            <div class="input-group mb-3">
                <input type="text" name="Ncomentario" class="form-control" placeholder="deixe aqui seu comentário" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary"  type="submit" name="EnviarNcomentario" id="button-addon2">Enviar</button>
            </div><br>
          </div>
      </form>

   <section>
     <div class="container">

       <div class="row">
      <div class="col">





        <?php


        $querySelectComentario =sprintf("SELECT A.nm_pessoa, B.text_comentario FROM tb_comentario B, tb_pessoa A where A.id_pessoa='$idPessoa' and B.id_pessoa='$idPessoa' and B.id_aula='$aula';");
                  $exec1=mysqli_query($conexao,$querySelectComentario);

                  while ($dados1=mysqli_fetch_array($exec1)) {
                    echo "  <h6>".$dados1['nm_pessoa']."</h6>
                      <p>".$dados1['text_comentario']."</p>
                      <br>";
                  }


                  if (isset($_POST['EnviarNcomentario'])) {
                        $comentario=$_POST['Ncomentario'];
                        $pessoa=$idPessoa;

                        $sqlInsertComentario="insert into tb_comentario (text_comentario, id_pessoa, id_aula) values ('$comentario','$pessoa', '$aula');";
                        mysqli_query($conexao,$sqlInsertComentario);


                    }

         ?>

      </div>
      <div class="col-md-auto">

      </div>
      <div class="col col-lg-2">

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
