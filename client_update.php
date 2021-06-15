<!DOCTYPE html>
<html>
  <head>
    <title>Добаление клиента</title>
    <link rel="stylesheet" href="select_style.css" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=unicode" />
    <style>
        * {
    box-sizing: border-box;
 }
 .decor {
    position: relative;
    max-width: 400px;
    margin: 50px auto 0;
    background: white;
    border-radius: 30px;
    box-shadow: 12px 12px 2px 1px rgba(216, 216, 255, 0.2);
 }
 .form-inner {
    padding: 50px;
 }
 .form-inner input, .form-inner textarea {
    display: block;
    width: 100%;
    padding: 0 20px;
    margin-bottom: 10px;
    background: #E9EFF6;
    line-height: 40px;
    border-width: 0;
    border-radius: 20px;
    font-family: 'Roboto', sans-serif;
 }
 .form-inner input[type="submit"] {
    margin-top: 30px;
    background: #f69a73;
    border-bottom: 4px solid #d87d56;
    color: white;
    font-size: 14px;
 }
 .form-inner textarea {
    resize: none;
 }
 .form-inner h3 {
    margin-top: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 24px;
    color: black;
 }
 .bl {
    padding: 15px 32px;
    text-align: center;
    margin-left: 5%;
    font-size: 12pt;
    font-weight: bold;
    color: rgb(255, 255, 255);
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
    background-color: #002101; 
    border: 2px solid #001501;
  }

  .bl:hover {
    background-color: rgb(0, 0, 88);
    color: white;
  }
    </style>
  </head>
  <body>
    <form action="client_update_sql.php" class="decor" method="POST">
        <div class="form-left-decoration"></div>
        <div class="form-right-decoration"></div>
        <div class="circle"></div>
        <div class="form-inner">
            <h3>Введите данные для клиента</h3>
<?php
    if(isset($_GET['registr_client_numb'])){
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $port = '5432';
        $dbname='assessment_centre';
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        $stml = $pdo->query('SELECT * from client where registr_client_numb = '.$_GET['registr_client_numb']);
        $row = $stml->fetch();
        echo'<input
        type="text"
        name="registr_client_numb"
        placeholder="Номер клиента"
        value='.$row['registr_client_numb'].'
      /><br />
      <input type="text" name="name" placeholder="Имя" value="'.$row['name'].'" /><br />
      <input type="number" name="phone" placeholder="Телефон" value='.$row['phone'].' /><br />
      <input type="number" name="passport" placeholder="Паспорт" value='.$row['passport'].' /><br />';
    }
?>
      <button type="submit" class="bl" name="btn">
        Обновить
      </button>
        </div>
    </form>
  </body>
</html>
