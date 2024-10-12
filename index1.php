<?php
    session_start();
    $notice = "";
    $isShown = true;

    if (!isset($_SESSION["secretNumber"])) {
        $_SESSION["secretNumber"] = 8;
    }

    if (!isset($_SESSION["attempts"])) {
        $_SESSION["attempts"] = 0;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $guess = $_POST["guess"];
        $_SESSION["attempts"]++;

        if ($guess == $_SESSION["secretNumber"]) {
            $notice = "Congratulations";
            $isShown = false;
            session_destroy();
        }
        else {
            if ($_SESSION["attempts"] >= 3) {
                $notice = "Sorry, you've used all of your attempts.";
                // $_SESSION["attempts"] = 0;
                $isShown = false;
                session_destroy();
            }
            else {
                $notice = "Wrong guess. Try again.";
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Simple Number Guessing Game</h1>
<p><?= $notice ?></p>

<p>Total number of guess <?= $_SESSION["attempts"] ?></p>
<?php if($isShown): ?>
    <form action="index1.php" method="post">
        <label>Enter your guess (1-10)</label>
        <input type="number" name="guess" min="1" max="10">
        <input type="submit" value="Guess">
    </form>
<?php endif?>
   
</body>
</html>