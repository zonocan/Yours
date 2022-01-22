<?php
require_once(ROOT_PATH . 'Controllers/FathionController.php');

$country = new CountryController();
$Fathion = new FathionController();
$Fathions = $Fathion->view();
$countries = $country->Enter();
$p = $Fathions['Fathions'][0];
//var_dump($Fathions);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Entrance</title>
  <link rel="stylesheet" type="text/css" href="../css/base.css">

  <form action="varidetion.php?id=<?= $_GET['id']?>" method="post">
    <p>名前</p>
     <input type="name" id="input_name" name="name" value="<?= $p['name']?>">
    <p>所属</p>
     <input type="club" id="input_club" name="club" value="<?= $p['club']?>">
    <p>誕生日</p>
     <input type="birth" id="input_birth" name="birth" placeholder="例 1998-02-10" value="<?= $p['birth']?>">
    <p>身長</p>
     <input type="height" id="input_height" name="height" value="<?= $p['height']?>">
    <p>体重</p>
     <input type="weight" id="input_weight" name="weight" value="<?= $p['weight']?>">
    <p>背番号</p>
     <input type="uniform_num" id="uniform_num" name="uniform_num" value="<?= $p['uniform_num']?>">
    <p>ポジション</p>
     <select name="position" id="position" name="position" value="<?= $p['position']?>">
       <option>MF</option>
       <option>GK</option>
       <option>DF</option>
       <option>FW</option>
     </select>
     <select name="countries" id="countries">
       <?php foreach ($countries['countries'] as $countries): ?>
       <option><?php echo $countries['name'];?></option>
       <?php endforeach; ?>
     </select>
     <div><input type="submit" value="送信" onsubmit="return confirm();"></div>

  </form>
