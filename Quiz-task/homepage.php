<?php
error_reporting(E_ALL ^ E_NOTICE);
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdb');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    body {
        font: 14px sans-serif;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="welcome-box">
                    <div class="welcome-text p-3 mb-2 bg-dark text-white text-center">
                        <h2>Hello, <?php  echo $_SESSION['username']; ?></h2>
                        <hr>
                        <h3>Now You are in, Let's Play the Quiz Game.</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h4 class="text-center card-header"><span class="username"><?php  echo $_SESSION['username']; ?></span>, You have to choose
                            any one option in each question,<br> if it gets correct then you will get 5 marks. <br> Please choose wisely, Good Luck!!! </h4>
                        <br>
                    </div>
                </div>
                <div class="col-lg-8 m-auto d-block">
                    <form action="evaluation.php" method="post">
                        <?php
            for($i=1;$i<5;$i++){
                $quer = "select * from questions where qid=$i";

                $query = mysqli_query($con,$quer);
                while ($rows = mysqli_fetch_array($query)) {?>
                        <div class="card questions">
                            <h4 id="ques-<?php echo $i;?>" class="card-header">
                                <?php echo "Q.".$i."  ".$rows['question']; ?>
                            </h4>
                            <div class="card-body option">
                                <?php
                $quer = "select * from answers where ans_id=$i";

                $query = mysqli_query($con,$quer);
                while ($rows = mysqli_fetch_array($query)) {?>
                                <div class="opt">
                                <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" class="options" value="<?php echo $rows['aid']; ?>">
                                <?php echo $rows['answer']; ?>
                </div>

                                <?php } ?>
                            </div>
                        </div>
                        <br>



                        <?php }
               }
            ?>
                        <br>
                        <input type="submit" value="SUBMIT" name="submit" class="btn btn-success m-auto d-block" />
                    </form>
                </div>

            </div>
            
        </div>
        <br>
        <br><br>
            <div class="logout row ">
                <a href="logout.php" class="btn p-3 mb-2 bg-dark text-white text-center">LOGOUT</a>
            </div>
            <br><br>
        <div class="text-center">
            <h4>Quiz Game by <a href="javscript:void(0);">ADITYA VERMAN</a></h4>
        </div>
    </div>
</body>

</html>