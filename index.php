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

class author {
	public $author_name;
	public $author_surname;
	public $index;

	public function __construct($a, $b, $c) {
		$this->index = $a;
		$this->name = $b;
		$this->surname = $c;
	}

	function createNewAuthor(){
		global $servername, $username, $password, $dbname; 
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->query("INSERT INTO author (author_ID, name, surname) VALUES ('$this->index', '$this->name', '$this->surname')");
	}
}



class publisher {
	public $pub_index;
	public $publisher_name;
	public $publisher_street;
	public $zip_code;
	public $city;
	public $publisher_size;

	public function __construct($a, $b, $c, $d, $e, $f) {
		$this->pub_index = $a;
		$this->publisher_name = $b;
		$this->publisher_street = $c;
		$this->zip_code = $d;
		$this->city = $e;
		$this->publisher_size = $f;
	}

	function createNewPublisher(){
		global $servername, $username, $password, $dbname; 
		global $zip_exists;
		$conn = new mysqli($servername, $username, $password, $dbname);
		if (!$zip_exists) { $conn->query("INSERT INTO zip (ZIP_code, city) VALUES ('$this->zip_code', '$this->city')"); }
		$conn->query("INSERT INTO publisher (publisher_ID, name, str_address, ZIP_code, size_ID) VALUES ('$this->pub_index', '$this->publisher_name', '$this->publisher_street', '$this->zip_code', '$this->publisher_size')"); 
	}
}



class media {
	public $media_title;
	public $aut_listing;
	public $pub_listing;
	public $media_description;
	public $media_ISBN;
	public $media_image;
	public $media_publish_date;
	public $media_type;
	public $media_available;

	public function __construct($a, $b, $c, $d, $e, $f, $g, $h, $j) {
		$this->media_title = $a;
		$this->aut_listing = $b;
		$this->pub_listing = $c;
		$this->media_description = $d;
		$this->media_ISBN = $e;
		$this->media_image = $f;
		$this->media_publish_date = $g;
		$this->media_type = $h;
		$this->media_available = $j;
	}

	function createNewMedia(){
		global $servername, $username, $password, $dbname; 
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->query("INSERT INTO media (title, image, ISBN, short_description, publish_date, publisher_ID, author_ID, type_ID, available) VALUES ('$this->media_title', '$this->media_image', '$this->media_ISBN', '$this->media_description', '$this->media_publish_date', '$this->pub_listing', '$this->aut_listing', '$this->media_type', '$this->media_available')"); 
	}
} 



	function listAuthors(){
	  
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "library";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$auresult = $conn->query("SELECT author_ID, name, surname FROM author ORDER BY name");
		$autable = $auresult->fetch_all();

		?>

		<label class="my-1 mr-2" for="aut_listing">Please choose author!</label>
		<select class="custom-select my-1 mr-sm-2" name="aut_listing" id="aut_listing">
		<option selected>Choose author!</option>
		
		<?php

		foreach ($autable as $value) {
    		?> <option value='<?php echo ("$value[0]"); ?>'><?php echo("$value[1] $value[2]"); ?></option> <?php
		}
		mysqli_close($conn);
		?>
	  	</select>
	  	<?php
	}

	function listPublishers(){
	  
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "library";

		$conn = new mysqli($servername, $username, $password, $dbname);

		$pubresult = $conn->query("SELECT name, str_address, ZIP_code, size_ID, publisher_ID FROM publisher ORDER BY name");
		$pubtable = $pubresult->fetch_all();

		$zipresult = $conn->query("SELECT ZIP_code, city FROM zip ORDER BY ZIP_code");
		$ziptable = $zipresult->fetch_all();

		?>

		<label class="my-1 mr-2" for="pub_listing">Please choose publisher!</label>
		<select class="custom-select my-1 mr-sm-2" name="pub_listing" id="pub_listing">
		<option selected>Choose publisher!</option>
		
		<?php

		foreach ($pubtable as $value) {
			foreach ($ziptable as $zipsearch) {
				if ($zipsearch[0] == $value[2]) {break;}
						}
				if ($value[3]=='1') {$pubsize='company size: small';}
				elseif ($value[3]=='2') {$pubsize='company size: medium';}
				else {$pubsize='company size: big';}
				echo $value[3];

    			?> <option value='<?php echo ("$value[4]"); ?>'><?php echo("$value[0] - address: $value[1] $value[2] $zipsearch[1] - $pubsize"); ?></option> <?php
				}
		mysqli_close($conn);
		?>
	  	</select>
	  	<?php
	}



