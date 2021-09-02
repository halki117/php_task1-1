

<?php 

// リロードをした時に二重送信を防ぐためにトークンの発行をしている

session_start();

// リロードした際は、新しくトークンが発行されフォームから送られてきたトークンと異なる様になる。
if ($_POST["token"] == $_SESSION["token"])
{
  $answer = $_POST["answer"];
}

$_SESSION['token'] = mt_rand();

$token = $_SESSION['token'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>日本の首都は?</h1>
  <form action="" method="post">
    <input type="text" name="answer">
    <input type="submit"  name="submit" value="ok">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
  </form>
  
  <p>
    <?php
      // 空送信でも不正解としたいので、$answer !== null（null以外はtrueを返す）と指定した。
      if( $answer !== null ){
        if($answer === "東京"){
          echo "正解";
        } else {
          echo "不正解";
        }
      }
    ?>
  </p>
  
</body>

</html>