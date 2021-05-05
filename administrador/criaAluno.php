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
        <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
        <button type="button" class="btn btn-dark" onclick="window.location.href='homeAlunosAdm.php'">voltar</button>
      </div>
      <form class="d-flex">
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>

    </nav>
    <section class="jumbotron text-center text-dark">
      <div class="container">
        <h1 class='jumbotron-heading'>Cadastro de Novo Aluno</h1>
      </div>
    </section>


      <section class="jumbotron text-center bg-white">
          <div class="container">
              <div class="container col-md-6 shadow-lg p-3 mx-auto">
                  <section class="jumbotron  ">
                    <form class="form-entrar" action="criaAluno.php" method="post" enctype="multipart/form-data" >
                      <label class="">Dados Pessoais</label>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Nome</label>
                            <div class="col-sm-10">
                                <input name="nome"type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Email</label>
                            <div class="col-sm-10">
                                <input name="email"type="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >CPF</label>
                            <div class="col-sm-10">
                                <input name="cpf"type="text" class="form-control" required>
                            </div>
                        </div>
                      <label for=""> Dados De Usuario</label>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" > Usuário</label>
                            <div class="col-sm-10">
                            <input name="user"type="text" placeholder="Nome de Usuário"class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Senha</label>
                            <div class="col-sm-10">
                            <input name="senha"type="password" placeholder="Senha Confiável"class="form-control" required>
                            </div>
                        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Imagem</label>
          <input class="form-control form-control-sm"  type="file" name="arquivo" required>
            <p>deve ser tamanho 1:1 e de extensão .jpg</p>
        </div>
                        <div class="row mb-3">
                              <label for="">Perguntas de Segurança</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" value="     Qual seu apelido de infância?">
                              <input type="texte" name="pergunta1"class="form-control" required>
                              <input type="text" readonly class="form-control-plaintext"  value="     Seu filme infantil favorito?">
                              <input type="texte" name="pergunta2" class="form-control" required>
                              <input type="text" readonly class="form-control-plaintext"  value="     Nome do seu primeiro animal de estimação?">
                              <input type="texte" name="pergunta3" class="form-control" required>
                            </div>
                        </div>
                        <label for="">Qual o Primeiro Curso deste Aluno?</label>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" >Curso</label>
                              <div class="col-sm-10">
                            <select  name="curso" class="form-select" aria-label=".form-select-lg example">
                              <?php
                              $sql1="SELECT id_curso, nm_curso FROM tb_curso1";
                              $resultado=$conexao->query($sql1);
                              while($dados2 = $resultado->fetch_assoc()){
                                  echo "<option value=".$dados2['id_curso'].">".$dados2['nm_curso']."</option>";
                              }
                              ?>
                          </select>
                              </div>
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
 $email=$_POST['email'];
 $cpf=$_POST['cpf'];

 $user=$_POST['user'];
 $senha=$_POST['senha'];
 $p1=$_POST['pergunta1'];
 $p2=$_POST['pergunta2'];
 $p3=$_POST['pergunta3'];
 $curso=$_POST['curso'];


            $sqlPessoa="SELECT nm_pessoa FROM tb_pessoa WHERE nm_pessoa='$nome';";
            $result=mysqli_query($conexao,$sqlPessoa);
             $cont=mysqli_num_rows($result);
              if($cont==0){

                 $queryInsertPessoa="INSERT INTO `tb_pessoa`(`nm_pessoa`, `em_pessoa`, `cpf_pessoa`) VALUES ('$nome','$email','$cpf')";
                 $v1= mysqli_query($conexao,$queryInsertPessoa);

                      if ($v1) {
                        $selectPessoa="select id_pessoa from tb_pessoa where em_pessoa='$email'";
                        $y= mysqli_query($conexao,$selectPessoa);

                            while ($dados=mysqli_fetch_array($y)) {
                                 $id=$dados['id_pessoa'];

                                 $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
                                 $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
                                 $diretorio = "../imagens/"; //define o diretorio para onde enviaremos o arquivo

                                 move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                                 $sql_code = "INSERT INTO tb_arquivo (codigo, arquivo, data, nm_curso) VALUES(null, '$novo_nome', NOW(), '$nome')";
                                 mysqli_query($conexao,$sql_code);

                              $queryPessoaCurso="INSERT INTO `tb_pessoacurso1`(`id_pessoa`, `id_curso`,`st_matricula`)
                               VALUES ('$id','$curso','1')";
                              $v4= mysqli_query($conexao,$queryPessoaCurso);

                              $tipoPessoa="INSERT INTO `tb_tipopessoa`(`id_pessoa`, `id_tipo`) VALUES ('$id','2')";
                              $v2=mysqli_query($conexao,$tipoPessoa);

                              $v3=$usuario="INSERT INTO `tb_usuario`(`user_usuario`, `sn_usuario`, `id_pessoa`, `pergunta1`, `pergunta2`, `pergunta3`,`imagem_usuario`)
                              VALUES ('$user','$senha','$id','$p1','$p2','$p3','$novo_nome')";
                              $x= mysqli_query($conexao,$usuario);
                            }
                      }
                      if ($v1 && $v2 && $v3 && $v4) {
                        echo "cadastrado";
                      }
                  }else {
                   echo "Aluno já cadastrado!";
                  }





}

?>
