<head>
  <?php
  require_once(ROOT_PATH . 'Controllers/FathionController.php');
  $country = new CountryController();
  $countries = $country->Enter();
  //var_dump($countries);
  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>アドレス登録</title>
</head>
<form method="post" action="register.php">
<p>お住まいの国</p>
<select name="country_id" id="countries">
  <?php foreach ($countries['countries'] as $countries): ?>
  <option value="<?= $countries['id']?>"><?php echo $countries['name'];?></option><?php endforeach; ?>
</select>
<p>メールアドレス</p>
<input type="text" name="email">
<p>パスワード</p>
<input type="text" name="password"></br>
<p>権限</p>
<select name="role">
 <option value="0">管理者ユーザー</option>
 <option value="1">一般ユーザー</option>
</select>
</div><input type="submit" value="送信"></div>
</form>
</html>
