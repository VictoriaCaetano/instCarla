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
 if (isset($_POST['aula'])) {
    $_SESSION['aula']= $_POST['aula'] ;
 }
 $aula=$_SESSION['aula'];

$idAdm=$_SESSION['Adm'];
include '../conexao.php';
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

       <button type="button" class="btn btn-dark" onclick="window.location.href='homeCursosAdm.php'">voltar</button>
     </div>
     <form class="d-flex">
       <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
       <button type="button" name="sair"class="btn btn-dark" href="?AlunoLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

    </form>
   </nav>
   <section  class="jumbotron text-center">
     <div class="container">
       <div class="row">
         <div class="text-end">
           <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#exampleModal1'>video aula
           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
           <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
           </svg>
           </button>
           <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#exampleModal3'> Nome
             <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
             <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
             </svg>
           </button>
           <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#exampleModal4'>Descri????o
           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
           <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
           </svg>
           </button>
           <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#exampleModal2'>+ material

           </button>

         </div>
        <div class="col-md-8">
          <?php $querySelectAula =sprintf("SELECT nm_aula FROM tb_aula1 where id_aula='$aula';");
                   $exec3=mysqli_query($conexao,$querySelectAula);

                   while ($dados3=mysqli_fetch_array($exec3)) {
                     echo "<h2 class='text-start'>".$dados3['nm_aula']."</h2>
                     ";
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
       <div class="col-4 bg-white text-start"><br><br>

           <?php
           $querySelectMaterial =sprintf("SELECT id_material, link_material, desc_material FROM tb_material1 where id_aula='$aula';");
                    $exec4=mysqli_query($conexao,$querySelectMaterial);

                    while ($dados4=mysqli_fetch_array($exec4)) {
                       echo "  <div class='row'><div class='col'>
                          <a href=../material/".$dados4['link_material'].">".$dados4['desc_material']."</a>
                         </div>

                         <div class='col col-lg-2'>
                         <form class='form-signin text-end ' action='alteraAula.php' method='post'>
                         <button class='btn-sm btn btn-danger align-text-bottom' value=".$dados4['id_material']." name='excluir' type='submit'>
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                              <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                              <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                              </svg>
                          </button>
                          </form>
                         </div></div>";
                         if (isset($_POST['excluir'])) {
                           $idMaterial=$_POST['excluir'];
                           $queryDelet="DELETE FROM tb_material1 WHERE id_material = '$idMaterial';";
                           mysqli_query($conexao,$queryDelet);
                         }
                    }

                    ?>



       </div>
     </div>
     <div class="row bg-white">

     <div class="col-8 bg-white "><br><br>
       <div class="row">

      <?php
      $querySelectDesc=sprintf("SELECT desc_aula FROM tb_aula1 where id_aula='$aula';");
               $exec5=mysqli_query($conexao,$querySelectDesc);

               while ($dados5=mysqli_fetch_array($exec5)) {
                 echo "  <div class='col'><p>".$dados5['desc_aula']."</p>
                 </div>";
               } ?>


    <div class="col col-lg-2">

    </div>
  </div>


     </div>
   </div>

     </div>
     </div>


   </section>

   <div class="container bg-dark">
    <h3 class='text-white'>comentarios</h3>
    </div>
    <section>
      <div class="container">

        <div class="row">
       <div class="col">
  <?php   $querySelectComentario =sprintf("SELECT B.id_comentario, A.nm_pessoa, B.text_comentario FROM tb_comentario B, tb_pessoa A where A.id_pessoa= B.id_pessoa and B.id_aula='$aula';");
              $exec5=mysqli_query($conexao,$querySelectComentario);

              while ($dados5=mysqli_fetch_array($exec5)) {
                echo "
                  <h6>".$dados5['nm_pessoa']."</h6>

                  <p>".$dados5['text_comentario']."</p>
                  ";}
               ?>
</div>
</div>
</div>
<footer>
 <section  style="background:#DBB522;" class="jumbotron text-center">
   <div class="container">
   </div>
   </div>
 </section>
</footer>
 </body>
 <!--modal alterar Video-->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Alterar Video Aula</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form class="" action="alteraAula.php" method="post" enctype="multipart/form-data">
           <div class="mb-3">
             <label for="formFileSm" class="form-label"></label>
             <input class="form-control form-control-sm"  type="file" name="arquivo" required>
             <p>apenas arquivos mp4, at?? 500Mb e de resolu????o 640*360 ou mais</p>
           </div>
           <button  class=" btn-dark"type="submit" name="enviarVideo">alterar Video</button>
         </form>
         <?php if (isset($_POST['enviarVideo'])) {

           $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
           $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
           $diretorio = "../videos/"; //define o diretorio para onde enviaremos o arquivo

           move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

           $sql_code = "INSERT INTO tb_arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";
           mysqli_query($conexao,$sql_code);

           $queryUpdate="UPDATE tb_aula1 set video_aula  = '$novo_nome'
            where id_aula='$aula';";
            mysqli_query($conexao,$queryUpdate);

         } ?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
 <!--modal adicionar material-->
 <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Alterar Video Aula</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form class="" action="alteraAula.php" method="post" enctype="multipart/form-data" >
           <div class="mb-3">
             <label for="formFileSm" class="form-label"></label>
             <input class="form-control form-control-sm"  type="file" name="arquivo" required >
             <p> imagens e documentos permitidos</p>
            <input class="form-control form-control-sm"  type="text" name="descricao" required >
           </div>
           <button  class=" btn-dark"type="submit" name="enviarMaterial">adicionar</button>
         </form>
         <?php if (isset($_POST['enviarMaterial'])) {
           $descricao=$_POST['descricao'];
           $sql="select desc_material from tb_material1 where id_aula='$aula' and desc_material='$descricao';";

           $result=mysqli_query($conexao,$sql);
            $cont=mysqli_num_rows($result);
             if($cont==0){

               $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
               $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
               $diretorio = "../material/"; //define o diretorio para onde enviaremos o arquivo

               move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

               $sql_code = "INSERT INTO tb_arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";
               mysqli_query($conexao,$sql_code);

               $queryUpdate="INSERT INTO `tb_material1`( `link_material`, `id_aula`, `desc_material`) VALUES ('$novo_nome','$aula','$descricao')";
                mysqli_query($conexao,$queryUpdate);
                echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=alteraAula.php'>";
             }


         }
         ?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
 <!--modal alterar nome-->
 <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Alterar Nome</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form class="" action="alteraAula.php" method="post">
           <div class="mb-3">
             <label for="formFileSm" class="form-label"></label>

            <input class="form-control form-control-sm"  type="text" name="nome" required >
           </div>
           <button  class=" btn-dark"type="submit" name="enviarNome">Alterar</button>
         </form>
         <?php if (isset($_POST['enviarNome'])) {
           $nome=$_POST['nome'];
           $sql="select nm_aula from tb_aula1 where id_aula='$aula' and nm_aula='$nome';";

           $result=mysqli_query($conexao,$sql);
            $cont=mysqli_num_rows($result);
             if($cont==0){
               $update="UPDATE `tb_aula1` SET `nm_aula`='$nome' where id_aula='$aula';";
               mysqli_query($conexao,$update);
                 echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=alteraAula.php'>";
             }


         }
         ?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
 <!--modal alterar Descricao-->
 <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Alterar Descri????o</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form class="" action="alteraAula.php" method="post">
           <div class="mb-3">
             <label for="formFileSm" class="form-label"></label>
             <textarea name="descricao" rows="8" cols="60"required></textarea>

           </div>
           <button  class=" btn-dark"type="submit" name="enviarDescricao">Alterar</button>
         </form>
         <?php if (isset($_POST['enviarDescricao'])) {
           $desc=$_POST['descricao'];
           $sql="select desc_aula from tb_aula1 where id_aula='$aula' and desc_aula='$desc';";

           $result=mysqli_query($conexao,$sql);
            $cont=mysqli_num_rows($result);
             if($cont==0){
               $update="UPDATE `tb_aula1` SET `desc_aula`='$desc' where id_aula='$aula';";
               mysqli_query($conexao,$update);
                 echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=alteraAula.php'>";
             }


         }
         ?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
</html>
