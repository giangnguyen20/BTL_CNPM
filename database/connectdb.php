<?php
    require_once ('config.php');

    // control
    function execute($sql){
        //open connection to database
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

        //insert, delete, update
        mysqli_query($con, $sql);

        //close connection
        mysqli_close($con);
    }

    // get data
    function executeResult($sql){
        //open connection to database
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        
        //insert
        $result = mysqli_query($con, $sql);

        $data = []; 

        while( $row = mysqli_fetch_array($result, 1)){
            $data[] = $row;
        }

        //close connection
        mysqli_close($con);

        return $data;
    }
?>