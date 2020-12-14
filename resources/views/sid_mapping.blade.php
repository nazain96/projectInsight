@extends('layouts.insight')

@section('content')
<head>
	<title>Sid Mapping</title>

	<script type="text/javascript">
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
		        x = rows[i].getElementsByTagName("TD")[1];
		        y = rows[i + 1].getElementsByTagName("TD")[1];
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
	</script>

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

</head>

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
	            <span>SID Mapping</span>
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
	            <!-- <button disabled type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#basicExampleModal">
	              <i class="fas fa-columns mt-0">  Mapping Rules</i>
	            </button> -->

	          </div>

	          <a href="" class="white-text mx-3 align-items-center">Project Insight (Sid Mapping) </a>

	          <div class="d-flex justify-content-center">
	          <input style="margin-right: 10px;" id="mySearch" onkeyup="mySearch()" type="text" placeholder="Search" aria-label="Search" class="form-control" name="searchkey">
	          </div>

	        </div>

	        <div class="px-4">

	            <table class="table table-hover table-border w-100 text-center mx-auto p-3 mt-2" id="myTable">
	              <thead class="info-color">
	                <tr class="header">
	                	<th>No.</th>
	                  	<th>SID
	                  		<a href="#" onclick="sortAscSid()" ><i class="fa fa-sort" aria-hidden="true"></i></a>
	                  	</th>
	                  	<th>Technique Name</th>
	                  	<th>Threat Name </th>
	                  	<th>Threat Class</th>
	                  	<th>Severity</th>
	                  	<th>State</th>
	                  	<th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
	                @foreach($sid as $sids)
	                <tr>
	                	<td></td>
	                  	<td>{{$sids->sid}}</td>
	                  	<td>{{$sids->technique_name}}</td>
	                  	<td>{{$sids->threat_name}}</td>
	                  	<td>
	                    {{$sids->threat_class}}
	                  	</td>
	                  	<td>{{$sids->severity}}</td>
	                  	<td>

	                  		@if($sids->state == 0)
	                  		 	 Ignore
	                  		@else 
	                  			@if($sids->state == 1)
	                  				Inactive
	                  			@else
	                  				Active
	                  			@endif
	                  		@endif

	             		</td>
	                  	<td>

	                  	<div>
	                  		@if($sids->state == 1)
		                  		<a style="width:130px;" class="btn btn-md warning-color " href="{{ route('sidReview', $sids->sid)}}">Review</a>
		                  	@else
		                  		@if($sids->state == 0)

									<form method="POST" action="{{ route('stateUpdate', $sids->sid) }}">

	        						{{ csrf_field() }}
									
									<div class="dropdown">
									<select  class="btn btn-md btn-primary dropdown-toggle px-3" name="state" id="state" class="browser-default custom-select" onchange="this.form.submit()">
			                          <option value="" disabled selected>Update State</option>
			                          <option value="0">0 - Ignore</option>
			                          <!-- <option class="dropdown-item" value="1">1 - Inactive</option> -->
			                          <option value="2">2 - Active</option>
			                        </select>
			                    	</div>
			                    	</form>

		                  		@else
		                  			<a style="width:130px;" class="btn btn-default btn-md green accent-3" href="#">Approved</a>
		                  		@endif
		                  	@endif
	                  	</div>

	                  </td>
	                </tr>
	                @endforeach
	              </tbody>
	            </table>

	            

	        </div>

	      </div>

	    </div>
	  </main>
	  <!--Main layout-->

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

@endsection