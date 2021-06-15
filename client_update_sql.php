<!DOCTYPE html>
<html>
<head>
<title>Добваление клиента</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
.add {
    margin-top: 15px;
    padding: 15px 32px;
  text-align: center;
    margin-left: 5%;
    font-size: 16pt; 
    font-weight: bold;
    color: white; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    background-color: #002101; 
    border: 2px solid #001501;
}
.add:hover {
    background-color: green;
    color: white;
}
div.grp {
    margin: 15%;
    border-radius: 25px;
}
</style>
</head>
<body>
<div class="grp">
<?php
    if(isset($_POST['registr_client_numb'], $_POST['name'], $_POST['phone'], $_POST['passport'])){
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $port = '5432';
        $dbname='assessment_centre';
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        $pdo->prepare("UPDATE client SET registr_client_numb=?, name=?, phone=?, passport=? where registr_client_numb=?")->execute([$_POST['registr_client_numb'], $_POST['name'], $_POST['phone'], $_POST['passport'], $_POST['registr_client_numb']]);
        $stml = $pdo->prepare('SELECT * from client where registr_client_numb = ?');
        $stml->execute([$_POST['registr_client_numb']]);
        if($row = $stml->fetch()) echo "<div class='select_z'><h4>№".$row['registr_client_numb']." ".$row['name']."</h4><p><b>Телефон: </b>" . 
        $row['phone'] . "</p><p> Паспорт:  " . $row['passport'] . "</p></div>";
        else echo '<p>Не вставилось или не изменилось</p>';
    }
    else echo '<h4>Введите данные</h4>';
?>
<button type="button" class = "add" name="btn" value="back" onclick="window.location.href = 'http://localhost/postgre/clients.php';"> Назад </button>
</div>
</body>
</html>
