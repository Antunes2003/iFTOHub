<?php
session_start();

if(!isset($_SESSION['idUser'])){

}else{
  require 'conexao.php';
  global $pdo;
  $idautor = $_SESSION['idUser'];

  $sql = "SELECT NomeAutor from iftohub.autor WHERE idAutor = $idautor";
  $sql = $pdo->prepare($sql);
  $sql->execute();

  // Selecionando nome do autor para aparecer como logado.
  $dado = $sql->fetch();
  $nomeuser = $dado['NomeAutor'];

  $sql1 = "SELECT Email from iftohub.autor WHERE idAutor = $idautor";
  $sql1 = $pdo->prepare($sql1);
  $sql1->execute();

  // Selecionando email do usuário para verificar se é o adm ou não
  $dado1 = $sql1->fetch();
  $email = $dado1['Email'];

  echo "
  <div class='clearfix'>
    <p id='welcome' class='float-left alert alert-success'>Bem-vind@, ". strtoupper($nomeuser) . "</p>
    <a id='exit' class='alert alert-dark float-right text-center' href='Login/sair.php'>Sair</a>
  </div>";
  ?>
<?php
}
?>
<!DOCTYPE html>
<!-- saved from url=(0050)https://getbootstrap.com/docs/4.0/examples/album/# -->
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>iFTO Hub</title>
  <link rel="icon" href="../img/logoifhub.png">
  <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="../js/jquery-3.2.1.slim.min.js"></script>
  <link href="../css/album.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/be43ae3ae0.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    #welcome {
      width: 80%;
      display:inline-block;
      margin-right: 0px;
      margin-left: 0px;
      outline:none; 
      border:none; 
      clear:none;  
    }
    #exit {
      width: 20%;
      display:inline-block;
      outline:none; 
      border:none; 
      text-decoration: none;
      clear:none;  
    }
    #lista {
      color: white;
    }
    #lista:hover {
      color: #19882c;
      text-decoration: none;
    }
    .fa, .fas {
      font-size: 25px;
    }
    
  </style>
</head>
<body>
  <header>
    <div class="collapse mb-0" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Sobre</h4>
              <p class="text-white">Esta aplicação web tem como objetivo patentear projetos científicos desenvolvidos no
                Instituto Federal de Educação, Ciência e Tecnologia do Tocantins - IFTO. A
                proposta é que todos os estudantes possam expor seus projetos tendo sido eles
                aprovados ou não, formando um sistema que incentiva o crescimento do estudante
                visionando um maior conhecimento e aprendizado do mesmo em relação à projetos
                científicos, concluindo em fazer um repositório online para todo o corpo discente.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contato</h4>
              <ul class="list-unstyled">
                <li><a href="Contato/contato.php" class="text-white">Falar com os administradores</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="index.php" class="navbar-brand d-flex align-items-center" title="Página inicial">
            <img src="../img/logoifhub.png" alt="Logo iFTOHub" width="40px" height="40px">
            <strong>iFTOHub</strong>
          </a>
          <?php
          if(isset($email)){
            if($email == 'hubifto@gmail.com'){
              echo "<a href='lista.php' id='lista' title='Projetos pendentes'><i class='fas fa-exclamation-triangle'></i></a>";
            }
          }
          ?>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">TEXTO [h1]</h1>
          <p class="lead text-muted">DESCRIÇÃO BREVE</p>
          <p>
            <a href="Projeto/projeto.php" class="btn my-2">Inserir projeto</a>
          </p>
        </div>
      </section>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">Hello, World!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="https://github.com/iFTOHub/projetos-pdf/raw/main/HelloWorld.pdf">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Download</button>
                      </a>
                      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">Imprimir</button>
                    </div>
<!--                     <small class="text-muted">9 mins</small> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <p class="text-center">Repositório Institucional (RI) para o IFTO.</p> 
          <a href="index.php" class="float-right">Voltar ao topo da página (ñ funfa ainda)</a>
        </p>
      </div>
    </footer>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/holder.min.js"></script>
</body>
</html>