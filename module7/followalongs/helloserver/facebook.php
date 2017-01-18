php helloserver/facebook.php
<!DOCTYPE html>
<html>
<head>
  <title>Facebook - Log In or Sign Up</title>
</head>
<body>
  <h1>This is Facebook</h1>
  <p>You have <?php 
      $casualAcquaintances = 3000;
      $bffs = 5;
      print($casualAcquaintances + $bffs);
    ?> friends!
  </p>
</body>
</html>