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
                    <a class="nav-link text-dark font-weight-bold text-monospace" href="../index.php">Voltar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold text-monospace" href="loginAdm.php">Administrador</a>
                </li>

            </ul>
        </div>
          <img src="../imagens/logoEAD.png"  width="489" height="172" class="rounded mx-auto d-block" >
    </nav><br>


    <div class="container col-md-5 mx-auto">
      <div class="shadow-lg p-3 mb-5 bg-white  rounded">
        <section class="jumbotron  text-center ">
          <form class="form-entrar" action="loginUsuario.php" method="post">
          <img class="mb-4" src="../imagens/logoSimples.png" alt="" width="100" height="100">
          <h1 class="h3 mb-3 font-weight-normal">Usuario</h1>
          <div class="row g-3">
            <div class="col"><br>
            <input type="text" class="form-control" placeholder="usuario" name="usuario" required>
                    <br>  <input type="radio" name="tipo" value="1"/ required>professor
            </div>
          <div class="col"><br>
            <input type="password" class="form-control" placeholder="senha" name="senha" required>
                    <br>  <input type="radio" name="tipo" value="2"/ required>aluno
            </div>

          </div>
    <a class="link text-warning font-weight-bold text-monospace" href="recuperaSenhaUsuario.php">Recuperar Senha...</a>
        <br>    <button class="btn btn-lg btn-warning btn-block" name="entrar"type="submit">Sign in</button>
          </form>
            </section>
      </div>
</div>



  </body>
</html>
<?php
if ((isset($_POST['entrar'])) && (isset($_POST['tipo']))) {
      $usuario=$_POST['usuario'];
      $senha=$_POST['senha'];
      $tipo=$_POST['tipo'];

            if ($tipo==1) {
              $sqlLogin="SELECT sn_usuario, user_usuario from tb_usuario A, tb_tipopessoa B where user_usuario='$usuario' and sn_usuario='$senha' AND
B.id_pessoa=A.id_pessoa and b.id_tipo=1;";
                if($result=mysqli_query($conexao,$sqlLogin)){
                    $cont=mysqli_num_rows($result);
                    if ($cont==0) {
                      echo "<script>
                              alert('Infelizmente este usuario não foi encontrado :( tente novamente )');
                              window.location.href='loginUsuario.php';
                            </script>";
                    }else {
                      echo "<script>
                              alert('Login efutuado com secesso! posteriormente sera redirecionado para a pagina inicial do professor )');
                              window.location.href='../index.php';
                            </script>";
                    }
                    //echo "$cont";//variavel que ve se teve algum resultado
                  echo "$cont";
                }
            }else if ($tipo==2) {
              $sqlLogin="SELECT sn_usuario, user_usuario from tb_usuario A, tb_tipopessoa B where user_usuario='$usuario' and sn_usuario='$senha' AND
B.id_pessoa=A.id_pessoa and b.id_tipo=2;";

if($result=mysqli_query($conexao,$sqlLogin)){
    $cont=mysqli_num_rows($result);
    if ($cont==0) {
      echo "<script>
              alert('Infelizmente este usuario não foi encontrado :( tente novamente )');
              window.location.href='loginUsuario.php';
            </script>";
    }else {
      echo "<script>
              alert('Login efutuado com secesso! posteriormente sera redirecionado para a pagina inicial do aluno )');
              window.location.href='../index.php';
            </script>";
    }
    //echo "$cont";//variavel que ve se teve algum resultado
  echo "$cont";
}
            }
            //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
            //adiionar segunda verificação para administrador!!
            //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
}


 ?>
