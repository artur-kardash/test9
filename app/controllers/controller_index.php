<?php
class Controller_Index extends Controller {

    public function __construct() {
        $this->view = new View();
    }

    public function action_index()
    {
       
       header('Location: /login');   

    }


}