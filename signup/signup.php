<?php
session_start();

$cookie_name = "";
$cookie_value = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["email"] = $_POST["email"];
}

// defining the variables
$nameErr = $passwordErr = $emailErr = $confirmPasswordErr = "";
$name = $password = $email = "";

// database variables 
$servername = "localhost";
$username = "FabianMuli";
$password = "1LoveFabian";
$DBName = "steveyounglion";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DBName);

// defining if the user is already registered message
$message = " ";

// handling the form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "name cannot be blank";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "email cannot be blank";
    } else {
        $email = $_POST["email"];
        $_SESSION["email"] = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password cannot be blank";
    } else {
        if ($_POST["password"] == $_POST["confirmPassword"]) {

            $_password = $_POST["password"];
             //adding data into the database
            $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$_password')";

            if (count($_POST) > 0) {
                $result = mysqli_query($conn, "SELECT * FROM users WHERE name='" . $_POST["name"] . "' and email = '" . $_POST["email"] . "'");
                $emailResult = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $_POST["email"] . "'");

                $count = mysqli_num_rows($result);
                $count2 = mysqli_num_rows($emailResult);
                if ($count > 0) {
                    $message = "user already exists";
                } else if ($count2 > 0) {
                    $message = "email already exists";
                } else {
                    $conn->query($sql);
                    $_SESSION["user_id"] = 1001;
                    $_SESSION["LOGGED_IN"] = true;
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION['loggedin_time'] = time();
                    header("Location:index.php");
                }
            }
        } else {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

}

$conn->close(); // closing the datbase after operations

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../login/css/style1.css">
    <link rel="stylesheet" href="../login/css/style.css">


    <title>Steve Younglion | Signup</title>
</head>

<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card mt-5">

                <div class="card-body">
                    <div class="agile-logo text-center">
                        <h1>
                            <a href="../index.html">Steve</a>
                            <span>Younglion</span>

                        </h1>
                        <br />
                        <h2>
                            <em>&mdash; signup &mdash;</em>
                        </h2>

                    </div>

                    <form method="POST" action="" class="validate">
                        <div class="text-center p-2 mb-3 text-capitalize">
                            <span class="text-danger"><?php echo $message; ?></span>
                        </div>

                        <div class="form-group name-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-address-book"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="full name.." class="form-control" value="" required>

                            </div>
                            <span class="text-danger"><?php echo $nameErr; ?></span>
                        </div>

                        <div class="form-group email-input">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        @
                                    </span>
                                </div>
                                <input type="email" name="email" id="email" placeholder="example@email.com.." title="The domain portion of the email address is invalid (the portion after the @)."
                                    class="form-control" value="<?php echo $email; ?>" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$"
                                    required>
                            </div>

                            <span class="text-danger"><?php echo $emailErr; ?></span>
                        </div>

                        <div class="form-group password-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" placeholder="password" class="form-control" title="Passwords should include 1 uppercase letter, 1 lowercase letter and 1 number"
                                    minlength="6" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
                            </div>
                            <span class="text-danger"><?php echo $passwordErr; ?></span>
                        </div>

                        <div class="form-group password2-input">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>

                                </div>
                                <input type="password" name="confirmPassword" placeholder="confirm password" id="password2" class="form-control" title="Passwords should include 1 uppercase letter, 1 lowercase letter and 1 number"
                                    minlength="6" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
                            </div>
                            <span class="text-danger"><?php echo $confirmPasswordErr; ?></span>
                            <p id="passwordErrorContainer" class="error">
                                <span class="error-message" id="passwordError"></span>
                            </p>
                            <div>



                            </div>

                            <div class="text-center p-3">
                                <input type="submit" class="btn btn-primary btn-lg pr-5 pl-5" name="submit" value="sign up">

                                <br>
                                <br>
                                <a href="../login/login.php" class="login-a sign-up-login-button text-center"> or Login</a>
                            </div>

                    </form>

                    </div>

                    <div class="col-md-3"></div>
                </div>

                <script src="js/validate-form.js"></script>
                <script>
                    $(function () {
                        $('#name').change(function () {
                            $('.name-input>.error-message').css("display", "none");
                        });
                        $('#email').change(function () {
                            $('.email-input>.error-message').css("display", "none");
                        });
                        $('#password').change(function () {
                            $('.password-input>.error-message').css("display", "none");
                        });
                        $('#password2').change(function () {
                            $('.password2-input>.error-message').css("display", "none");
                        });
                    })
                </script>

</body>

</html>