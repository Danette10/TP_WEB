<header>
  <?php
    $links = [
    "Accueil" => "index.php",
    "Contact" => "contact.php",
    "Blog" => "blog.php"
  ];
  function wrteNavLine($name, $url){
    return '<li><a href="'. $url .'">'. $name . '</a></li>';

  }
   ?>
   <nav>
     <ul>
       <?php foreach ($links as $name => $url){
         echo wrteNavLine($name, $url);
       }
        ?>

     </ul>
   </nav>
</header>
