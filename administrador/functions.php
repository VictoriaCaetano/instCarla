<?php include '../conexao.php';


function SelectNmCurso($id){


  $querySelect =sprintf("SELECT nm_curso FROM tb_curso1 where id_curso='$id';");
  $exec=mysqli_query($conexao,$querySelect);
  while ($dados=mysqli_fetch_array($exec)) {
    $nome=$dados['nm_curso'];
    return $nome;
  }
}

function SelectDescCurso($id){
  include '../conexao.php';

  $querySelect =sprintf("SELECT desc_curso FROM tb_curso1 where id_curso='$id';");
  $exec=mysqli_query($conexao,$querySelect);
  while ($dados=mysqli_fetch_array($exec)) {
    $desc=$dados['desc_curso'];
    return $desc;
  }
}





?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php echo "string".SelectCurso(8); ?>
  </body>
</html>
