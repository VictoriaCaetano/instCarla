<?php include '../conexao.php'; ?>
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
    <nav class="navbar navbar-expand-md " style="background-image:url('../imagens/fundoNav.png');background-repeat: repeat-x;background-position: center;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold text-monospace" href="loginUsuario.php">Voltar</a>
                </li>

            </ul>
        </div>
          <img src="../imagens/logoEAD.png"  width="489" height="172" class="rounded mx-auto d-block" >
    </nav><br>

    <div class="container col-md-5 shadow-lg p-3 mx-auto">
          <section class="jumbotron  ">
              <h1 class="h3 mb-3 font-weight-normal">Recuperação de senha</h1>
            <form class="form-RecuperaSenha" action="RecuperaSenhaUsuario.php" method="post">

                  <div class="row g-3">
                    <div class="col"><br>
                    <input type="text" class="form-control" placeholder="CPF" name="cpf" required>
                    </div>
                  <div class="col"><br>
                    <input type="Email" class="form-control" placeholder="Email" name="email" required>
                    <br>
                  </div>
                    <input type="text" readonly class="form-control-plaintext" value="     Qual seu apelido de infância?">
                    <input type="texte" name="pergunta1"class="form-control" required>
                    <input type="text" readonly class="form-control-plaintext"  value="     Seu filme infantil favorito?">
                    <input type="texte" name="pergunta2" class="form-control" required>
                    <input type="text" readonly class="form-control-plaintext"  value="     Nome do seu primeiro animal de estimação?">
                    <input type="texte" name="pergunta3" class="form-control" required>
                      <div class="col"><br>
                        <input type="password" class="form-control" placeholder="Nova Senha" name="NovaSenha" required>
                      </div>
                  <div class="col"><br>
                    <input type="password" class="form-control" placeholder="Confirma Senha" name="ConfirmaSenha" required>
                  </div>
                  </div>
                  <br>    <button class="btn btn-lg btn-warning btn-block" name="recuperar"type="submit">Recuperar</button>
              </form>
          </section>
    </div>


  </body>
</html>
<?php
  if (isset($_POST['recuperar'])) {
    $cpf=$_POST['cpf'];
    $email=$_POST['email'];
    $p1=$_POST['pergunta1'];
    $p2=$_POST['pergunta2'];
    $p3=$_POST['pergunta3'];
    $novaSenha=$_POST['NovaSenha'];
    $confirmaSenha=$_POST['ConfirmaSenha'];

    if($novaSenha==$confirmaSenha){
      $queryUpdate="UPDATE tb_usuario1 A, tb_pessoa B set A.sn_usuario = '$novaSenha'
       where A.id_pessoa=B.id_pessoa AND
       B.em_pessoa='$email' AND
       B.cpf_pessoa='$cpf'AND
       A.pergunta1='$p1' AND
       A.pergunta2='$p2' AND
       A.pergunta3='$p3' ;";

       mysqli_query($conexao,$queryUpdate);

       $queryselect="select sn_usuario from tb_usuario1 where sn_usuario='$novaSenha';";
        $x=mysqli_query($conexao,$queryselect);
        $cont=mysqli_num_rows($x);
         if($cont==0){
           echo "dados de usuario não encontrados, tente novamente";
         }else {
           echo "senha alterada";
         }

  }
}
 ?>
