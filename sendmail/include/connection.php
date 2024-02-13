<?php
    
    $con=mysqli_connect('localhost','root','','ustabmail');
    if(!$con){
        die(mysqli_error($con));
    }
    /*
    try{
        $con = mysqli_connect('localhost','root','','ustabmail');
    }

    //catch - A "catch" block retrieves an exception and creates an object containing the exception information

    
    catch(mysqli_sql_exception){

        echo "could not connect"; 
    }*/
?>