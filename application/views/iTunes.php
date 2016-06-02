<html>
<head>
	<title>iTunes Video Search</title>
	<style type="text/css">
	body{
		background-color: #FF4500;
		font-size: 30px;
	}
	h1{
		color: #FFFFFF;
	}
	
	form input{
		border: 2px solid black;
		font-size: 35px;

	}



	</style>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('form').submit(function() {
		        // load up any gif you want, this will be shown while user is waiting for response
		        $('#results').html("<img src='assets/img/loading.gif'>");
		        $.post($(this).attr('action'), $(this).serialize(), function(res) {
		            var html_string = "";
		            if(res.results.length !== 0) {
		                $('#results').html('<video controls src=" '+ res.results[0].previewUrl + '"><\/video>');
		            } else {
		                $('#results').html('Not Found');
		            }
		        }, 'json');
		        // don't forget, without it the page will refresh
		        return false;
		    });
		});
	</script>

</head>
<body>
	<form action="/main/get_movie" method="post">
	    <label for="user_input"><h1>Enter Artist's Name</h1></label>
	    <input id="user_input" name="user_input" type="search">
	    <input type="submit" value="search">
	</form>
	<div id="results"></div>
</body>
</html>