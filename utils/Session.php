<?php 

Class Session{
    public string $pass;
    public function __construct() : void
    {
        session_start();
    }

}


?>