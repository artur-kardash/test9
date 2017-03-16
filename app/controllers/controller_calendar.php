<?php
class Controller_Calendar extends Controller
{


  // function __construct()
  // {
   
  //   $this->view = new View();
  // }

  function action_index()
  {
    $code = $_GET['code'];
    $url = 'https://accounts.google.com/o/oauth2/token';
    var_dump($_GET);
    var_dump($url);
    exit('7');
    
  }
 


}