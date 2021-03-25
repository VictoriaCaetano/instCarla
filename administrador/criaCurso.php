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
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>

    </nav>
    <section class="jumbotron text-center text-dark">
      <div class="container">
        <h1 class='jumbotron-heading'>Cadastro de Novo Curso</h1>
      </div>
    </section>


      <section class="jumbotron text-center bg-white">
          <div class="container">
              <div class="container col-md-6 shadow-lg p-3 mx-auto">
                  <section class="jumbotron  ">
                    <form class="form-entrar" action="criaCurso.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Nome</label>
                            <div class="col-sm-10">
                                <input name="nome"type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Carga Horaria</label>
                            <div class="col-sm-10">
                                <input name="horas"type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Professor Responsável</label>
                            <div class="col-sm-10">
                                <input name="professor" type="number" class="form-control" required>
                                <p>informe o código</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Descrição</label>
                            <div class="col-sm-10">
                              <textarea class="form-control"  name="desc"placeholder="Descrição detalhada do Curso" style="height: 100px"></textarea>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Introdução</label>
                            <div class="col-sm-10">
                              <textarea class="form-control"  name="intro" placeholder="breve introdução sobre o curso" style="height: 100px"></textarea>
                            </div>

                        </div>
                        <div class="mb-3">
                          <label for="formFileSm" class="form-label">Imagem</label>
                          <input class="form-control form-control-sm"  type="file" name="arquivo" required>
                            <p>deve ser tamanho 1:1 e de extensão .jpg</p>
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

if (isset($_POST['Enviar'])) {
  $nome=$_POST['nome'];
 $descricao=$_POST['desc'];
 $introducao=$_POST['intro'];
 $horas=$_POST['horas'];
 $professor=$_POST['professor'];





           $sqlCurso="SELECT nm_curso FROM tb_curso1 WHERE nm_curso='$nome';";
           $result=mysqli_query($conexao,$sqlCurso);
            $cont=mysqli_num_rows($result);
             if($cont==0){



                $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
                $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
                $diretorio = "../imagens/"; //define o diretorio para onde enviaremos o arquivo

                move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                $queryInsert="INSERT INTO `tb_curso1`(`id_professor`, `nm_curso`, `desc_curso`, `ch_curso`, `intro_curso`,`img_curso`)
                 VALUES ('$professor','$nome', '$descricao', '$horas', '$introducao', '$novo_nome');";
                 mysqli_query($conexao,$queryInsert);


                $sql_code = "INSERT INTO tb_arquivo (codigo, arquivo, data, nm_curso) VALUES(null, '$novo_nome', NOW(), '$nome')";
                mysqli_query($conexao,$sql_code);

                      $queryId =sprintf("SELECT id_curso FROM tb_curso1 where nm_curso='$nome';");
                      $exec2=mysqli_query($conexao,$queryId);
                       while ($dados2=mysqli_fetch_array($exec2)) {
                         $curso=$dados2['id_curso'];
                         $queryInsert="INSERT INTO `tb_contaacesso`(`numAcesso`, `id_curso`) VALUES (0,'$curso');";
                          mysqli_query($conexao,$queryInsert);
                       }




                 }else {
                  echo "curso já cadastrado";
                 }





}

?>
