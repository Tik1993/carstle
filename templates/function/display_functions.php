<?php

function display_manufacturers(){
  global $manufacturers;
  echo '<div class="brand">
          <h2>Choose a brand</h2>
            <ul class="brand__list"> 
            <li class="brand__item"> <a rel="noopener" href="blog.php"> All</a></li>';
  
          foreach ($manufacturers as $row){
            echo '<li class="brand__item"> <a rel="noopener" href="blog.php?filter='.$row['manufacturer'].'">'.$row['manufacturer'].'</a></li>';
          }
  
  echo '</ul> </div>';
}

function display_cars(){
    global $cars;
    
    echo '<section class="block"> <div class="grid grid--1x3">';
    foreach($cars as $row){
        echo 
        '<div class="card">
          <header class="card__header">'.$row['name'].'</header>
          <div class="card__body">
            <picture class="card__image">
              <img
                src="img/'.$row['name'].'/front.jpeg"
                alt="car front"
              />
            </picture>
            <p class="card__para">'.$row['description'].'</p>
            <a href="blog/'.$row['name'].'.php" class="link-arrow">Read more</a>
          </div>
        </div>';    
    }
    
    echo '</div></section>';
}
?>