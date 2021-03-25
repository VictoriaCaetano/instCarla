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
  </body>
</html>
<?php

 include '../conexao.php';

        $querySelect ="SELECT id_curso, nm_curso FROM tb_curso1;";              //busca todos os cursos, botão de enviar contem o codigo do curso apresentado
         $exec=mysqli_query($conexao,$querySelect);
 while ($dados=mysqli_fetch_array($exec)) {
    echo "<p>".$dados['nm_curso']."</p>";
    echo "<form action='teste.php' method='post'>
            <button class='btn  btn-dark' value=".$dados['id_curso']." name='idCurso' type='submit'>Entrar</button>
          </form>";
 }


if (isset($_POST['idCurso'])) {           //se o curso for clicado, recebe o codigo especifoco e manda listar os modulos
  $id=$_POST['idCurso'];
  $querySelectModulo =sprintf("SELECT nm_modulo, id_modulo, desc_modulo FROM tb_modulo1 where id_curso='$id';");
          $exec2=mysqli_query($conexao,$querySelectModulo);
          echo "modulos <br>";
   while ($dados2=mysqli_fetch_array($exec2)) {         //cada motão do modulo contem o seu id especícico
     echo "<form action='teste.php' method='post'>
     <p> ".$dados2['nm_modulo']."</p>
                <button class='btn  btn-dark' value=".$dados2['id_modulo']." name='idModulo' type='submit'>Entrar</button>
          </form>";
   }
}


if (isset($_POST['idModulo'])) {    //quando o botão do modulo é clicado, aqui recebe seu id,  é feito um formulario,

  $modulo=$_POST['idModulo'];

  echo "<form action='teste.php' method='post'>
              <label>nome</label>
              <input type='text' name='nome' value=''>
             <button class='btn  btn-dark' value=".$modulo." name='idAlterar' type='submit'>Entrar</button>
       </form>";
}


if (isset($_POST['idAlterar'])) { //quando clicado para idAlterar o formulario altera apenas do modulo correspondente
  $id=$_POST['idAlterar'];
  $nome=$_POST['nome'];
  echo "id -".$id;
  echo "nome novos".$nome ;
}

 ?>
