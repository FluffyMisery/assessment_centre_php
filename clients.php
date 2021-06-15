<!DOCTYPE html>
<html>
<head>
<title>Клиенты</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>

.gr, .gr1 {
    padding: 10px 20px;
  text-align: center;
    padding-left: -20px;
    margin-left: 5%;
    margin-top: 20px;
    margin-bottom: 3%;
    font-size: 12pt; 
    font-style: normal ;
    color: white; 
    font-family:'Times New Roman', Times, serif;
    background-color: #002101; 
    border: 2px solid #001501;
}
.add {
    padding: 15px 32px;
  text-align: center;
    margin-left: 17%;
    font-size: 16pt; 
    font-weight: bold;
    text-decoration: none;
    background-color: #ECFFED; 
    color: black; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 2px solid grey;
}
.gr:hover {
    background-color: #f44336;
    border: 2px solid #7D0000;
    color: white;
}
.gr1:hover {
    background-color: blue;
    border: 2px solid blue;
    color: white;
}
.add:hover {
    background-color: green;
    color: white;
}
div.grp {
    margin: 0% 15%;
    border-radius: 25px;
}
input {
    margin: 10px;
    margin-left: 20px;
    padding: 5px;
    width: 50%;
    font-size: 16pt;;
}
</style>
</head>
<body><h1>Список клиентов</h1>;
<?php
echo "<button class='add' name='btn' type='button' onclick=".'"window.location.href = '."'http://localhost/postgre/client_add.html'".'">Создать запись</button><div class="grp">';
echo '<form method="GET">
<input type="text" name="search" placeholder="Введите поисковый запрос">
<button type="submit" class = "search">Поиск</button>
</form>';
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$port = '5432';
$dbname='Assessment_center';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if(isset($_GET['search'])){
    $sql = "SELECT * from client where registr_client_numb::text like '%".$_GET['search']."%' or name like '%".$_GET['search']."%' or phone::text like  '%".$_GET['search']."%' or passport::text like '%".$_GET['search']."%'";
    $stml = $pdo->query($sql);
    while ($row = $stml->fetch()){
    $href = "http://localhost/postgre/client_delete.php?registr_client_numb=".$row['registr_client_numb'];
    $href1 = "http://localhost/postgre/client_update.php?registr_client_numb=".$row['registr_client_numb'];
    echo "<div class='select_z'><h4>№".$row['registr_client_numb']." ".$row['name']."</h4><p><b>Телефон: </b>" . 
    $row['phone'] . "</p><p> Паспорт:  " . $row['passport'] . "</p><button class='gr' name='btn' type='button' onclick=".'"window.location.href = '."'".$href."'".'">Удалить</button><button class="gr1" name="btn" type="button" onclick='.'"window.location.href = '."'".$href1."'".'">Обновить</button>'."</div>";
}
}
else{
$stml = $pdo->query('SELECT * from client');
while ($row = $stml->fetch()){
    $href = "http://localhost/postgre/client_delete.php?registr_client_numb=".$row['registr_client_numb'];
    $href1 = "http://localhost/postgre/client_update.php?registr_client_numb=".$row['registr_client_numb'];
    echo "<div class='select_z'><h4>№".$row['registr_client_numb']." ".$row['name']."</h4><p><b>Телефон: </b>" . 
    $row['phone'] . "</p><p> Паспорт:  " . $row['passport'] . "</p><button class='gr' name='btn' type='button' onclick=".'"window.location.href = '."'".$href."'".'">Удалить</button><button class="gr1" name="btn" type="button" onclick='.'"window.location.href = '."'".$href1."'".'">Обновить</button>'."</div>";
}}
echo  "</div></body></html>"
?>