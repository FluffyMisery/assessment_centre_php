<!DOCTYPE html>
<html>
<head>
<title>Удаление клиента</title>
<link rel="stylesheet" href="select_style.css" type="text/css">
<style>
.add {
    margin-top: 15px;
    padding: 15px 32px;
  text-align: center;
    margin-left: 5%;
    font-size: 16pt; 
    font-weight: bold;
    text-decoration:underline;
    background-color: white; 
    color: black; 
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 2px solid green;
}
.add:hover {
    background-color: green;
    color: white;
}
div.grp {
    margin: 15%;
    border-radius: 25px;
    border: 2px solid gray;
}
</style>
</head>
<body>
    <div class="grp">
<?php
    if(isset($_GET['registr_client_numb']) ){
        $dbuser = 'postgres';
        $dbpass = '1234';
        $host = 'localhost';
        $port = '5432';
        $dbname='Assessment_center';
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        try{
        $pdo->prepare("DELETE FROM client WHERE registr_client_numb='".$_GET['registr_client_numb']."'")->execute();
        echo "<h4>Удалено!</h4>";
    }
        catch(PDOException $e){
            echo "<h4>Что-то пошло не так</h4>";
        }

    }
?>
<p><button type="button" class = "add" name="btn" value="back" onclick="window.location.href = 'http://localhost/postgre/clients.php';"> Назад </button></p>
    </div>
</body>
</html>