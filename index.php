<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);

//global array of cars, to be feteched from database
$cars=[];

require_once('database/database.php');
require_once('templates/function/display_functions.php');

//connect to database, using declared function in database.php
$pdo = db_connect();

//Get cars from database, using declared function in database.php
get_latestCars();

//include the header to the page
require_once('templates/header.php');
// $path = getcwd();
// echo "This Is Your Absolute Path: ";
// echo $path;
?>
    <section class="block">
      <div class="grid grid--1x2">
        <header class="block__content">
          <h1 class="block__heading header--enlarge">Welcome To the Carstle</h1>
          <p class="block__tagline">Enjoy your journey</p>
        </header>

      </div>
    </section>
    <?php display_cars();?>
    <section class="block">
      <div class="grid grid--1x2">
        <img src="#" alt="dump" />
        <header class="block__content">
          <h1 class="block__heading">Contact us to share your stories</h1>
          <a href="contact.php" class="btn">share</a>
        </header>
      </div>
    </section>

<?php
  //include the footer to the page 
  require_once('templates/footer.php') 
?>
