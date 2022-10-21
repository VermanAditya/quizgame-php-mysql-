<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Result</title>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdb');

// firstly evaluting the attempts of questions
if (isset($_POST['submit'])) {
    if (!empty($_POST['quizcheck'])) {
        $count = count($_POST['quizcheck']);
        // echo "You have attempt ".$count." Questions, Out of all";
        
        // check which question attempted

        $result = 0;

        $i = 1;

        $selected = $_POST['quizcheck'];
        // print_r($selected);

        $q = "select * from questions";
        $query = mysqli_query($con,$q);

        while ($rows = mysqli_fetch_array($query)) {
            // print_r($rows['ans_id']);
            $check = $rows['ans_id'] == $selected[$i];
            
            if($check){
                $result++;
            }
            $i++;
        }

        // echo "<br> Ur total scrore is ". $result; 

// storing data into user table 

        $name = $_SESSION['username'];
        $finalScore = "insert into user(username,totalques,answercorrect) values('$name','4','$result')";

        $queryresult = mysqli_query($con,$finalScore);
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col col-result">
                <div class="result-greet-box">
                    <h4 class="text-center p-y bg-dark text-light">Okay,<span class="username"><?php echo $_SESSION['username']?></span><br>Here we are with your Score</h4>
                </div>
                <div class="score card">
                    <div class="atmpt-ques d-block card-body">
                        <h4 class="col">
                            <p>You have attempted total <?php echo $count; ?> Questions. </p>
                        </h4>
                        <hr>
                        <h4 class="col">
                            <p>Your Score is <?php echo $result*5; ?> </p>
                        </h4>
                    </div>
                    <br><hr><br>
                    <h4 class="text-center">
                        Thanks <span class="username"><?php echo $_SESSION['username']?></span>, For Attempting this Quiz Game.
                    </h4>
                </div>
                <br><br>
            <div class="logout row ">
                <a href="logout.php" class="btn p-3 mb-2 bg-dark text-white text-center">LOGOUT</a>
            </div>
            </div>
        </div>
    </div>

    
</body>
</html>