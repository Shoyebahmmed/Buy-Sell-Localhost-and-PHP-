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
    }
    .choice{
        background-color: rgb(255, 255, 255); /* Black w/opacity/see-through */
        color: rgb(0, 0, 0);
        border-radius: 30px;
        font-weight: bold;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 25%;
        padding: 20px;
        text-align: center;
    }
    .button{
        background-color: #225dff;
        border-radius: 30px;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-top: 10%;
        margin-left: 12%;
        margin-right: 12%;

    }
</style>
<body>
    <div class="bg_body"> </div>
    <div class="choice">
        <p style="font-size: 55px; font-family: 'Rubik Bubbles', cursive;">My Game</p>
        <p style="font-size: 18px; ">Please Select Your Roll.</p>
        <a href="http://localhost/Lab%206/Page%202.php" class="button">Sell</a>
        <a href="http://localhost/Lab%206/Page%204.php" class="button">Buy</a>
    </div>
</body>

</html>