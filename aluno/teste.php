<?php include '../conexao.php';

if (isset($_POST['Enviar'])) {
      $comentario=$_POST['Ncomentario'];
      $pessoa=5;
      $aula1=$_POST['Enviar'];

      $sqlInsertComentario="insert into tb_comentario (text_comentario, id_pessoa, id_aula) values ('$comentario','$pessoa', '$aula1');";
      mysqli_query($conexao,$sqlInsertComentario);

  }

 ?>
