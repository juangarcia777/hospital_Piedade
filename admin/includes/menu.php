

<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/alt.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="administracao.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            
            
            <li><a href="banners.php">Banners</a></li>
            
            <li><a href="maternidade.php">Maternidade</a></li>
            
            
            
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bem vindo, <?php echo $nome_usuario; ?></a></li>
            
            <li>&nbsp;</li>
            <li class="active"><a href="index.php?logout=1">&nbsp;&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i> SAIR&nbsp;&nbsp;</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>