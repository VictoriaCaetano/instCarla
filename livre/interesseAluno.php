<?php include '../conexao.php'; ?>
<!DOCTYPE html> com alteração
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>pagina inicial do Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>

  <body>
    <nav class="navbar navbar-expand-md " style="background-image:url('../imagens/fundoNav.png');background-repeat: repeat-x;background-position: center;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold text-monospace" href="../index.php">Voltar</a>
                </li>

            </ul>
        </div>
          <img src="../imagens/logoEAD.png"  width="489" height="172" class="rounded mx-auto d-block" >
    </nav><br>


        <div class="container col-md-5 shadow-lg p-3 mx-auto">
              <section class="jumbotron  ">
                  <form class="form-entrar" action="interesseAluno.php" method="post">
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Nome</label>
                          <div class="col-sm-10">
                              <input type="text"  name="nome" class="form-control" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label  class="col-sm-2 col-form-label" >Email</label>
                          <div class="col-sm-10">
                              <input type="Email"  name="email"class="form-control" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" >Telefone ou WhatApp</label>
                          <div class="col-sm-10">
                              <input type="tel"  name="celular"class="form-control" required>
                          </div>
                      </div>

                      <div class="col-sm-15">
                        <legend class="text-center">Cursos de Interesse</legend>
                        <?php
                        $querySelect =sprintf("SELECT id_curso, nm_curso FROM tb_curso1;");
                        $exec=mysqli_query($conexao,$querySelect);
                            while ($dados=mysqli_fetch_array($exec)) {
                            echo "  <label>
                                          <input type='checkbox' name='arrayInteresses[]' value=".$dados['id_curso'].">
                                          ".$dados['nm_curso']."
                                    </label><br>";
                            }

                        ?>
                      </div>

                      <br>    <button class="btn btn-lg btn-warning btn-block" name="Enviar" type="submit">Enviar</button>
                  </form>
              </section>
        </div>



  </body>
</html>
<?php
if (isset($_POST['Enviar'])) {
  $cursos = null;

//Verificamos se o índice existe
if (isset($_POST['arrayInteresses']))

    //Atribuimos a variável todo conteúdo do índice
    $cursos = $_POST['arrayInteresses'];
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $cel=$_POST['celular'];

$valores=null;

//Verificamos se a variável não é nula
if ($cursos !== null){

      //Percorremos todos os conteúdos do array
      for ($i = 0; $i < count($cursos); $i++){
        $valores=$valores.",".$cursos[$i];
            //exibimos o valor atual na tela
            echo "<p>{$cursos[$i]}</p>";
      }

      $queryInsert="INSERT INTO `tb_interesse`(`em_aluno`, `cursos_interesse`, `nm_aluno`, `cel_aluno`)
       VALUES ('$email', '$valores', '$nome', '$cel');";
       mysqli_query($conexao,$queryInsert);



  /**
   * Recebe um parâmetro e exibe o seu conteúdo
   *
   * @param  mixed $param
   * @return void
   */
      function dd($param)
      {
          echo '<pre>';
          print_r($param);
          echo '</pre>';
             die();
      }
}


}
 ?>
