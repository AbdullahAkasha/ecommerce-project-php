<?php

$conn = mysqli_connect('localhost', 'root', '', 'ecommercephp');
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}


?>