<?php
sesssion_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin home</title>
        <link rel="stylesheet" href="bootstrap-5.2.1-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
      <h1>Hello, <?php echo $_SESSION['user_name']; ?> </h1>
      <a href="logout.php">Logout</a>
    </body>
    </html>
    <?php
}
else {
    header ("Location: login index.php");
}
?>