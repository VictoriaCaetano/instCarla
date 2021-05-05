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
$idAdm=$_SESSION['Adm'];
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
        <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>

    </nav>
    <section class="jumbotron text-center text-dark">
      <div class="container">
        <h1 class='jumbotron-heading'>Cadastro de Nova Aula</h1>
      </div>
    </section>


      <section class="jumbotron text-center bg-white">
          <div class="container">
              <div class="container col-md-6 shadow-lg p-3 mx-auto">
                  <section class="jumbotron  ">
                    <form class="form-entrar" action="criaAula.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Nome</label>
                            <div class="col-sm-10">
                                <input name="nome"type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Descrição</label>
                            <div class="col-sm-10">
                              <textarea class="form-control"  name="desc" placeholder="Descrição detalhada do Modulo" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Modulo</label>
                              <div class="col-sm-10">
                            <select  name="modulo" class="form-select" aria-label=".form-select-lg example">
                              <?php
                              $sql1="SELECT B.id_modulo, B.nm_modulo, A.nm_curso FROM tb_modulo1 B, tb_curso1 A where A.id_curso=B.id_curso; ";
                              $resultado=$conexao->query($sql1);
                              while($dados = $resultado->fetch_assoc()){
                                  echo "<option value=".$dados['id_modulo'].">".$dados['nm_modulo']." - ".$dados['nm_curso']."</option>";
                              }
                              ?>
                          </select>
                              </div>
                        </div>
                        <div class="row mb-3">
                            <input class="form-control form-control-sm"  type="file" name="arquivo" required>
                            <p>apenas arquivos mp4, até 500Mb e de resolução 1040*1040</p>
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
if(isset($_POST['Enviar'])){

  $modulo=$_POST['modulo'];
  $nome=$_POST['nome'];
  $desc=$_POST['desc'];
  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
  $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
  $diretorio = "../videos/"; //define o diretorio para onde enviaremos o arquivo

  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
  $query="insert into tb_aula1 (nm_aula, desc_aula,id_modulo, video_aula) values ('$nome','$desc','$modulo','$novo_nome');";

   mysqli_query($conexao,$query);


  $sql_code = "INSERT INTO tb_arquivo (codigo, arquivo, data, nm_curso) VALUES(null, '$novo_nome', NOW(), '$nome')";
  mysqli_query($conexao,$sql_code);

}


$sqlAula="select nm_aula, video_aula from tb_aula1 where id_aula=20 ;";
        $exec=mysqli_query($conexao,$sqlAula);
while ($dados=mysqli_fetch_array($exec)) {
  echo "<video class='video' src='../videos/".$dados['video_aula']."' controls></video>";
}


?>
