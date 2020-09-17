<?php
    
    function connect(){
       
        try{
            $this-> conn = new PDO("pgsql:host= localhost;dbname=IVMS", "postgres", "savpostgresql");
            
        }catch(PDOException $e){
            echo 'connection error:' .$e-> getMessage();

        }
    }
?>