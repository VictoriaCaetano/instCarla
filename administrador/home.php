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
$idPessoa=$_SESSION['Adm'];
 include '../conexao.php';
$posicao=0;
$posicao1=0;


/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
 simplesmente não fazer o login e digitar na barra de endereço do seu navegador
o caminho para a página principal do site (sistema), burlando assim a obrigação de
fazer um login, com isso se ele não estiver feito o login não será criado a session,
então ao verificar que a session não existe a página redireciona o mesmo
 para a index.php.*/



?>
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
        <button type="button" class="btn btn-dark" onclick="window.location.href='teste.php'">Professores</button>
        <button type="button" class="btn btn-dark" onclick="window.location.href='homeAlunosAdm.php'">Alunos</button>
        <button type="button" class="btn btn-dark" onclick="window.location.href='homeCursosAdm.php'">Cursos</button>
      </div>
      <form class="d-flex">
        <button type="button" class="btn btn-dark" onclick="window.location.href='alterarPerfilAdmInstituicao.php'">perfil</button>
        <button type="button" name="sair"class="btn btn-dark" href="?AdmLogOut" ><a class="text-decoration-none text-white"href="?AdmLogOut">Sair</a></button>

     </form>
    </nav>

    <section class="jumbotron text-center bg-white">
      <div class="container">

      <div class="row g-3">
        <div class="col"><br>
          <h2 class="jumbotron-heading">Cursos Mais acessados</h2>
          <h3 class="text-muted">Na pagina Inicial</h3>
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col"></th>
                          <th scope="col">Curso</th>
                          <th scope="col">Acessos</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php   $querySelect =sprintf("SELECT numAcesso, nm_curso FROM tb_contaacesso A, tb_curso1 B where B.id_curso=A.id_curso  ORDER BY numAcesso DESC LIMIT 5;");
                              $exec=mysqli_query($conexao,$querySelect);
                              while ($dados=mysqli_fetch_array($exec)) {
                              $posicao=$posicao+1;
                              echo "
                              <tr>
                                  <th class='table-warning'scope='row'>".$posicao."</th>
                                  <td  class='table-warning'>".$dados['nm_curso']."</td>
                                  <td  class='table-warning'>".$dados['numAcesso']."</td>
                              </tr>
                              ";
                              }
                      ?>
                  </tbody>
              </table>
        </div>
        <div class="col"><br>
          <h2 class="jumbotron-heading">Cursos com Mais Alunos </h2>
          <h3 class="text-muted">Matriculados</h3>
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col"></th>
                          <th scope="col">Curso</th>
                          <th scope="col">Alunos</th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php   $querySelect =sprintf("SELECT count(A.id_pessoa) C, B.nm_curso from tb_pessoacurso1 A, tb_curso1 B  where A.st_matricula=1 and A.id_curso=B.id_curso GROUP by B.nm_curso LIMIT 5;");
                              $exec=mysqli_query($conexao,$querySelect);
                              while ($dados=mysqli_fetch_array($exec)) {
                              $posicao1=$posicao1+1;
                              echo "
                              <tr>
                                  <th class='table-warning'scope='row'>".$posicao1."</th>

                                  <td  class='table-warning'>".$dados['nm_curso']."</td>
                                    <td  class='table-warning'>".$dados['C']."</td>
                              </tr>
                              ";
                              }
                      ?>
                  </tbody>
              </table>
        </div>

      </div>
      </div>
    </section>

    <section class="jumbotron text-center bg-white">
      <div class="container">
        <h2 class="jumbotron-heading">Cards de Interesse </h2>
        <h3 class="text-muted">enviado por usuarios que acessaram o site</h3> <br><br><br>
          <div class="row">
            <?php
            $querySelect =sprintf("SELECT * FROM tb_interesse;");
                    $exec=mysqli_query($conexao,$querySelect);
            while ($dados=mysqli_fetch_array($exec)) {
              echo "<tr><div class='col-sm-4'>
                  <div class='card shadow-lg p-3'>
                      <div class='card-body'>

                          <h5 class='card-title'>".$dados['nm_aluno']."</h5>
                            <p class='card-text'> tem interesse nos cursos: ".$dados['cursos_interesse']."</p>
                            <p class='card-text'> telefone:".$dados['cel_aluno']."</p>
                            <p class='card-text'> email:".$dados['em_aluno']."</p>
                            <form class='' action='home.php' method='post'>

                            </form>
                            <form class='form-signin' action='home.php' method='post'>

                              <button class='btn btn-danger' value=".$dados['id_interesse']." name='codigo' type='submit'>
                             <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                </svg>
                            excluir
                            </button>
                            </form>
                      </div>
                  </div><br>
              </div>
              <td>
              ";
            }

            if (isset($_POST['codigo'])) {
            $id=$_POST['codigo'];
            $queryDelet="DELETE FROM tb_interesse WHERE id_interesse = '$id';";
             mysqli_query($conexao,$queryDelet);
            echo "<script>
             alert('excluido com sucesso');
             window.location.href='home.php'
              </script>";
            }
             ?>
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
