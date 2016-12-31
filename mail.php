<?php
    header('Content-type: text/html; charset=uft-8');
    $err_msg="";
    mb_internal_encoding("UTF-8");

    //email from
    $from = trim($_POST['fromemail']);

    if ( !empty($from) ) {
      if ( preg_match("/\r|\n/",$from)) {

        if ( preg_match("[a-zA-Z0-9\._\+]+@([a-zA-Z0-9\.-]\.)*[a-zA-Z0-9\.-]+", $from)){
          $from = htmlspecialchars($from);
        }
        else {
          $err_msg.="Hey! Enter the email address!! <br>";
        }
      }
      else {
        $err_msg.="Hey! No Shift!! <br>";
      }
    }
    else {
      $err_msg.="You forgot to enter from email. <br>";
    }

    // To email
    $to = $_POST['toemail'];
    if ( !empty($to) ) {
      if ( preg_match("/\r|\n/",$to)) {

        if ( preg_match("[a-zA-Z0-9\._\+]+@([a-zA-Z0-9\.-]\.)*[a-zA-Z0-9\.-]+", $to)){
          $to = htmlspecialchars($to);
        }
        else {
          $err_msg.="Hey! Enter the Toemail address!! <br>";
        }
      }
      else {
        $err_msg.="Hey! No Shift!! <br>";
      }
    }
    else {
      $err_msg.="You forgot to enter from Toemail. <br>";
    }

    // subject
    $subject = $_POST['subject'];
    if ( preg_match("/\r|\n/",$subject))
      $subject = htmlspecialchars($subject);
    else
      $err_msg.="Hey! Subject no shift!! <br>";


    //emailbody
    $emailbody = htmlspecialchars($_POST['emailbody']);

    if (!$err_msg == ""){
      $header ='Content-type: text/plain; charset=UTF-8';
      $header .= "\nFrom: $from";
      $subject = mb_encode_mimeheader($subject, 'UTF-8');
      if (mail($to, $subject, $emailbody, $header )) {
        echo  "Your email has sended!";
      }
      else {
        echo "oh....There are something wrong...";
      }
    }
    else {
      echo $err_msg ."<br>". '<a href="' . $_SERVER['HTTP_REFERER'] . '">Go back</a>';
    }
 ?>
