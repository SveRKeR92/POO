<?php

namespace App;
use Core\Database;

class Chat extends Database{

    function sendMessage ($data){
        $this->prepare('INSERT INTO chat(pseudo, message) VALUES(:pseudo, :message)', $data);
    }
}