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
if (isset($_POST['modulo'])) {
  $modulo=$_POST['modulo'];
  echo "$modulo";
}
$idAdm=$_SESSION['Adm'];
include '../conexao.php';
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

  <nav class="navbar navbar-dark bg-dark">
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-dark" onclick="window.location.href='homeCursosAdm.php'">voltar</button>
    </div>
    <form class="d-flex">
      <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
      <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

   </form>
  </nav>

  <section class="jumbotron text-center text-dark">
    <div class="container">
      <h1 class='jumbotron-heading'>Aterar Modulo</h1>
    </div>
  </section>


    <section class="jumbotron text-center bg-white">
        <div class="container">
            <div class="container col-md-6 shadow-lg p-3 mx-auto">
                <section class="jumbotron  ">
                  <label for="">a qual curso o módulo pertence?</label>
                  <div class='row'>
                      <div class='col'>
                        <label class='col-sm-2 col-form-label' >Curso</label>
                      </div>
                      <div class='col-6'>
                        <form class="" action='alteraModulo.php' method='post'>
                          <select  name='curso' class='form-select' aria-label='.form-select-lg example'>
                            <?php
                            $sql1="SELECT id_curso, nm_curso FROM tb_curso1";
                            $resultado1=$conexao->query($sql1);
                            while($dados1 = $resultado1->fetch_assoc()){
                                echo "<option value=".$dados1['id_curso'].">".$dados1['nm_curso']."</option>";
                            }
                            ?>
                        </select>

                      </div>
                      <div class='col'>
                          <button class='btn btn-warning ' name='enviarCurso' type='submit'>buscar</button> <br><br>
                          </form>
                      </div>
                  </div>
                          <?php
                          if (isset($_POST['enviarCurso'])) {
                            $idCurso=$_POST['curso'];
                            echo "

                            <div class='row'>
                                <div class='col'>
                                  <label class='col-sm-2 col-form-label' >Modulo</label>
                                </div>
                                <div class='col-6'>
                                  <form class='' action='alteraModulo.php' method='post'>
                                    <select  name='modulo' class='form-select' aria-label='.form-select-lg example'>
                                    ";
                                    $sql2="SELECT id_modulo, nm_modulo FROM tb_modulo1 where id_curso='$idCurso'";
                                    $resultado2=$conexao->query($sql2);
                                    while($dados2 = $resultado2->fetch_assoc()){
                                        echo "<option value=".$dados2['id_modulo'].">".$dados2['nm_modulo']."</option>";
                                    }
                                echo "string  </select>

                                </div>
                                <div class='col'>

                                </div>
                            </div><br>";


                        echo "<section class=' bg-white'><br>
                        <p>novos valores</p>
                            <div class='row'>
                                      <div class='col'>
                                        <label class='col-sm-2 col-form-label' >Nome</label>
                                      </div>
                                      <div class='col-6'>
                                     <input type='text' name='nomeModulo' class='form-control'>

                                      </div>
                                      <div class='col'>
                                      <button class='btn btn-warning ' name='enviarNome' type='submit'>alterar</button> <br><br>
                                      </div>
                                  </div><br>
                                  <div class='row'>
                                      <div class='col'>
                                        <label class='col-sm-2 col-form-label' >Descrição</label>
                                      </div>
                                      <div class='col-6'>
                                   <textarea type='text' name='descModulo' class='form-control'></textarea>


                                      </div>
                                      <div class='col'>
                                        <button class='btn btn-warning ' name='enviarDesc' type='submit'>alterar</button> <br><br>
                                      </div>
                                  </div><br>

                                    </form>
                            </section>";
                            }

                            if (isset($_POST['enviarNome'])) {
                              $idModulo=$_POST['modulo'];
                              $nome=$_POST['nomeModulo'];
                              $sql3="update tb_modulo1 set nm_modulo='$nome'where id_modulo='$idModulo'";
                              $resultado3=$conexao->query($sql3);
                            echo "alterado";
                            }
                            if (isset($_POST['enviarDesc'])) {
                              $idModulo=$_POST['modulo'];
                              $desc=$_POST['descModulo'];
                              $sql4="update tb_modulo1 set desc_modulo='$desc' where id_modulo='$idModulo'";
                              $resultado4=$conexao->query($sql4);
                            echo "alterada";



                            }
                           ?>

                        </div>

                        </div>
                  </div>

                </section>
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
</body>
</html>
