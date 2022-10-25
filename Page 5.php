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
        width: fit-content;
        height: fit-content;
        background-color: #ADADAD;
        padding: 2%;
        margin-bottom: 2%;
        display: block; 
        margin-left: auto; 
        margin-right: auto;
        margin-top: 3%;
    }
    .error {
        color: red;
        font-size: small;
        margin-left: 3%;
    }

    input[type=text] {
        width: 70%;
        padding: 12px 20px;
        margin: 8px;
        box-sizing: border-box;
        border: 2px solid rgb(88, 236, 255);
        border-radius: 30px;
    }
    .form_section{
        margin-left: 22%;
        margin-top: 3%;
        position: static;
    }
    input[type=submit] {
        background-color: #42c9ff;
        border: none;
        color: white;
        padding: 12px 32px;
        text-decoration: none;
        cursor: pointer;
        border-radius: 30px;
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


    $Global_error_message_ser_number = "";

    function displayForm()
    {
    ?>
        <div class="form_section">
            <form action="Page 5.php" method="post">
                <input type="text" placeholder="Serial Number" name="ser_number">
                    <div class="error">
                        <?php echo $GLOBALS["Global_error_message_ser_number"]; ?> 
                    </div>
                    <br><br>
                    <input type="submit" name="submit">
                </form>
        </div>
    
    <?php
    }

function work_section() {
    $dataFileName = "GamesDirectory.txt";
   
    $details = array();
    $errorCount = 0;
    $not_found = 0;
    $found = 0;


    if (empty($_POST['ser_number'])) {
        $errorCount += 1;
        $GLOBALS["Global_error_message_ser_number"] = "<p>Serial Number is mendatory to add product into the list.</p>";
    }

    if ($errorCount == 0) {
        $product_ser_number = $_POST['ser_number'];
        //echo $product_ser_number . " $$$ <br>";
        $iii = 1;
        $line_no = 1;
        $temp_store = array();

        $file = fopen($dataFileName, "r+");
        while ($line = stream_get_line($file, 1024 * 1024, "\n")) {
             //echo $iii, $line . "<br><br>";

             

            if($line_no == 1){
                $temp_store[0] = $line;
                //echo $details[0];
            }
            
            if($line_no == 2){
                $temp_store[1] = $line;
            }
    
            if($line_no == 3){
                $temp_store[2] = $line;
            }
    
            if($line_no == 4){
                $temp_store[3] = $line;
            }
    
            if($line_no == 5){
                $temp_store[4] = $line;
                //echo $temp_store[4] . "<br>";
            }
    
            if($line_no == 6){
                $temp_store[5] = $line;
            }
    
            if($line_no == 7){
                $temp_store[6] = $line;
            }
            
            if($line_no == 8){
                $temp_store[7] = $line;
            }
    
            if($line_no == 9){
                $temp_store[8] = $line;
            }


            $line_no++;
            if($line_no == 10){
                $line_no = 1;
                // // foreach($temp_store as $temp){
                // //     echo $iii, $temp . " ";
                // //     $iii++;
                // // }

                // // echo "<br><br><br>";
                // $remove_dash = str_replace("-", "", $temp_store[4]);
                // $remove_space = str_replace(" ", "", $remove_dash);
                // // echo $remove_space ."###";

                // //echo strcmp($remove_space, $product_ser_number) . "<br>";
                // // echo $temp_store[4] . "<br>";
                // // echo $product_ser_number . "<br>";

                if (strcmp($temp_store[4], $product_ser_number) == 0){
                    $details = $temp_store;
                    output($details);
                    $found = 1;
                    break;
                }
                else{

                        $not_found++;
                        $iii = 1;
                }
            }
            
        }

        if($not_found > 0) {
            if($found == 0){
                echo "<p style=\"text-align: center; font-size: 18px; color:  red\">Serial Number is not Found Please Try Again.</p>";
            }
        }
    }
}


    function output($array)
    {
        ?>
        <div class="output_box">
            <img src="bg.jpg" height="300" width="250" style="display: block; margin-left: auto; margin-right: auto;"><br>
            <P style="font-size: 20px; font-family: 'Archivo', sans-serif; ">
                <?php 
                    echo "Product Name: " . $array[0]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Seller Name: " . $array[1]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Phone Number: " . $array[2]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Email: " . $array[3]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Serial Number: " . $array[4]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Product Type: " . $array[5]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Description: " . $array[6]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Year of Release: " . $array[7]
                ?>
            </p>

            <P style="font-size: 15px; font-family: 'Archivo', sans-serif; margin-top: 0%; margin-bottom: 2%">
                <?php 
                    echo "Original Package: " . $array[8]
                ?>
            </p>
        </div>
        <?php

    }


            
    if (isset($_POST['submit'])) {
        work_section();
    }

    displayForm();

?>

</body>

</html>