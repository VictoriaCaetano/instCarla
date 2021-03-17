<?php  $conexao=mysqli_connect("localhost","root","","banco_tcc");
    if(!$conexao){
      echo "<script>alert('infelismente não conseguimos conectar com o banco de dados ?:(');</script>";
      die(mysqli_error());
    }
    if($conexao){
      //echo "<script>alert('Conexção com banco de dados realizada com sucesso!   :D');</script>";;




    }?>
