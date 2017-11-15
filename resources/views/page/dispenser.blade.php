@extends('layout.app')

@section('content')

	<!-- Ticket Dispenser -->
	<div class="w3-container" id="ticket-dispenser">
		<div class="w3-card-4 w3-center" style="padding:20px">
			<h2>Welcome!</h2>
			<h3>Please choose a teacher and take a ticket:</h3>
			@if ($teachers != null)
				@if($teachers->count() > 0)
					<div>
						<button id="dispensersvcbtn" class="w3-button w3-white w3-border w3-border-blue w3-round-large w3-xxlarge" style="margin:10px; width:60%">Teacher 1</button>
					</div>
				@else
					Not found any teacher
				@endif
			@else
				Not found any teacher
			@endif
			
            <!-- Ask for help button -->
			<div><button class="w3-button w3-white w3-border w3-border-red w3-round-large w3-xlarge" style="margin:10px; width:60%">Ask for help</button></div>
		</div>
	</div>
    
    <!-- Confirm paper ticket after you click the teacher you selected -->
<div id="confirm-papertix" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container">
        <h2>Issue paper ticket</h2>
      </header>
      <div class="w3-container">
	<h3>Confirm take ticket?</h3>
      </div>
      <footer class="w3-container">
	 <button class="w3-btn w3-black w3-xlarge" id="yesbtn" style="float: right; margin-right: 10px">Yes</button>
	 <button class="w3-btn w3-black w3-xlarge" id="nobtn" style="float: right; margin-right: 10px">No</button>
      </footer>
    </div>
</div>
@endsection