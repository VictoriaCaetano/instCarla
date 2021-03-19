

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
$codigo=$_POST['codigo'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>pagina de alteração curso </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>
  <?php //$$$$$$$$$$$$$$$$$$$$$$$$$$$$linha generica para funcionar!!!!!

    $querySelect =sprintf("SELECT * FROM tb_curso1 where id_curso='$codigo';");
            $exec=mysqli_query($conexao,$querySelect);



  ?>
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
      <?php
      while ($dados=mysqli_fetch_array($exec)) {echo "  <h1 class='jumbotron-heading'>".$dados['nm_curso']."</h2>
          <h3 class='text-dark  '>".$dados['intro_curso']."</h3><br>
                  <h3 class='text-muted'>".$dados['desc_curso']."</h3>
                  <p class='text-start'>Carga Horária - ".$dados['ch_curso']." horas</p>";
                  $curso=$dados['nm_curso'];}
       ?>

    </div>
    <div class="text-end">

    <button class='btn btn-danger' value=".$dados['id_interesse']." name='codigo' type='submit'>
   <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
      <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
      <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
      </svg>
  excluir
  </button>


   <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
     <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
     <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
     </svg>
     Editar Curso sdf
</button>
    </div>
  </section>


                    <section class="jumbotron text-center bg-white">
                      <div class="container">

                          <div class="row">
                            <?php
                            $querySelectModulo =sprintf("SELECT nm_modulo, id_modulo, desc_modulo FROM tb_modulo1 where id_curso='$codigo';");
                                    $exec2=mysqli_query($conexao,$querySelectModulo);
                             while ($dados2=mysqli_fetch_array($exec2)) {
                              echo "<tr><div class='col-sm-4'>
                                  <div class='card shadow-lg p-3'>
                                      <div class='card-body'>
                                       <h5 class='card-title'>".$dados2['nm_modulo']."</h5>
                                          <p>".$dados2['desc_modulo']."<p>";

                                          $modulo=$dados2['id_modulo'];
                                                $querySelectAula=sprintf("SELECT id_aula, nm_aula FROM tb_aula1 where id_modulo='$modulo';");
                                                        $exec3=mysqli_query($conexao,$querySelectAula);
                                                     while ($dados3=mysqli_fetch_array($exec3)) {
                                                          echo  "
                                                          <a class='link-dark' href='../index.php'> <h4 class='text-start href='../index.php'>".$dados3['nm_aula']."</h4> </a>

                                                          ";
                                                     }
                                      echo "

                                      <form class='form-signin' action='alteraModulo.php' method='post'>
                                      <label name='curso' value=".$codigo."></label>
                                      <button class='btn btn-dark' value=".$dados2['id_modulo']." name='numero' type='submit'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    Editar
                                    </button>
                                      </form>
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
    </div>
  </section>
</footer>

</footer>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Curso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php echo "$codigo";
          echo "$curso";?>
          <form class="form-entrar" action="back.php" method="post" enctype="multipart/form-data">
            <p class="text-center">Insira as informações que deseja alterar sobre curso <?php echo "$curso"; ?> </p>
            <div class="row">
                <div class="col">
                    <label class="" >Nome:</label>
                </div>
                <div class="col-6">
                    <input type="text"  name="nome" class="form-control">
                </div>
                <div class="col">
                    <button class="btn btn-warning " name="altNome" type="submit">alterar</button> <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="" >Descrição:</label>
                </div>
                <div class="col-6">
                    <input type="text"  name="desc" class="form-control" >
                </div>
                <div class="col">
                    <button class="btn btn-warning " name="altDesc" type="submit">alterar</button> <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="" >Introdudução:</label>
                </div>
                <div class="col-6">
                    <input type="text"  name="intro" class="form-control" >
                </div>
                <div class="col">
                    <button class="btn btn-warning " name="altIntro" type="submit">alterar</button> <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="" >Carga Horária:</label>
                </div>
                <div class="col-6">
                    <input type="text"  name="horas" class="form-control">
                </div>
                <div class="col">

                </div>
            </div>
                <div class="row">
                  <div class="col">
                      <label for="formFileSm" class="form-label">Imagem:</label>
                  </div>
                  <div class="col-6">
                        <input class="form-control form-control-sm"  type="file" name="arquivo" >
                  </div>
                  <div class="col">
                      <button class="btn btn-warning " name="imagem" type="submit">alterar</button> <br><br>
                  </div>
                    <p class="text-center">apenas imagens com extensão .jpg serão aceitas </p>
                </div>


          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
