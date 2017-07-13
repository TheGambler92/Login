<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=id2213662_project_accounts', '*', '*');

if(isset($_GET['login'])){
  $email = $_POST['email'];
  $password = $_POST['password']

  $statement = $pdo->prepare("SELECT * FROM Users WHERE email = :email");
  $result = $statement->execute(array('email' => $email));
  $user = $statement->fetch();

  if ($user !== false && password_verify($passwort, $user['passwort'])) {
      $_SESSION['userid'] = $user['id'];
      die('Login erfolgreich.');
  } else {
      $errorMessage = "E-Mail oder Passwort war ungültig<br>";
  }
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title> 
</head> 
<body>



<form name="login_form"action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
<input type="submit" value="Abschicken">
</form> 
</body>
</html>