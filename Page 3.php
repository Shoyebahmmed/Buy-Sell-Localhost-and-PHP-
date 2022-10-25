<html>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Bubbles&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@1,300&family=Rubik+Bubbles&display=swap" rel="stylesheet">

<style>
    html, body{
        height: 100%;
        margin: 0;
        font-family: 'Roboto Mono', monospace;
    }
    .bg_body{
        height: 100%;
        width: 100%;
        background-image: url("BG.png");
        filter: blur(10px);
        -webkit-filter: blur(10px);
        position:fixed;
    }
    .information{
        background-color: rgb(255, 255, 255); /* Black w/opacity/see-through */
        color: rgb(0, 0, 0);
        border-radius: 30px;
        font-weight: bold;
        position: absolute;
        top: 5%;
        left:18%;
        z-index: 2;
        width: 60%;
        padding: 20px;
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
        margin-top: 5%;
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
    .error {
        color: red;
        font-size: small;
        margin-left: 3%;
    }

</style>
<body>
    <div class="bg_body"> </div>

    <div class="information">
    <p style="font-size: 55px; font-family: 'Rubik Bubbles', cursive; margin: 15px; text-align: center;">My Game</p>
    <p style="font-size: 18px;  margin: 5px; text-align: center;">Offer Your Price...</p>

    <?php

        $Global_error_message_buyer_name = "";
        $Global_error_message_buyer_number = "";
        $Global_error_message_buyer_price = "";
        $Global_error_message_game_ser_number = "";


        function displayForm()
        {
        ?>
            <div class="form_section">
                <form action="Page 3.php" method="post">

                    <p>Offer Details</p>
                    <input type="text" placeholder="Name" name="buyer_name">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_buyer_name"]; ?> 
                        </div>
                        
                    <input type="text" placeholder="Phone Number" name="buyer_number">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_buyer_number"]; ?> 
                        </div>
        
                    <input type="text" placeholder="Offer Price" name="offer_Price">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_buyer_price"]; ?> 
                        </div>

                    <input type="text" placeholder="Serial Number" name="game_ser_number">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_game_ser_number"]; ?> 
                        </div>

                        <br><br>
                    <input type="submit" name="submit">
                </form>
            </div>
    
        <?php
        }


        function work_section() {
            $errorCount = 0;
            $number_formate = "/^[0-9]{2}\s[0-9]{4}\s[0-9]{4}$/";
    
                if (empty($_POST['buyer_name'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_buyer_name"] = "<p>Name is mendatory to offer price.</p>";
                }
    
                if (empty($_POST['buyer_number'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_buyer_number"] = "<p>Phone Number is mendatory to offer price.</p>";
                }
                elseif (!preg_match($number_formate, $_POST['buyer_number'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_buyer_number"] = "<p>Phone Number should be (XX XXXX XXXX) formate.</p>";
                }
    
                if (empty($_POST['offer_Price'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_buyer_price"] =  "<p>Price is mendatory to offer price.</p>";
                }
                elseif (!is_numeric($_POST['offer_Price'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_buyer_price"] = "<p>Price should be number only.</p>";
                }
                
                if (empty($_POST['game_ser_number'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_game_ser_number"] = "<p>Game serial number is mendatory to offer price.</p>";
                }

                
                if ($errorCount == 0) {
                    $product_buyer_name = $_POST['buyer_name'];
                    $product_buyer_number = $_POST['buyer_number'];
                    $product_offer_price = $_POST['offer_Price'];
                    $offered_game_ser_number = $_POST['game_ser_number'];


                    $SaveString = "$product_buyer_name\n$product_buyer_number\n$product_offer_price\n$offered_game_ser_number\n";

                    $SaveFileName = "BuyersEOI.txt";

                    if(file_exists($SaveFileName)) {
                        $offer_info = fopen($SaveFileName, "a+");
                        fclose($offer_info);
                        chmod($SaveFileName, 0755);
                    }
    
                    else {
                        $offer_info = fopen($SaveFileName, "a");
                        fclose($offer_info);
                        chmod($SaveFileName, 0755);
                    }
    
                    $file = fopen($SaveFileName,"ab");
                    if ($file === FALSE) {
                        echo "There was an error creating \"" . htmlentities($SaveFileName) . "\".<br />\n";
                    }
                    else {
                        if (!fwrite($file, $SaveString)>0)
                            echo "There was an error writing to file \"" . htmlentities($SaveFileName) .	"\".<br />\n";
                        else
                        echo "<p style=\"text-align: center; font-size: 18px; color:  rgb(88, 236, 255)\">Offer upload is successful.</p>";
                        fclose($file);
                    }


                }
                else {
                    echo "<p style=\"text-align: center; font-size: 18px; color:  red\">Please enter the details again.</p>";
                }
            }

        
        if (isset($_POST['submit'])) {
            work_section();
        }

        displayForm();

            
    ?>




</div>

</body>

</html>