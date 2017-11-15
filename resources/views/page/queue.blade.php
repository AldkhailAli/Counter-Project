@extends('layout.app')

@section('content')

<!-- Queue Table -->
	<div class="w3-container" id="queue-table">
	  <h2>Queue List</h2>

		<div style="margin:10px; float:left;">
			<div class="w3-bar w3-black">
		<div class="dropdown">
		<button onclick="myFunction()" class="dropbtn">Dropdown</button>
  	<div id="myDropdown" class="dropdown-content">
    <a href="#Teacher-1">Teacher 1</a>
    <a href="#Teacher-2">Teacher 2</a>
    <a href="#Teacher-3">Teacher 3</a>
  </div>
</div>

		  </div>

	  	<div id="table" class="w3-container w3-border city">
				<table class="w3-table w3-bordered w3-hoverable" >
			    <thead>
			      <tr>
							<th>No.</th>
			        <th>Ticket Number</th>
			        <th>Estimated Waiting Time</th>
			      </tr>
			    </thead>
			    @if ($tickets != null)
						@if ($tickets->count() < 1)
							<tr><td>1</td><td>0000</td><td>0 min</td></tr>
						@else
							@foreach($tickets as $ticket)
								<tr><td>2</td><td>0002</td><td>2 min</td></tr>
							@endforeach
						@endif
					@else
						<tr><td>1</td><td>0000</td><td>0 min</td></tr>
					@endif
			  </table>
		  </div>
		</div>

		<div class="w3-card-2 w3-center" style="padding:40px; width:400px; margin-left:20px;float:left;">
			<div>
				<p class="w3-xxxlarge w3-center">Serving Now</p>
				<p class="w3-jumbo w3-center">0000</p>
			</div>
			<div>
				<button class="w3-btn w3-green w3-round-large w3-xxlarge w3-hover-grey" id="callbtn" style="margin:5px">Call Next</button>
				<button class="w3-btn w3-lime w3-round-large w3-xxlarge w3-hover-grey" id="donebtn" style="margin:5px">Done</button>
			</div>
			<div>
				<button class="w3-btn w3-green w3-round-large w3-xlarge w3-hover-grey" id="recallbtn" style="margin:5px">Recall</button>
				<button class="w3-btn w3-red w3-round-large w3-xlarge w3-hover-grey" id="skipbtn" style="margin:5px">Skip</button>
			</div>
		</div>
	</div>
@endsection