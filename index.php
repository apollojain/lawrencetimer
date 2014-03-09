
<!DOCTYPE html>
<html>
<head>
	
    <meta charset="utf-8">
    <title>Lawrence Lab of Science Timer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	<script>
	$(document).ready(function(){
		$("#myForm").show();
		$("#results").hide();
	  $("#data").click(function(){
		$("#myForm").hide();
		$("#results").show();
		$("body").css("background-image","url('jalkdsdsa.jpg')");
		$(this).css("background-color","white");
	  });
	  $("#home").click(function(){
		$("#myForm").show();
		$("#results").hide();
		$("body").css("background-image","url('http://media.circlepix.com/media/tours/2013/feb/27/88E6PH/88E6PH_still_s18.jpg')");
		$("body").css("background-size","100% 800px");
	  });
	});
	</script>
	<script>
		function parseInfo(){
			var fn = document.getElementById("firstname").value;
			var ln = document.getElementById("lastname").value;
			fn = fn.split(" ")[0];
			ln = ln.split(" ")[0];
			var full = fn + " " + ln;
			document.getElementById("my_name").value=full;
			var x = document.getElementById("time").value;
			var res = x.split(" ");
			if(res.length == 6 && isNaN(res[1]) && isNaN(res[3]) && isNaN(res[5]) && fn != "" && fn !="First" && ln != "" && ln !="Last"){
				var radios = document.getElementsByName('activity');

				for (var i = 0, length = radios.length; i < length; i++) {
					if (radios[i].checked) {
						// do whatever you want with the checked radio
						document.getElementById("my_activity").value = radios[i].value;
						// only one radio can be logically checked, don't check the rest
						break;
					}
				}
				
						document.getElementById("my_time").value=60*parseInt(res[0]) + parseInt(res[2]);
				alert("1 record added");
				$("#myForm").submit();      
			}else{
				alert("You seem to have an error somewhere in your form. Please enter a legitimate name, date, or time in the given format.");
				return false;
			}
		}
	</script>

	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
  
  <body>
	 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Time Tracker</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="home">Home</a></li>
            <li><a href="#" id="data">Data</a></li>
            <li><a href="#" onclick="window.open('instructions.php');">Instruction</a></li>
          </ul>
        </div>
      </div>
    </div>

          
  <div id="myForm" class="container"  style="color: white;" onSubmit="window.location.reload();">
	
		<center>
			<form style="font-family: 'Roboto', sans-serif; " action="insert.php" method="post" >
			  <fieldset>
				<legend style="font-size: 40px; padding: 40px; color: white;">Lawrence Hall of Science Time Tracker</legend>
				<h4 style="color:black">
					<input type="hidden" name="my_time" id="my_time" value="">
					<input type="hidden" name="my_name" id="my_name" value="">
					<input type="hidden" name="my_activity" id="my_activity" value="">
					<input type="text" class="formstuff" id="time" name="time" value="0 hrs 0 mins 0 secs" onclick="this.select();"><br>
					<input type="text" class="formstuff" id="firstname" name="firstname" value="First Name" onclick="this.select();"><br>
					<input type="text" class="formstuff" id="lastname" name="lastname" value="Last Name" onclick="this.select();"><br>
					<input type="hidden" name="Language">
					<p id="activity">
					<input type="radio" id="activity" name="activity" value="Dinosaurs">Dinosaurs
					
					<input type="radio" id="activity" name="activity" value="Cat">Schrodinger's Cat</input><br><br>
					<input type="radio" id="activity" name="activity" value="Basedgod" checked>Lil B the Basedgod</input>
					<input type="radio"  name="activity" value="Doge">Doge</input>
					<input type="radio"  name="activity" value="Car">Supercars</input>
					</p>
					<br>
					<br><button type="button" onclick="toggleTimer();" class="btn">Timer</button>
					<button value="Submit" id = "enter" onclick = "parseInfo()" class="btn">Submit</button>
				</h4>

				
			  </fieldset>
			</form>
		</center>
    </div> <!-- /container -->
	
	<div id="results">
		<center>
			<?php
			$con=mysqli_connect("host name","username","password","database name");
			// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"SELECT * FROM my_time WHERE Time != 0");

			echo "<table border='1' padding='2' margin='2'>
			<tr>
			<th>Name</th>
			<th>Activity</th>
			<th>Time (minutes)</th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			  {
			  echo "<tr>";
			  echo "<td>" . $row['Name'] . "</td>";
			  echo "<td>" . $row['Activity'] . "</td>";
			  echo "<td>" . $row['Time'] . "</td>";
			  echo "</tr>";
			  }
			echo "</table>";

			mysqli_close($con);
			?>
		</center>
	</div>
	<script src="timer.js"></script>
	</body>
</html>
