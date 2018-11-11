<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


	<title>Code Review 10</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<?php

		function drawList($a){
			$arr = array(''); 
			$backswitch = true;
			$firstrun = true;
			foreach ($a as $record) {
				if (!$firstrun) {
				if ($backswitch) {$backcolor='mydarkbk'; $backswitch=false;} else {$backcolor='mylightbk'; $backswitch=true;}
				if ($arr[8] == '1') { $type = 'book';}
				if ($arr[8] == '2') { $type = 'audio CD';}
				if ($arr[8] == '3') { $type = 'video DVD';}
				echo("<div class='row my-2 text-white $backcolor'>
					<div class='col-sm-1 minipic d-flex align-items-center'><img src='$arr[2]'></div>
					<div class='col-sm-2 my-auto text-center'>$arr[1]</div>
					<div class='col-sm-2 my-auto text-center'>$arr[11] $arr[12]</div>
					<div class='col-sm-1 my-auto text-center'>$type</div>
					<div class='col-sm-2 my-auto text-center'>$arr[14]</div>
					<div class='col-sm-2 my-auto text-center'>$arr[5]</div>
					<div class='col-sm-1 my-auto text-center buttspace'><button type='button' class='btn btn-primary buttspace btn-block'>Edit</button></div>
					<div class='col-sm-1 my-auto text-center buttspace'><button type='button' class='btn btn-danger buttspace btn-block'>Delete</button></div>
	  				</div>");
				} else {

				echo("<div class='row my-2 py-2 text-white mydarkbk'>
					<div class='col-sm-1 my-auto text-center'>cover image</div>
					<div class='col-sm-2 my-auto text-center'>title</div>
					<div class='col-sm-2 my-auto text-center'>author</div>
					<div class='col-sm-1 my-auto text-center'>media type</div>
					<div class='col-sm-2 my-auto text-center'>publisher</div>
					<div class='col-sm-2 my-auto text-center'>publication date</div>
					<div class='col-sm-1 my-auto text-center'>edit</div>
					<div class='col-sm-1 my-auto text-center'>delete</button></div>
	  				</div>");


					$firstrun = false;
				}
				$i=0;
				$arr = array(''); 
				foreach ($record as $rec) {
					$arr[$i]=$rec;
					++$i;
			
				}
			}
		}

	?>

<?php include 'navbar.php'; ?>

<div class="container">

	<div class="mytransbk">
		
		<h1 class="text-center text-white">Listing media database</h1>
		<h3 class="text-center text-white pb-4">Edit / delete items</h3>

			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "library";

				$conn = new mysqli($servername, $username, $password, $dbname);


				$myquery = "SELECT 
						*
					from media m

				    INNER JOIN author a
				    on m.author_ID = a.author_ID
				    
				    INNER JOIN publisher p
				    on m.publisher_ID = p.publisher_ID
				    
				    ORDER BY m.title";

				$listdata = $conn->query($myquery);
				$list = $listdata->fetch_all();

				mysqli_close($conn);

				drawList($list);

			?>

	</div>

</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!-- <script src="myjs.js"></script> -->

</body>
</html>