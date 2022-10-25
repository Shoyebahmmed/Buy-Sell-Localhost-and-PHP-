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
    textarea{
        width: 70%;
        padding: 12px 20px;
        margin: 8px;
        height: 200px;
        box-sizing: border-box;
        border: 2px solid rgb(88, 236, 255);
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
    <p style="font-size: 18px;  margin: 5px; text-align: center;">Add Your Information</p>

    <?php

$Global_error_message_name = "";
$Global_error_message_number = "";
$Global_error_message_email = "";
$Global_error_message_ser_number = "";
$Global_error_message_type = "";
$Global_error_message_des = "";
$Global_error_message_release = "";
$Global_error_message_package = "";
$Global_error_pro_name = "";




        function displayForm()
        {
        ?>
            <div class="form_section">
                <form action="Page 2.php" method="post">

                    <p>Personal Information</p>
                    <input type="text" placeholder="Name" name="sel_name">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_name"]; ?> 
                        </div>
                        
                    <input type="text" placeholder="Phone Number" name="number">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_number"]; ?> 
                        </div>
        
                    <input type="text" placeholder="Email" name="email">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_email"]; ?> 
                        </div>


                    <br><br>
                    <p>Product Information</p>
                    <input type="text" placeholder="Product Name" name="pro_name">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_pro_name"]; ?> 
                        </div>

                    <input type="text" placeholder="Serial Number" name="ser_number">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_ser_number"]; ?> 
                        </div>
                        
                    <input type="text" placeholder="Product Type" name="pro_type">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_type"]; ?> 
                        </div>
        
                    <textarea rows="4" cols="50" name="description" placeholder="Description..."></textarea>
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_des"]; ?> 
                        </div>


                    <br><br>
                    <p>Product Details</p>
                    <input type="text" placeholder="Year of Release" name="year_release">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_release"]; ?> 
                        </div>
                        
                    <input type="text" placeholder="Original Package" name="or_package">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_package"]; ?> 
                        </div>

        
                    <br><br>
                    <input type="submit" name="submit">
                </form>
            </div>
    
        <?php
        }

        function work_section() {
            $errorCount = 0;
            $email_formate = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.[a-zA-Z]{2,})$/";
            $number_formate = "/^[0-9]{2}\s[0-9]{4}\s[0-9]{4}$/";
    
                if (empty($_POST['sel_name'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_name"] = "<p>Seller name is mendatory to add product into the list.</p>";
                }
    
                if (empty($_POST['number'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_number"] = "<p>Phone Number is mendatory to add product into the list.</p>";
                }
                elseif (!preg_match($number_formate, $_POST['number'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_number"] = "<p>Phone Number should be (XX XXXX XXXX) formate.</p>";
                }
    
                if (empty($_POST['email'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_email"] =  "<p>Email is mendatory to add product into the list.</p>";
                } 
                elseif (!preg_match($email_formate, $_POST['email'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_email"] = "<p>Email is not valid.</p>";
                }

                if (empty($_POST['pro_name'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_pro_name"] = "<p>Product name is mendatory to add product into the list.</p>";
                }

                if (empty($_POST['ser_number'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_ser_number"] = "<p>Serial Number is mendatory to add product into the list.</p>";
                }

                if (empty($_POST['pro_type'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_type"] = "<p>Product type is mendatory to add product into the list.</p>";
                }

                if (empty($_POST['description'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_des"] = "<p>Product description is mendatory to add product into the list.</p>";
                }

                if (empty($_POST['year_release'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_release"] = "<p>Product release year is mendatory to add product into the list.</p>";
                }

                if (empty($_POST['or_package'])) {
                    $errorCount += 1;
                    $GLOBALS["Global_error_message_package"] = "<p>Product original package status is mendatory to add product into the list.</p>";
                }
    
                if ($errorCount == 0) {
                    $product_sel_name = $_POST['sel_name'];
                    $product_number = $_POST['number'];
                    $product_email = $_POST['email'];
                    $product_name = $_POST['pro_name'];
                    $product_ser_number = $_POST['ser_number'];
                    $product_type = $_POST['pro_type'];
                    $product_des = str_replace("\r\n","",$_POST['description']);
                    $product_release = $_POST['year_release'];
                    $product_package = $_POST['or_package'];


                    $SaveString = "$product_name\n$product_sel_name\n$product_number\n$product_email\n$product_ser_number\n$product_type\n$product_des\n$product_release\n$product_package\n";

                    $SaveFileName = "GamesDirectory.txt";

                    if(file_exists($SaveFileName)) {
                        $games_info = fopen($SaveFileName, "a+");
                        fclose($games_info);
                        chmod($SaveFileName, 0755);
                    }
    
                    else {
                        $games_info = fopen($SaveFileName, "a");
                        fclose($games_info);
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
                        echo "<p style=\"text-align: center; font-size: 18px; color:  rgb(88, 236, 255)\">Product upload is successful.</p>";
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