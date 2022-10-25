<html>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100;500&family=Roboto+Mono:ital,wght@1,300&family=Rubik+Bubbles&display=swap" rel="stylesheet">

<style>
    html, body{
        height: 100%;
        margin: 0;
        font-family: 'Roboto Mono', monospace;
        background: #313033;
    }

    .navbar {
        overflow: hidden;
        background-color: #2b2a36;
        display: block;
    }

    .navbar a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        margin-left: 50px;
    }

    .navbar a:hover {
        background-color: darkgray;
        color: black;
        border-radius: 30px;
        
    }

    .output_box {
        border: 1px;
        border-radius: 30px;
        display: inline-block;
        max-width:250px;
        max-height: 440px;
        background-color: #ADADAD;
        padding: 10px;
        margin-bottom: 2%;
        margin-left: 5%;
    }
    .output_container {
        display: block;
        width: 75%;
        margin: auto;
        margin-top: 3%;
    }


    </style>
<body>


<div class="navbar">
    <p style="font-size: 55px; font-family: 'Rubik Bubbles', cursive; margin: 15px; text-align: left; display: inline-block; color: darkgray; margin-left: 15%;">My Game</p>
    <a href="http://localhost/Lab%206/Page%201.php">Home</a>
    <a href="http://localhost/Lab%206/Page%205.php">Search Game</a>
    <a href="http://localhost/Lab%206/Page%203.php">Offer Price</a>
</div>

<div class="display">

</div>


<?php 

    $dataFileName = "GamesDirectory.txt";


    $line_no = 1;
    $details = array();
    ?>
    <div class="output_container">

    <?php
    //$iii = 1;
    $file = fopen($dataFileName, "r+");
    while ($line = stream_get_line($file, 1024 * 1024, "\n")) {
        // echo $iii, $line . "<br><br>";
        // $iii++;

        if($line_no == 1){
            $details[0] = $line;
            //echo $details[0];
        }
        
        if($line_no == 5){
            $details[1] = $line;
        }
        
        if($line_no == 6){
            $details[2] = $line;
        }

        if($line_no == 8){
            $details[3] = $line;
        }
        
        $line_no++;

        if($line_no == 10){
            output($details);
            $line_no = 1;
        }
        
    }
    ?>
        </div>
    <?php


    function output($array)
    {
        ?>
        <div class="output_box">
            <img src="bg.jpg" height="300" width="250"><br>
            <P style="font-size: 20px; font-family: 'Archivo', sans-serif; margin-top: 6%;">
                <?php 
                    echo $array[0]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo $array[1]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo $array[2]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo $array[3]
                ?>
            </p>
        </div>
        <?php

    }

?>

</body>

</html>