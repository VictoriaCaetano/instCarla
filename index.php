<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1″>
<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
    <title>pagina inicial do Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-md " style="background-image:url('imagens/fundoNav.png');background-repeat: repeat-x;background-position: center;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold text-monospace" href="acesso/loginUsuario.php">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark font-weight-bold text-monospace" href="livre/interesseAluno.php">Quero Ser Aluno!</a>
                </li>
            </ul>
        </div>
          <img src="imagens/logoEAD.png"  width="489" height="172" class="rounded mx-auto d-block" >

    </nav>



    <section class="jumbotron text-center bg-dark text-white">
      <div class="container">
      <h1 style="color:#DBB522;" class="jumbotron-heading ">Estude Conosco</h1>
      <h3 class=" text-white ">Ingresse no mercado da beleza e dê VIDA à arte que existe em cada um.</h3>
      </div>
    </section>
    <section class="jumbotron text-center">
      <div class="container">
      <h2 class="jumbotron-heading">Quem somos?</h2>
      <h3 class="text-muted">
        O Instituto Carla Caetano é uma instituição de ensino direcionada para a área  da beleza, um dos  segmentos com maior ascensão no país.<br>
Fundado em 2017, no Rio Grande do Sul, temos em nossa grade os mais variados cursos de aperfeiçoamento e formação profissional voltados para o setor da estética, tendo
como missão <strong>formar profissionais de excelência </strong>e oportunizar novos conhecimentos  e
 atualização para quem já atua na área e busca se especializar.
</h3>
      </div>
    </section>
    <section class="jumbotron text-center bg-white">
      <div class="container">
      <h2 class="jumbotron-heading">Nossos Cursos</h2>
      <h3 class="text-muted">Escolha o melhor curso que se encaixe no seu objetivo</h3>
      </div>
    </section>


<section class="jumbotron text-center bg-white">
      <div class="container">
          <div class="row">
          <!--daqui pra cima é dados do banco-->
          <?php header("Content-type: text/html; charset=utf-8");
          $querySelect =sprintf("SELECT id_curso, nm_curso, img_curso, intro_curso FROM tb_curso1;");
                  $exec=mysqli_query($conexao,$querySelect);
          while ($dados=mysqli_fetch_array($exec)) {
            echo "<tr><div class='col-sm-4'>
                <div class='card shadow-lg p-3'>
                    <img class='card-img-top' src=imagens/".$dados['img_curso']."  height='300' alt='Card image cap'>
                    <div class='card-body'>
                        <h5 class='card-title'>".$dados['nm_curso']."</h5>
                          <p class='card-text'>".$dados['intro_curso']."</p>
                          <form class='form-signin' action='livre/vizualizaCurso.php' method='post'>
                            <button class='btn btn-lg btn-dark btn-block' value=".$dados['id_curso']." name='codigo'type='submit'>Entrar</button>
                          </form>
                    </div>
                </div><br>
            </div><td>";
          }
           ?>
          <!----->
          </div>
      </div>
</section>

<section  style="background:#DBB522;" class="jumbotron text-center">
  <div class="container">
  <h3 class="jumbotron-heading ">Duvidas? Chama a gente!</h3><br>

    <div class="row">

      <div class="col-sm">
        <div class="row">
          <div class="col-sm">
            <svg  onclick="window.location.href='https://www.instagram.com/carlacaetano.instituto/'"  xmlns="http://www.w3.org/2000/svg" width="30" height="30"  fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>


          </div>
          <div class="col-sm">
            <svg  onclick="window.location.href='https://www.facebook.com/carlacaetano.instituto'" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
          </svg>
          </div>
          <div class="col-sm">
            <svg  onclick="window.location.href='https://api.whatsapp.com/send?phone=5551993923785'" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>



  </div>
</section>


<footer>
  <?php
  $querySelect =sprintf("SELECT * FROM tb_instituicao where id_instituicao='1';");
          $exec=mysqli_query($conexao,$querySelect);

   ?>
  <section class="jumbotron text-center">
    <div class="container">
      <div class="row">
        <?php   while ($dados=mysqli_fetch_array($exec)) {
            echo
            "<div class='col-sm'>
            ".$dados['em_instituicao']."
            </div>
            <div class='col-sm'>
        quer trabalhar conosco?<br> envie um email para: <br>".$dados['emContrata_instituicao']."
            </div>
            <div class='col-sm'>
        ".$dados['end_instituicao']."<br>
          ".$dados['cel_instituicao']."<br>
            </div>";
          } ?>
      </div>
    </div>
  </section>
</footer>
  </body>
</html>
