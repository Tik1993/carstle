<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once('database/database.php');
require_once('templates/function/display_functions.php');

//connect to database, using declared function in database.php
$pdo = db_connect();

//global array of cars, to be feteched from database
$cars=[];
//global array of manufactures, to be feteched from database
$manufacturers=[];

//Get cars & manufacturers from database, using declared function in database.php
get_cars();
get_manufacturers();

//include the header to the page
require_once('templates/header.php');
?>  

<h1>Blog</h1>
<div class="grid grid--blog">

<?php 
display_manufacturers();
display_cars();?>
</div>


    
<?php
  //include the footer to the page 
  require_once('templates/footer.php') 
?>
