<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- <title>Rule Design</title> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">

  <style>

    .map-container{
      overflow:hidden;
      padding-bottom:56.25%;
      position:relative;
      height:0;
    }

    .map-container iframe{
      left:0;
      top:0;
      height:100%;
      width:100%;
      position:absolute;
    }


  </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar blue-gradient fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#" target="_blank">
          <strong class="white-text">CyberSecurity</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/')}}">
                <strong class="black-text">Pending Events</strong>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('sid-mapping')}}">
                <strong class="black-text">SID Mapping</strong>
              </a>
            </li>

          </ul>
          <!-- Links -->

        </div>

      </div>

    </nav>
    <!-- Navbar -->

    <main class="py-4">
        @yield('content')
    </main>

    <!--Footer-->
    <footer class="page-footer text-center font-small blue-gradient darken-2 mt-4 wow fadeIn">

      <!--Copyright-->
      <div class="footer-copyright py-3">
        © 2020 Copyright:
        <a href="#"> CyberSecurity Malaysia </a>
      </div>
      <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
    
</body>
