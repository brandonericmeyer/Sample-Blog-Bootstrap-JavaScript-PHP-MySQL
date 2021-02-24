<?php
	$_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Customize Template Project</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="resources/css/main.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>

  <body onload="init();">
    <div id="nav-masthead" class="blog-masthead">
      <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
          <h1 id="language" name="language" class="blog-title">The Blog</h1>
          <div class="row pull-right">              
            <a class="navbar-brand" onclick="main.updateColor('english')" href="#"><img src="resources/img/us.png" alt="English"></a>
              <a class="navbar-brand" onclick="main.updateColor('german')" href="#"><img src="resources/img/de.png" alt="German"></a>
              <a class="navbar-brand" onclick="main.updateColor('italian')" href="#"><img src="resources/img/it.png" alt="Italian"></a>
          <form method="post">
            <input type="hidden" name="firstname" id="firstname">
                <input onClick="main.setTheme()" type="button" name="submit" value="Save" class="btn btn-secondary">
          </form>
        </div>
        </nav>
      </div>
    </div>


    <div class="container">
      <div class="row">
      <div class="col-sm-2 blog-main"></div>
        <div class="col-sm-8 blog-main">
            <p>You have successfully signed out!  Redirecting...</p>
        </div>
        <div class="col-sm-2 blog-main"></div>


      </div><!-- /.row -->

    </div><!-- /.container -->



  <!-- Color changes JavaScript
    ================================================== -->
    <script type="text/javascript" src="resources/js/main.js"></script>
    <script type="text/javascript" src="resources/js/database.js"></script>
    <script type="text/javascript" src="resources/js/color.js"></script>


    <script type="text/javascript">
          init = function() 
          {
              document.getElementById("language").contentEditable = true;
              setTimeout("location.href = 'index.php';",1700);
          }

          document.getElementById("language").addEventListener("input", function() {
               main.title = $('#language').html().toLowerCase();
          }, false);
     </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  </body>