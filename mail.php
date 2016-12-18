<?php
  header('Content-type: text/html; charset=uft-8');
  if ( $_POST['email']){
    echo $_POST['email'] . ",Hello";
  }
  else {
    echo "nothing";
  }

 ?>
