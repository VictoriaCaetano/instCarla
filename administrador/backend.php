<?php
 include '../conexao.php';



 if (isset($_POST['altNome'])) {
  $nome=$_POST['nome'];
  $curso=$_POST['altNome'];



    $sqlNome="UPDATE `tb_curso1` SET `nm_curso`= '$nome' WHERE id_curso= $curso ;";

    mysqli_query($conexao,$sqlNome);

    echo "<script> alert('alterado com secesso');
    window.location.href='homeCursosAdm.php';
    </script>";



}else if (isset($_POST['altDesc'])) {

  $desc=$_POST['desc'];
  $curso=$_POST['altDesc'];

  $sqlDesc="UPDATE `tb_curso1` SET `desc_curso`= '$desc' WHERE id_curso= $curso ;";

  mysqli_query($conexao,$sqlDesc);

  echo "<script> alert('alterado com secesso');window.location.href='homeCursosAdm.php'; </script>";


}else if (isset($_POST['altIntro'])) {

  $intro=$_POST['intro'];
  $curso=$_POST['altIntro'];

  $sqlIntro="UPDATE `tb_curso1` SET `intro_curso`= '$intro' WHERE id_curso= $curso ;";

  mysqli_query($conexao,$sqlIntro);

  echo "<script> alert('alterado com secesso');window.location.href='homeCursosAdm.php'; </script>";


}else if (isset($_POST['altHoras'])) {

  $horas=$_POST['horas'];
  $curso=$_POST['altHoras'];

  $sqlHoras="UPDATE `tb_curso1` SET `ch_curso`= '$horas' WHERE id_curso= $curso ;";

  mysqli_query($conexao,$sqlHoras);

  echo "<script> alert('alterado com secesso'); window.location.href='homeCursosAdm.php';</script>";


}else if (isset($_POST['AltImagem'])) {

  $curso=$_POST['AltImagem'];


$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "../imagens/"; //define o diretorio para onde enviaremos o arquivo

move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload



 $sqlNome="UPDATE tb_curso1 SET img_curso= '$novo_nome' WHERE id_curso= $curso ;";
   mysqli_query($conexao,$sqlNome);

$sqlImagem="UPDATE `tb_arquivo` SET `arquivo`= '$novo_nome', `data`= NOW() WHERE id_curso= $curso ;";
  mysqli_query($conexao,$sqlImagem);

  echo "<script> alert('alterado com secesso');window.location.href='homeCursosAdm.php'; </script>";

}


if (isset($_POST['Enviar'])) {
//  $sqlAcessos="update tb_contaacesso A SET numAcesso=numAcesso+1 where A.id_curso='$codigo';";
//  $result=mysqli_query($conexao,$sqlAcessos);


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

                 }else {
                  echo "curso já cadastrado";
                 }





}
 ?>
