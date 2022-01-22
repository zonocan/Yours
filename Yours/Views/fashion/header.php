
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="../css/header.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
<header>
    <div id="logo">
     <a href="index.php">
     <img src="../img/yours.logo_.png">
     </a>
    </div>
      <div id="header_buttons" title="ヘッダーのボタン">
        <label>
          <supan class="header_btn">
            <a href="index.php"><img src="../img/home_button.gif"></a>
          </supan>
          <input type="button" name="home" id="home_top" onclick="location.href'./index.php'" value="遷移">
        </label>
          <label>
            <supan class="header_btn">
              <a href="post.php?id=<?=$_SESSION['id'] ?>"><img src="../img/new_contribute.gif"></a>
            </supan>
            <input type="button" name="post" id="post_top" onclick="location.href'./DM.php'" value="遷移">
          </label>
            <label>
              <supan class="header_btn">
                <a href="log_out.php"><img src="../img/logout_.gif"></a>
                </supan>
                <input type="button" name="buy" id="buy_top" onclick="location.href'./'" value="遷移">
            </label>
              <label>
                <supan class="header_btn">
                  <a href="DM.php"><img src="../img/DM_button.gif"></a>
                </supan>
                <input type="button" name="mail" id="mail_top" onclick="location.href'./'" value="遷移">
              </label>
                <label>
                  <supan class="header_btn">
                    <a href="my_page.php"><img src="../img/serach.gif"></a>
                  </supan>
                </label>
                <label>
                  <supan class="header_btn">
                    <a href="my_page.php"><img src="../img/my_page.gif"></a>
                  </supan>
                </label>
      </div>
</header>
