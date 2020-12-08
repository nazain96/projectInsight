@extends('layouts.insight')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Pending Events</title>
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

    table
    {
        counter-reset: rowNumber;
    }

    table tr > td:first-child
    {
        counter-increment: rowNumber;
    }

    table tr td:first-child::before
    {
        content: counter(rowNumber) ".";
        min-width: 1em;
        margin-right: 0.5em;
    }

  </style>

<script>

  function mySearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      if (!tr[i].classList.contains('header')) {
        td = tr[i].getElementsByTagName("td");
        match = false;
        for (j = 0; j < td.length; j++) {
          if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
            match = true;
            break;
          }
        }
        if (!match) {
          tr[i].style.display = "none";
        } else {
          tr[i].style.display = "";
        }
      }
    }
  }

  function sortDescHits() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[3];
        y = rows[i + 1].getElementsByTagName("TD")[3];
        //check if the two rows should switch place:
        if (Number(x.innerHTML) < Number(y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

  function sortAscHits() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[3];
        y = rows[i + 1].getElementsByTagName("TD")[3];
        //check if the two rows should switch place:
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

  function sortAscSid() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[2];
        y = rows[i + 1].getElementsByTagName("TD")[2];
        //check if the two rows should switch place:
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

  function sortDescDate() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[5];
        y = rows[i + 1].getElementsByTagName("TD")[5];
        //check if the two rows should switch place:
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

  function sortAscDate() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[5];
        y = rows[i + 1].getElementsByTagName("TD")[5];
        //check if the two rows should switch place:
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }
    }
  }

</script>

