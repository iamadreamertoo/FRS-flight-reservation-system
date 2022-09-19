<?php
// $YourNameErr = $YourEmailErr = $PasswordErr = $RepeatYourPasswordErr = "";
$errors = array('name'=>'', 'email'=>'', 'password'=>'', 'rePassword'=>''); //errors should store in array it will be more simple then variables..
$YourName = $YourEmail = $Password = $RepeatYourPassword = '';
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
    if (empty($_POST['name'])) {
        $errors['name'] = "A Name is required";
    } else {
        $YourName = $_POST['name'];
        // $YourName = test_input($_POST["Your Name"]);
        if(!preg_match('/^[a-zA-Z\s]+$/', $YourName)){
            //preg_match is a Regular expression(Regex PHP) function which can be used to custmized validate something as per developer need unlike "Filter" validation.for more info https://www.tutorialspoint.com/php/php_regular_expression.htm
            $errors['name'] = "Enter a valid name";
        }
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "An Email is required";
    } else {
        // $YourEmail = test_input($_POST["Your Email"]);
        $YourEmail = $_POST['email'];
        if(!filter_var($YourEmail, FILTER_VALIDATE_EMAIL)){ 
            //filter_var is inbuilt function which validate a specific input through specified filters like"FILTER_VALIDATE_EMAIL"
            $errors['email'] = 'Enter a valid email';
        }
    }


    if (empty($_POST['password'])) {
        $errors['password'] = "Password is required";
    } else {
        // $Password = test_input($_POST["Password"]);
        $Password = $_POST['password'];
    }


    if (empty($_POST['repassword'])) {
        $errors['rePassword'] = "Repeat Your Password";
    } else {
        // $RepeatYourPassword = test_input($_POST['Repeat Your password']);
        $RepeatYourPassword = $_POST['repassword'];
        if(!$RepeatYourPassword == $Password){
            $errors['rePassword'] = 'Enter the same password';
        }
    }
    if(!array_filter($errors)){         //array_filter go through the given array and check the condition, if satisfied it returns true.
        header('location: login.php');          //"location: " is a string for redirecting to any page
    }
}
// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="2.css">
</head>

<body>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
                            <form action="reg.php" method="POST">

                                <div class="form-outline mb-4">
                                    <input type="text" name="name" class="form-control form-control-lg" />
                                    <label class="form-label">Your Name</label>
                                    <span class="error">* <?php echo $errors['name']; ?></span>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" />
                                    <label class="form-label">Your Email</label>
                                    <span class="red-text">* <?php echo $errors['email']; ?></span>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control form-control-lg" />
                                    <label class="form-label">Password</label>
                                    <label for="psw">Password</label>
                         <span class="error">* <?php echo $errors['password']; ?></span>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="repassword" class="form-control form-control-lg" />
                                    <label class="form-label">Repeat your password</label>
                                    <span class="error">* <?php echo $errors['rePassword']; ?></span>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" />
                                    <label class="form-check-label">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <!-- <button type="button" name="register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"><a href="login.php">Register</a></button> -->
                                    <input type="submit" name="submit" value="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</html>