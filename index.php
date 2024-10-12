<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Number Guessing Game</title>
</head>

<body>
    <h1>Simple Number Guessing Game</h1>
    <?php
    $secretNumber = 8;

    $attempts = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $guess = $_POST["guess"];
        $attempts++;

        if ($guess == $secretNumber) {
            echo "Congratulations, you guess the number correctly!";
            $notice = "";
        } else {
            if ($attempts >= 3) {
                echo "Sorry you've used all of your attempts";
            } else {
                echo "Wrong Guess try again.";
            }
        }
    }

    echo "<br> Total number of guess {$attempts}";  

    ?>
    <form action="index.php" method="post">
        <label>Enter your guess (1-10)</label>
        <input type="number" name="guess" min="1" max="10">
        <input type="submit" value="Guess">
    </form>
</body>

</html>
<?php

?>