if(isset($_POST['author_name'])){
			$author_name1 = $_POST['author_name'];
		} else {
			$author_name1 = '';
		}

if(isset($_POST['author_surname'])){
			$author_surname1 = $_POST['author_surname'];
		} else {
			$author_surname1 = '';
		}

if(isset($_POST['publisher_name'])){
			$publisher_name1 = $_POST['publisher_name'];
		} else {
			$publisher_name1 = '';
		}

if(isset($_POST['publisher_street'])){
			$publisher_street1 = $_POST['publisher_street'];
		} else {
			$publisher_street1 = '';
		}


if(isset($_POST['zip_code'])){
			$zip_code1 = $_POST['zip_code'];
		} else {
			$zip_code1 = '';
		}


if(isset($_POST['city'])){
			$city1 = $_POST['city'];
		} else {
			$city1 = '';
		}


if(isset($_POST['publisher_name'])){
			$publisher_name1 = $_POST['publisher_name'];
		} else {
			$publisher_name1 = '';
		}


if(isset($_POST['media_title'])){
			$media_title1 = $_POST['media_title'];
		} else {
			$media_title1 = '';
		}

if(isset($_POST['media_description'])){
			$media_description1 = $_POST['media_description'];
		} else {
			$media_description1 = '';
		}

if(isset($_POST['media_ISBN'])){
			$media_ISBN1 = $_POST['media_ISBN'];
		} else {
			$media_ISBN1 = '';
		}

if(isset($_POST['media_image'])){
			$media_image1 = $_POST['media_image'];
		} else {
			$media_image1 = '';
		}

if(isset($_POST['media_publish_date'])){
			$media_publish_date1 = $_POST['media_publish_date'];
		} else {
			$media_publish_date1 = '';
		}


//mysqli_close($conn);
include 'navbar.php';

?>



<div class="container">

<div class="mytransbk">
	
<h1 class="text-center text-white">Add new media to library</h1>
<h3 class="text-center text-white">Add author, publisher and media</h3>

</div>



<div class="mytransbk">
	
<p class="btn btn-outline-light btn-block" data-toggle="collapse" href="#author" role="button" aria-expanded="false" aria-controls="author">click to add author<br>↕</p>

	<form id="author" class="text-white collapse" action="add_media.php" method="POST">
	  <h3 class="text-center">please enter author details</h3>
	  <div class="form-group">
	    <label for="author_name">Name</label>
	    <input type="text" name="author_name" class="form-control" id="author_name" placeholder="" value="<?php echo $author_name1; ?>">
	    
	  </div>

	  <div class="form-group">
	    <label for="author_surname">Surname</label>
	    <input type="text" name="author_surname" class="form-control" id="author_surname" placeholder="" value="<?php echo $author_surname1; ?>">
	    <small id="emailHelp" class="form-text">Please leave empty if non-existent</small>
	  </div>

	  <button type="submit" name="submit_author" class="btn btn-primary btn-block mt-2">Submit</button>
	</form>

</div>





<div class="mytransbk">
	
<p class="btn btn-outline-light btn-block" data-toggle="collapse" href="#publisher" role="button" aria-expanded="false" aria-controls="publisher">click to add publisher<br>↕</p>

	<form id="publisher" class="text-white collapse" action="add_media.php" method="POST">
	  <h3 class="text-center">please enter publisher details</h3>
	  <div class="form-group">
	    <label for="publisher_name">Publisher name</label>
	    <input type="text" name="publisher_name" class="form-control" id="publisher_name" placeholder="" value="<?php echo $publisher_name1; ?>">
	  </div>

	  <div class="form-group">
	    <label for="publisher_street">Street address</label>
	    <input type="text" name="publisher_street" class="form-control" id="publisher_street" placeholder="" value="<?php echo $publisher_street1; ?>">
	  </div>

	   <div class="form-group">
	    <label for="zip_code">ZIP code</label>
	    <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="" value="<?php echo $zip_code1; ?>">
	  </div>

	   <div class="form-group">
	    <label for="city">City</label>
	    <input type="text" name="city" class="form-control" id="city" placeholder="" value="<?php echo $city1; ?>">
	  </div>

	  <div class="form-group">
	  	<p>Choose company size: </p>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" value="1" name="publisher_size">Small
				  </label>
				</div>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" value="2" name="publisher_size">Medium
				  </label>
				</div>
				<div class="form-check-inline disabled">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" value="3" name="publisher_size">Big
				  </label>
				</div>
	  </div>

	  <button type="submit" name="submit_publisher" class="btn btn-primary btn-block mt-2">Submit</button>
	</form>

