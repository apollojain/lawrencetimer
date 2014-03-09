
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

          
  <div id="Main" class="container"  style="font-family: 'Roboto', sans-serif;font-size: 40px; padding: 40px; color: black; background-color: white;" onSubmit="window.location.reload();">
	
		
			<h1>Instructions</h1>
			<h4><ol>
			  <li>Enter your First Name and Last Name into the form</li>
			  <li>Toggle the timer by clicking "timer"</li>
			  <li>Submit your information by clicking "Submit."</li>
			  <li>See your workplace's progress by clicking the "Instruction" tab.</li>
			  <li>*For Admins* Modify the form fields by copying and pasting items with the type "radio"</li>
			  <li>*For Admins* You can delete radio buttons by deleting items of the type "radio"</li>
			</ol></h4>
		
    </div> <!-- /container -->
	

	<script src="timer.js"></script>
	</body>
</html>
