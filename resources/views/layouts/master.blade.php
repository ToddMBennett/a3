<!DOCTYPE html>
<html lang="en">
  	<head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>
						@yield('title', 'A3 - Bill Splitter V2')
				</title>

		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="{{ asset('css/main.css') }}">
				<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    {{-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] --}}
	  </head>

	  <body>
				@yield('content')
	    	{{-- Contain the parameters --}}
    		<div class='container-fluid'>
      			<h1>Bill Splitter</h1>
      			<hr />

      			<div id='billSplitter'>
        		{{-- Form creation and PHP request method GET --}}
        		<form method='GET' action='/'>

			          {{-- <!-- Text input for number of paying customers --}}
			          <div class='formInput'>
				            <label for='split'>Split how many ways? </label>
				            <input type='text' name='customers' id='split' size='16' placeholder='Paying customers' required='required' value='{{ $customers or '' }}'>
          			</div>

								{{-- Displaying errors after validation check --}}
								@if($errors->get('customers'))
			    		      <ul>
			        					@foreach($errors->get('customers') as $error)
			            					<li>{{ $error }}</li>
			        					@endforeach
			    					</ul>
								@endif

			          {{-- Text input for total bill --}}
			          <div class='formInput'>
				            <label for='tab'>How much is the tab? $</label>
				            <input type='text' name='amount' id='tab' size='16' placeholder='Enter total bill' required='required' value='{{ $amount or '' }}'>
			          </div>

								{{-- Displaying errors after validation check --}}
								@if($errors->get('amount'))
			    					<ul>
			        					@foreach($errors->get('amount') as $error)
			            					<li>{{ $error }}</li>
			        					@endforeach
			    					</ul>
								@endif

			          {{-- Dropdown asking user for level of service --}}
			          <div class='formInput'>
			          <label for='service'>How was the service? </label>
			        			<select name='service' id='service'>
			              		<option value='tipping'>Tipping...</option>
			              		<option value=.25 @if ($service == .25) echo 'SELECTED' @endif>Great: 25%</option>
					              <option value=.20 @if ($service == .20) echo 'SELECTED' @endif>Good: 20%</option>
					              <option value=.15 @if ($service == .15) echo 'SELECTED' @endif>OK: 15%</option>
					              <option value=.10 @if ($service == .10) echo 'SELECTED' @endif>Not good: 10%</option>
					              <option value=.05 @if ($service == .05) echo 'SELECTED' @endif>Horrible: 5%</option>
					          </select><br />
			          </div>

			          {{-- Alert box if user doesn't select service --}}
			          @if ($_GET)
			          		<div class='alert {{ $alertType }}'>
			              		{{ $results }}
			            	</div>
			          @endif

			          {{-- Radio button for rounding up --}}
			          <div class='formInput'>
			            	<label>Would you like to round up? </label>
			            	<input type='checkbox' name='roundUp' value='yes' @if( $roundUp == 'yes' ) {{ 'CHECKED' }} @endif> Yes
			          </div>

			          <hr />
								
			          {{-- Calculate button --}}
			          <label for='sbmt'></label>
			            	<input type='submit' class='btn btn-primary btn-lg' value='Calculate' id='sbmt' onclick=><br>

			          {{-- Alert button - showing amount of what each customer owes --}}
			          <div class='btn'>
			            	<button id="calc" type='button' style='display:none;' class='alert alert-success'>{{ $calculate }}</button>
								</div>

        		</form>
      			</div>
    		</div>
  	</body>
</html>
