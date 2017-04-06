<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'a3')
    </title>

	<meta charset='utf-8'>
    <link href="/css/a3.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	<header>
		<img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>
	</header>

	<section>
		@yield('content')
	</section>

	<footer>
		&copy; {{ date('Y') }}
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>
<?php require('calcLogic.php'); ?>
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
    <script type="text/javascript" src="main.js"></script>
    <link rel="stylesheet" href="main.css"/>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Contain the parameters  -->
    <div class='container-fluid'>
      <h1>Bill Splitter</h1>
      <hr />
        <!-- <h3>Would you like to split or randomize someone to foot the bill?</h3>
        <input type="radio" id="split" name="splitOrFoot" /> Split the bill<br>
        <input type="radio" id="foot" name="splitOrFoot" /> Randomize a 'Footer'
      </form> -->

      <div id='billSplitter'>
        <!-- Form creation and PHP request method GET -->
        <form method='GET' action='/'>

          <!-- Text input for number of paying customers -->
          <div class='formInput'>
            <label for='split'>Split how many ways? </label>
            <input type='text' name='num' id='split' size='16' placeholder='Paying customers' required="required" value='<?php if($num) echo sanitize($_GET['num'])?>'>
          </div>

          <!-- Text input for total bill -->
          <div class='formInput'>
            <label for='tab'>How much is the tab? $</label>
            <input type='text' name='amount' id='tab' size='21' placeholder='Round to nearest dollar' required="required" value='<?php if($amount) echo sanitize($_GET['amount'])?>'>
          </div>

          <!-- Dropdown asking user for level of service -->
          <div class='formInput'>
          <label for='service'>How was the service? </label>
        		<select name='service' id='service'>
              <option value='tipping'>Tipping...</option>
              <option value=.25 <?php if($service === .25) echo 'SELECTED' ?>>Great - 25%</option>
              <option value=.20 <?php if($service === .20) echo 'SELECTED' ?>>Good - 20%</option>
              <option value=.15 <?php if($service === .15) echo 'SELECTED' ?>>OK - 15%</option>
              <option value=.10 <?php if($service === .10) echo 'SELECTED' ?>>Not good - 10%</option>
              <option value=.05 <?php if($service === .05) echo 'SELECTED' ?>>Horrible - 5%</option>
            </select><br />
          </div>

          <!-- Alert box if user doesn't select service -->
          <?php if($_GET): ?>
            <div class='alert <?=$alertType?>'>
              <?=$results?>
            </div>
          <?php endif; ?>

          <!-- Radio button for rounding up or not -->
          <div class='formInput'>
            <label>Would you like to round up? </label>
            <input type='checkbox' name='roundUp' value='yes' <?php if($roundUp == 'yes') echo 'CHECKED'?>> Yes
          </div>

          <!-- checking for errors in text fields -->
          <?php if(isset($errors)): ?>
            <div class='alertErr'>
              <ul>
                <?php foreach($errors as $error): ?>
                  <li><?=$error?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <hr />
          <!-- Calculate button -->
          <label for='sbmt'></label>
            <input type='submit' class='btn btn-primary btn-lg' value='Calculate' id='sbmt'><br>

          <!-- Alert button - showing amount of what each customer owes -->
          <label for="btn"></label>
            <button id="btn" type='button' class='alert alert-success'><?=$calculate?></button>

        </form>
      </div>
    </div>
  </body>
</html>
