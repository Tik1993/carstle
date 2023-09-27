<?php
require 'config.php';

//return a PDO
function db_connect(){
    try{
        //try to open database connection using constants set in config.php
        $connectionString='mysql:host='.DBHOST.';dbname='.DBNAME;
        $user=DBUSER;
        $pass=DBPASS;

        $pdo = new PDO($connectionString,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
    catch(PDOException $e){
        die($e->getMessage());
    }
}

//Get all cars from database and store in $cars
function get_cars(){
    global $pdo;
    global $cars;
    global $filter;

    $filter=isset($_GET['filter']) ? $_GET['filter']:"";

    if(empty($filter)){
        $sql="SELECT * FROM cars";
      } else{
        $sql="SELECT * FROM cars WHERE manufacturer = '$filter'";
      }
    
    $result=$pdo->query($sql);
    while($row=$result->fetch()){
        $cars[]=$row;
    }
}

//Get all cars from database and store in $cars
function get_manufacturers(){
    global $pdo;
    global $manufacturers;

    $sql="SELECT DISTINCT manufacturer FROM cars";
    $result=$pdo->query($sql);
    while($row=$result->fetch()){
        $manufacturers[]=$row;
    }
}

//Get latest three cars from database and store in $cars
function get_latestCars(){
    global $pdo;
    global $cars;

    $sql="SELECT * FROM `cars` ORDER BY updateDay DESC LIMIT 3";
    $result=$pdo->query($sql);
    while($row=$result->fetch()){
        $cars[]=$row;
    }
}

// Global array of validation messages. For valid fields, message is ""
$val_messages = Array();

// Handle form submission
function handle_form_submission() {
    global $valid;
    global $pdo;
    global $val_messages;

    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $email='#^(.+)@([^\.].*)\.([a-z]{2,})$#';
      $valid=true;
      
      if (isset($_POST["fname"])){
        if($_POST["fname"]!=NULL){
          $val_messages["fname"]="Information correct";
        }
        else{
          $val_messages["fname"]="Please enter firstname.";
          $valid=false;
        }
      }

      if (isset($_POST["lname"])){
        if($_POST["lname"]!=NULL){
          $val_messages["lname"]="Information correct";
        }
        else{
          $val_messages["lname"]="Please enter lastname.";
          $valid=false;
        }
      }

      if (isset($_POST["email"])){
        if(preg_match($email,$_POST["email"])){
          $val_messages["email"]="Information correct";
        }
        else{
          $val_messages["email"]="Please enter a valid email address";
          $valid=false;
        }
      }

      if (isset($_POST["message"])){
          if($_POST["message"]!=NULL){
            $val_messages["message"]="Information correct";
          }
          else{
            $val_messages["meaasge"]="Please say something";
            $valid=false;
          }
        }

      if (empty($_POST["message"])){
          $val_messages["message"]="Please share your thoughts with us!";
          $valid = false;
        }

      if($valid)
      {
        if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['message'])){
    
          $sql = 'INSERT INTO customer_info (firstname, lastname, email, date, message) VALUES(:fname, :lname, :email, :date, :messageText)';
    
          $statement = $pdo -> prepare($sql);
    
          $statement->bindValue(':fname',$_POST['fname']);
          $statement->bindValue(':lname',$_POST['lname']);
          $statement->bindValue(':email',$_POST['email']);
          $statement->bindValue(':date',date('Y-m-d'));
          $statement->bindValue(':messageText',$_POST['message']);
    
          $statement->execute();
        }
      }
  }
}
?>

<?php


// Display error message if a field is not valid. Displays nothing if the field is valid.
function the_validation_message($type) {
    global $valid;
    global $val_messages;
  
    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
      if ($valid){
        echo '<p class="success-message">'.$val_messages[$type].'</p>';
      }else{
        echo '<p class="failure-message">'.$val_messages[$type].'</p>';
      }
      
    }
  }
?>