</div>



<div class="mytransbk">
	
<p class="btn btn-outline-light btn-block" data-toggle="collapse" href="#media_inp" role="button" aria-expanded="false" aria-controls="media_inp">click to add media<br>↕</p>

<form id="media_inp" class="text-white collapse" action="add_media.php" method="POST">
	  <h3 class="text-center">please enter media details</h3>


	 <div class="my-2">
		<?php 
			listAuthors();
			listPublishers();
		?>
	</div>

	  <div class="form-group">
	  	<p>Choose media type: </p>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" name="media_type" value="1">book
				  </label>
				</div>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" name="media_type" value="2" checked>CD
				  </label>
				</div>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" name="media_type" value="3">DVD
				  </label>
				</div>
	  </div>


	  <div class="form-group">
	    <label for="media_title">Title</label>
	    <input type="text" name="media_title" class="form-control" id="media_title" placeholder="" value="<?php echo $media_title1; ?>">
	  </div>

		<div class="form-group">
		  <label for="media_description">Short description</label>
		  <textarea class="form-control" rows="4" id="media_description" name="media_description" value="<?php echo $media_description1; ?>"></textarea>
		</div>

	   <div class="form-group">
	    <label for="media_ISBN">ISBN number</label>
	    <input type="text" name="media_ISBN" class="form-control" id="media_ISBN" maxlength="13" value="<?php echo $media_ISBN1; ?>">
	  </div>

	   <div class="form-group">
	    <label for="media_image">Cover image link</label>
	    <input type="text" name="media_image" class="form-control" id="media_image" value="<?php echo $media_image1; ?>">
	  </div>

	   <div class="form-group">
	    <label for="media_publish_date">Date of publication</label>
	    <input type="date" name="media_publish_date" class="form-control" id="media_publish_date" value="<?php echo $media_publish_date1; ?>">
	  </div>


	  <div class="form-group">
	  	<p>Availability: </p>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" value="1" name="media_available" checked>available
				  </label>
				</div>
				<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" value="0" name="media_available">reserved
				  </label>
				</div>
	  </div>


	  <button type="submit" name="submit_media" class="btn btn-primary btn-block mt-2">Submit</button>
	</form>

</div>





<?php

if(isset($_POST['submit_author']))
	{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} else {

		if(!isset($_POST['author_name']) || ($_POST['author_name']=='')) {
			echo("<script>swal('Author name is not entered!', 'You need to enter author name', 'error');</script>");
		} else {
	  
		$result = $conn->query("SELECT * FROM author ORDER BY name");

		$table = $result->fetch_all();
		$index = count($table);
		++$index;

		$author_name = $_POST['author_name'];
		$author_surname = $_POST['author_surname'];
		
		$result2 = $conn->query("SELECT name, surname FROM author WHERE name = '$author_name' AND surname = '$author_surname'");

		$table = $result2->fetch_all();
		$index2 = count($table);
		if ($index2 > 0) {;

		echo("<script>swal('Author already exists!', 'You need to enter new data!', 'error');</script>");

		} else {

	 	$newauthor = new author($index, $author_name, $author_surname);
	 	$newauthor->createNewAuthor();

	 	echo("<script>swal('Good job!', 'Author added successully!', 'success').then((value) => {var a = window.location.href; window.location.href=a;});</script>");
	 	}
	  mysqli_close($conn);
	}

   }
}


