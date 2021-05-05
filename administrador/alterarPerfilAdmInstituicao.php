<?php session_start();

if (!isset($_SESSION['AdmLog'])) {
header("location:../acesso/loginAdm.php");
session_destroy();
}
if (isset($_GET['AdmLogOut'])) {
header("location:../index.php");
session_destroy();
}
include '../conexao.php';
$idAdm=$_SESSION['Adm'];
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
        <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>
    </nav>
    <?php


    ?>

    <section class="jumbotron text-center bg-white">
      <div class="container">
        <div class="container col-md-8  shadow-lg p-3 mx-auto">

            <div class="row">
             <div class="col">
              <?php
              $imagem="select imagem_usuario from tb_usuario where id_pessoa='$idAdm'";
              $result=$conexao->query($imagem);
               while($dados2 = $result->fetch_assoc()){
                   echo "  <img class='card-img-top' src='../imagens/".$dados2['imagem_usuario']."'  height='300' alt='300'>";
               }


               ?>

               <button type='button' class='btn btn-white' data-bs-toggle='modal' data-bs-target='#exampleModal13'>escolher foto
               <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
               <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
               </svg>
               </button>
             </div>
             <div class="col ">
               <div class="my-3 p-3">
                 <div class="row">
                   <?php
                   $selectPerfil="select C.nm_instituicao, C.end_instituicao, C.em_instituicao, C.emContrata_instituicao, C.cel_instituicao, B.cpf_pessoa, A.user_usuario, B.em_pessoa from tb_instituicao C, tb_pessoa B, tb_usuario A where B.id_pessoa=A.id_pessoa and B.id_pessoa='$idAdm' ";
                   $resultado=$conexao->query($selectPerfil);
                    while($dados = $resultado->fetch_assoc()){
                      echo "<div class='col-md-auto'>
                      <h2 class='display-6 '>".$dados['user_usuario']."</h2>
                            </div>
                            <div class='col col-lg-2 text-end'>

                            <button type='button' class='btn btn-white' data-bs-toggle='modal' data-bs-target='#exampleModal10'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </button>
                            </div>
                      ";
                      echo "<div class='col-md-auto'>
                            <p class='lead'>".$dados['em_pessoa']."</p>
                            </div>
                            <div class='col col-lg-2 text-end'>
                            <button type='button' class='btn btn-white' data-bs-toggle='modal' data-bs-target='#exampleModal11'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </button>
                            </div><br>
                      ";
                      echo "<div class='col-md-auto'>
                            <p class='lead'>Senha de Acesso</p>
                            </div>
                            <div class='col col-lg-2 text-end'>
                            <button type='button' class='btn btn-white' data-bs-toggle='modal' data-bs-target='#exampleModal12'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </button>
                            </div><br>
                      ";
                      echo "<div class='col-md-auto'>
                            <p class='lead'> CPF: ".$dados['cpf_pessoa']."</p>
                            </div>";
                      echo "<div class='col-md-auto'>
                      <br><br>
                            <p class='lead '><strong>".$dados['nm_instituicao']."</strong></p>
                            </div>";
                      echo "<div class='col-md-auto'>
                            <p class='lead'> contratação: ".$dados['emContrata_instituicao']."</p>
                            </div>
                            ";
                      echo "<div class='col-md-auto'>
                            <p class='lead'>".$dados['em_instituicao']."</p>
                            </div>
                            ";
                      echo "<div class='col-md-auto'>
                            <p class='lead text-start'>".$dados['end_instituicao']."</p>
                            </div>
                            ";
                      echo "<div class='col-md-auto'>
                            <p class='lead'>".$dados['cel_instituicao']."</p>
                            </div>
                            ";
                    } ?>


                 </div>

               </div>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alterar Nome de Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="alterarPerfilAdmInstituicao.php" method="post">
            <input class="form-control" type="text" name="NovoUsuario" value="" placeholder="Novo nome de usuário">
            <input type="submit" name="enviaUsuario" value="">
          </form>
          <?php if (isset($_POST['enviaUsuario'])) {
            $usuario=$_POST['NovoUsuario'];

            $queryUpdate="UPDATE tb_usuario set user_usuario = '$usuario'
             where id_pessoa='$idAdm';";

             mysqli_query($conexao,$queryUpdate);
          } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alterar Email</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="alterarPerfilAdmInstituicao.php" method="post">
            <input class="form-control" type="text" name="NovoEmail" value="" placeholder="Novo email de usuario">
            <input type="submit" name="enviaEmail" value="">
          </form>
          <?php if (isset($_POST['enviaEmail'])) {
            $email=$_POST['NovoEmail'];

            $queryUpdate="UPDATE tb_pessoa set em_pessoa = '$email'
             where id_pessoa='$idAdm';";

             mysqli_query($conexao,$queryUpdate);
          } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alterar Nome de Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="alterarPerfilAdmInstituicao.php" method="post">
          <input class="form-control" type="text" name="nova" value="" placeholder="nova senha">
          <input class="form-control"type="text" name="confirma" value="" placeholder="confirma ">
          <input class="form-control"type="text" name="antiga" value="" placeholder="senha atual">
          <button class=" text-center btn btn-dark"  type="submit" name="enviaSenha" >alterar</button>
          </form>
          <?php if (isset($_POST['enviaSenha'])) {
            $nova=$_POST['nova'];
            $confirma=$_POST['confirma'];
            $antiga=$_POST['antiga'];

            if ($nova==$confirma) {
              $queryUpdate="UPDATE tb_usuario set sn_usuario = '$nova'
               where id_pessoa='$idAdm' and sn_usuario='$antiga';";
               mysqli_query($conexao,$queryUpdate);
               echo "<script>alert('alterado com sucesso');</script>";
            }else {
              echo "<script>alert('infelizmente não foi possivel alterar a senha');</script>";
            }

          } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModalLabel13" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AlterarImagem de Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="alterarPerfilAdmInstituicao.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="formFileSm" class="form-label"></label>
              <input class="form-control form-control-sm"  type="file" name="arquivo" required>
                <p>deve ser tamanho 1:1 e de extensão .jpg</p>
            </div>
            <button  class=" btn-dark"type="submit" name="enviarImagem">alterar imagem de perfil</button>
          </form>
          <?php if (isset($_POST['enviarImagem'])) {

            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
            $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
            $diretorio = "../imagens/"; //define o diretorio para onde enviaremos o arquivo

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

            $sql_code = "INSERT INTO tb_arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";
            mysqli_query($conexao,$sql_code);

            $queryUpdate="UPDATE tb_usuario set imagem_usuario = '$novo_nome'
             where id_pessoa='$idAdm';";
             mysqli_query($conexao,$queryUpdate);

          } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</html>
