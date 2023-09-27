<?php 
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  require_once 'database/database.php';
  // require_once('database/validation.php');

  //connect to database, using declared function in database.php
  $pdo = db_connect();

  // Global result of form validation
  $valid = false;

  // submit comment to database, using declared function in database.php
  handle_form_submission();

  //include the header to the page
  require_once('templates/header.php');
?>
    <h1>Contact Us</h1>
    <section class="block">
      <div class="grid grid--1x2">
        <header class="block__content">
            <h1 class="block__heading">Welcome To My Carstle</h1>
            <p class="block__tagline">Enjoy your journey</p>
        </header>
        <div>
          <h2 class="block__heading">Contact Details</h2>
          <form action="contact.php" method="post" class="form">
            <div>
              <label for="fname" class="label1"> First Name:</label>
              <input type="text" name="fname" id="fname" required >
              <!-- Display validation message for first name -->
              <?php the_validation_message('fname'); ?>
            </div>
            <div>
              <label for="lname" class="label1"> Last Name:</label>
              <input type="text" name="lname" id="lname" required>
              <!-- Display validation message for last name -->
              <?php the_validation_message('lname'); ?>
            </div>
            <div>
              <label for="email" class="label1">Email:</label>
              <input type="email" name="email" id="email" required>
              <!-- Display validation message for email -->
              <?php the_validation_message('email'); ?>
              
            </div>
            <div>
              <label for="message" class="label2">Your Message:</label>
              <br>
              <textarea name="message" id="message" rows="5" cols="40" placeholder="I would like to..." required></textarea>
              <!-- Display validation message for message -->
              <?php the_validation_message('message'); ?>
            </div>
            <button type="submit" name="button" class="btn">Send Message</button>
          </form>
        </div>
      </div>

    </section>

<?php
  //include the footer to the page 
  require_once('templates/footer.php') 
?>