if(isset($_POST['submit_publisher']))
	{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$zipexists=false;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} else {
		if(!isset($_POST['publisher_name']) || ($_POST['publisher_name']=='')) {
			echo("<script>swal('Publisher name is not entered!', 'You need to enter publisher name', 'error');</script>");
		} elseif (!isset($_POST['publisher_street']) || ($_POST['publisher_street']=='')) {
			echo("<script>swal('Publisher street address is not entered!', 'You need to enter publisher street address', 'error');</script>");
		} elseif (!isset($_POST['zip_code']) || ($_POST['zip_code']=='')) {
			echo("<script>swal('ZIP code is not entered!', 'You need to enter ZIP code', 'error');</script>");
		} elseif (!isset($_POST['city']) || ($_POST['city']=='')) {
			echo("<script>swal('City is not entered!', 'You need to enter city', 'error');</script>");
		} elseif (!isset($_POST['publisher_size']) || ($_POST['publisher_size']=='')) {
			echo("<script>swal('Company size is not entered!', 'You need to enter company size', 'error');</script>");
		} else {


		$publisher_name = $_POST['publisher_name'];

		$result2 = $conn->query("SELECT name FROM publisher WHERE name = '$publisher_name'"); 
		$table2 = $result2->fetch_all();	
		if (count($table2)>0) {
			echo("<script>swal('Publisher already exists!', 'You need to enter new data.', 'error');</script>");
		} else {


		$result = $conn->query("SELECT name FROM publisher ORDER BY publisher_ID");
		$table = $result->fetch_all();
		$pub_index = count($table);

		$zip_code = $_POST['zip_code'];

		if ($result = $conn->query("SELECT ZIP_code FROM zip WHERE ZIP_code = $zip_code")) {

			$zipexists=true;
		}



		$publisher_street = $_POST['publisher_street'];
		$city = $_POST['city'];
		$publisher_size = $_POST['publisher_size'];

		++$pub_index;

	 	$newpublisher = new publisher($pub_index, $publisher_name, $publisher_street, $zip_code, $city, $publisher_size);
	 	$newpublisher->createNewPublisher();

	 	echo("<script>swal('Good job!', 'Publisher added successully!', 'success').then((value) => {var a = window.location.href; window.location.href=a;});</script>");
		}
	  }
	mysqli_close($conn);
	}
}





if(isset($_POST['submit_media']))
	{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";
$zipexists = false;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} else {

		if(!isset($_POST['aut_listing']) || ($_POST['aut_listing']=='Choose author!')) {
			echo("<script>swal('Author is not choosen!', 'You need to choose one.', 'error');</script>");
		} elseif (!isset($_POST['pub_listing']) || ($_POST['pub_listing']=='Choose publisher!')) {
			echo("<script>swal('Publisher is not choosen!', 'You need to to choose one.', 'error');</script>");
		} elseif (!isset($_POST['media_title']) || ($_POST['media_title']=='')) {
			echo("<script>swal('Title is not entered!', 'You need to enter a title', 'error');</script>");
		} elseif (!isset($_POST['media_description']) || ($_POST['media_description']=='')) {
			echo("<script>swal('Description is not entered!', 'You need to enter a description', 'error');</script>");
		} elseif (!isset($_POST['media_ISBN']) || ($_POST['media_ISBN']=='')) {
			echo("<script>swal('ISBN number is not entered!', 'You need to enter an ISBN number', 'error');</script>");
		} elseif (!isset($_POST['media_image']) || ($_POST['media_image']=='')) {
			echo("<script>swal('Image link is not entered!', 'You need to enter an image link', 'error');</script>");
		} elseif (!isset($_POST['media_publish_date']) || ($_POST['media_publish_date']=='')) {
			echo("<script>swal('Publication date is not entered!', 'You need to enter a publication date', 'error');</script>");
		} else { 


		$media_title = $_POST['media_title'];

		$result2 = $conn->query("SELECT title FROM media WHERE title = '$media_title'"); 
		$table2 = $result2->fetch_all();	
		if (count($table2)>0) {
			echo("<script>swal('Media title already exists!', 'You need to enter new data.', 'error');</script>");
		} else {


		$aut_listing = $_POST['aut_listing'];
		$pub_listing = $_POST['pub_listing'];
		$media_description = $_POST['media_description'];
		$media_ISBN = $_POST['media_ISBN'];
		$media_image = $_POST['media_image'];		
		$media_publish_date = $_POST['media_publish_date'];
		$media_type = $_POST['media_type'];
		$media_available = $_POST['media_available'];


	 	$newMedia = new media($media_title, $aut_listing, $pub_listing, $media_description, $media_ISBN, $media_image, $media_publish_date, $media_type, $media_available);
	 	$newMedia->createNewMedia();

	 	echo("<script>swal('Good job!', 'Publisher added successully!', 'success').then((value) => {var a = window.location.href; window.location.href=a;});</script>");
		}
	  }
	mysqli_close($conn);
	}
}




?>


</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>