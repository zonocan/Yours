<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>アドレス登録</title>
</head>
<body>
  <?php
  $dsn = "mysql:host=localhost;dbname=world_cup;charset=utf8";
  //var_dump($_POST);
  $country=$_POST['country_id'];
  $email=$_POST['email'];
  $user_pw=$_POST['password'];
  $user_pw=password_hash($user_pw,PASSWORD_DEFAULT);
  $role =$_POST['role'];

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  $_SESSION['mail'] = 1;
  header("Location: ./login.php");
  }
  try{
    $dbh = new PDO($dsn,'root','root');
  } catch(PDOException $e){
    $msg = $e->getMessage();
  }

  $stmt = $dbh-> prepare("INSERT INTO users(country_id,email,password,role) VALUES(:country_id,:email,:password,:role)");
  $stmt -> bindParam(':country_id',$country,PDO::PARAM_INT);
  $stmt -> bindParam(':email',$email,PDO::PARAM_STR);
  $stmt -> bindParam(':password',$user_pw,PDO::PARAM_STR);
  $stmt -> bindParam(':role',$role,PDO::PARAM_INT);
  $stmt -> execute();
  //$pdo = NULL;
  header('Location: login.php');
  ?>
</body>
</html>
