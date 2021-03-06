<?php
    session_start();
    ob_start();
    require_once('class/config.php');

?>
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">
    
        <title>Starter Template for Bootstrap</title>
    
        <!-- Bootstrap core CSS -->
        <link href="<?php echo URL_BOOT ;?>/dist/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">
      </head>
    
      <body>
    
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
    
        <main role="main" class="container">
          <a href="create.php" class="btn btn-primary">Cadastrar Novo</a>
          <a href="#" class="btn btn-primary" onclick="read();">Carregar Registros</a>
          <hr>
          <div  id="read_user">
                <!-- <div class="starter-template">
                <table class="table">';
                <thead>
                <tr>
                  <td><strong>ID</strong></td>
                  <td><strong>NOME</strong></td>
                  <td><strong>ACOES</strong></td>
                </tr>
              </thead>
              <tbody>
              </tbody> -->
            </div>
          </div>
 
        </main><!-- /.container -->
    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script src="<?php echo URL_BOOT ;?>/assets/js/jquery.js"></script>
        <script src="<?php echo URL_BOOT ;?>/assets/js/vendor/popper.min.js"></script>
        <script src="<?php echo URL_BOOT ;?>/dist/js/bootstrap.min.js"></script>
      </body>
      <script>
          $(function(){
            read();
          });
          function read(){
            var acao = "&acao=read";            
            $.ajax({
                type: 'POST',
                url: "php/crud.php",                
                data: acao,                  
                success: function (data) {
                  $("#read_user").html(data);      
                }
            });
         }
         function deletar(id){
            var acao = "&acao=deletar&id="+id;            
            $.ajax({
                type: 'POST',
                url: "php/crud.php",                
                data: acao,                  
                success: function (data) {
                  read();      
                }
            });
         }
      </script>
    </html>
    