</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="#" target="_blank">Dashboard</a>
            <span>/</span>
            <span>Pending Events</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->

      @if(session('successMsg'))
          {{ session('successMsg') }}
      @endif

      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <div class="card card-cascade narrower">

        <div class="view view-cascade blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

          <div>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#basicExampleModal">
              <i class="fas fa-columns mt-0">  Mapping Rules</i>
            </button>

            <!-- <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#fullHeightModalRight">
              <i class="fa fa-filter" style="color: white;" aria-hidden="true"> Filter</i>
            </button> -->

          </div>

          <a href="" class="white-text mx-3">Project Insight (Pending Event) </a>

          <div class="d-flex justify-content-center">
          <input style="margin-right: 10px;" id="mySearch" onkeyup="mySearch()" type="text" placeholder="Search" aria-label="Search" class="form-control" name="searchkey">

          <!-- <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button> -->
          </div>

        </div>

        <div class="px-4">

          <form method="POST" action="{{ route('store') }}">

            {{ csrf_field() }}

            <table class="table table-hover table-border w-100 text-center mx-auto p-3 mt-2" id="myTable">
              <thead class="info-color">
                <tr class="header">
                  <th>No.</th>
                  <th>
                    <input type="checkbox" id="select-all">
                  </th>
                  <th>SID
                    <a href="#" onclick="sortAscSid()" ><i class="fa fa-sort" aria-hidden="true"></i></a>
                  </th>
                  <th>Hits
                    <!-- <a href="#" onclick="sortHits()" ><i class="fa fa-sort" aria-hidden="true"></i></a> -->
                    <div class="btn-group dropup">
                      <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-sort" aria-hidden="true">
                          <span class="sr-only">Toggle Dropdown</span>
                        </i>

                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#" onclick="sortAscHits()">
                            <i style="margin-right: 10px;" class="fa fa-caret-right" aria-hidden="true"></i>Ascending
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" onclick="sortDescHits()">
                            <i style="margin-right: 10px;" class="fa fa-caret-right" aria-hidden="true"></i>Descending
                          </a>
                        </div>

                      </a>
                    </div>

                  </th>
                  <th class="w-50 p-3">Message </th>
                  <th>Last Seen
                    <!-- <a href="#" onclick="sortDate()"><i class="fa fa-sort" aria-hidden="true"></i></a>  -->
                    <div class="btn-group dropup">
                      <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="fa fa-sort" aria-hidden="true">
                          <span class="sr-only">Toggle Dropdown</span>
                        </i>

                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#" onclick="sortAscDate()">
                            <i style="margin-right: 10px;" class="fa fa-caret-right" aria-hidden="true"></i>Oldest
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" onclick="sortDescDate()">
                            <i style="margin-right: 10px;" class="fa fa-caret-right" aria-hidden="true"></i>Recent
                          </a>
                        </div>

                      </a>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($event as $events)
                <tr>
                  <td></td>
                  <td>
                    <div>
                      <!-- <input type="checkbox" name="check_select[]" value="{{$events->id}}"> -->
                      <input type="checkbox" id="verify" name="check_select[]" value="{{$events->sid}}" {{$events->check_select == 1 ? 'checked':''}}>
                    </div>
                  </td>
                  <td>{{$events->sid}}</td>
                  <td>{{$events->hits}}</td>
                  <td>{{$events->signature}}</td>
                  <td>
                    {{$events->lastseen_at}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <!-- Generate rule popup -->
            <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <!--Modal: Contact form-->
              <div class="modal-dialog cascading-modal" role="document">

                <!--Content-->
                <div class="modal-content">

                  <!--Header-->
                  <div class="modal-header primary-color white-text">
                    <h4 class="title">
                      <i class="fa fa-pencil-alt"></i> SID Mapping</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                      aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <!-- Header -->

                  <!--Body-->
                  <div class="modal-body">

                    <!-- Material input name -->
                    <div class="md-form form-sm">
                      <i class="fa fa-book prefix"></i>
                      <input type="text" id="materialFormNameModalEx1" class="form-control form-control-sm" name="technique_name">
                      <label for="materialFormNameModalEx1">Technique name</label>
                    </div>

                    <!-- Material input email -->
                    <div class="md-form form-sm">
                      <i class="fa fa-exclamation-triangle prefix" ></i>
                      <input type="text" id="materialFormEmailModalEx1" class="form-control form-control-sm" name="threat_name">
                      <label for="materialFormEmailModalEx1">Threat name</label>
                    </div>

                    <!-- Material input subject -->
                    <div class="md-form form-sm">
                      <i class="fa fa-sitemap prefix"></i>
                      <input type="text" id="materialFormSubjectModalEx1" class="form-control form-control-sm" name="threat_class">
                      <label for="materialFormSubjectModalEx1">Threat class</label>
                    </div>

                    <!--Grid row-->
                    <div class="row wow fadeIn justify-content-center">

                      <!--Grid column-->
                      <div class="col-md-5 mb-4">
                        <!-- <label for="severity"><i class="fa fa-thermometer-full" aria-hidden="true"></i> Threat Severity: </label> -->
                        <select name="severity" id="severity" class="browser-default custom-select">
                          <option value="" disabled selected>Threat Severity</option>
                          <option value="Critical">Critical</option>
                          <option value="High">High</option>
                          <option value="Medium">Medium</option>
                          <option value="Low">Low</option>
                        </select>
                      </div>
                      <!--Grid column-->

                      <!--Grid column-->
                      <div class="col-md-5 mb-4">
                        <input type="checkbox" name="ignore" id="ignore" value="0" >
                        <label for="ignore">Ignore Event? </label>
                      </div>
                      <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <div class="text-center mt-4 mb-2">
                      <button class="btn btn-primary btn-block">Submit
                        <i class="fa fa-send ml-2"></i>
                      </button>
                    </div>

                  </div>
                  <!-- Body -->
                </div>
                <!--/.Content-->
              </div>
              <!--/Modal: Contact form-->
            </div>
            <!-- Generate rule popup -->

          </form>

        </div>

      </div>

    </div>
  </main>
  <!--Main layout-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <script type="text/javascript">
    document.getElementById('select-all').onclick = function() {
      var checkboxes = document.getElementsByName('check_select[]');
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    }
  </script>

  
</body>

@endsection

</html>
