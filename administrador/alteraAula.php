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
                <select  name="curso"class="form-select" aria-label=".form-select-lg example">
                  <form class="" action="alteraModulo.php" method="post">
                    <?php
                    $sql1="SELECT id_curso, nm_curso FROM tb_curso1";
                    $resultado=$conexao->query($sql1);
                    echo "<p>a qual curso o múdlo pertense?</p>";
                    while($dados = $resultado->fetch_assoc()){
                        echo "<option value=".$dados['id_curso'].">".$dados['nm_curso']."</option>";
                    }
                    ?><input type="submit" name="enviarCurso" value="buscar módulos">
                  </form>
              </select>

                <?php
                if (isset($_POST['enviarCurso'])) {
                  $curso=$POST['curso'];
                    $sqlmodulo="SELECT id_modulo, nm_modulo FROM tb_modulo where id_curso='$curso'";
                    $resultado2=$conexao->query($sqlmodulo);
                        echo "<select class='form-select' aria-label=''.form-select-lg example'>
                                <form class='' action='alteraModulo.php' method='post'>";
                                while($dado2 = $resultado2->fetch_assoc()){
                                    echo "<option value=".$dados2['id_modulo'].">".$dados['nm_modulo']."</option>";
                                }
                                echo "<input type='submit' name='ModuloCurso' value='alterar'>
                                </form>
                              </select>";
                }
                ?>
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
