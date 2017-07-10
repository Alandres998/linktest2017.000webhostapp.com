<DOCTYPE html>
    <html>
    <head>
     <title>Тестовое задание</title>
    </head>
    <body>
    <form action="" method="post"> Введите ссылку
    <input type="url" required  name="originLink">
    <input type="submit" name="submit" value="Сгенерировать">


<?php
        error_reporting(0); //Поскольку originLink Поскольку originLink не определен при первой загрузке страницы, прячим предупреждение;
	$CharterSet = "1234567890qwertyuiopasdfghjklzxcvbnm"; //Набор символов используемых для генерирования ссылки
	$random = substr(str_shuffle($CharterSet ), 0, 4); //Длина ссылки
	$site = "https://linktest2017.000webhostapp.com/"; //Внимание здесь адрес сайта, поменять при изменении или локальном запуске;
    $url = $_POST['originLink'];

    	//Условие
    	if ($_POST['submit'])
    	{
        echo "<a href='$site$random' target='_blank'>$site$random</a>";
        $create = fopen("random/$random.php", "w"); //Создаем файл c названием рандома
            fwrite($create, "<?php header('Location: $url') ?>");
            fclose($create);

//изменяем htaaccess, делаеем переадресацию
            $HtEdit = fopen(".htaccess", "a"); 
            fwrite($HtEdit, "
RewriteRule ^$random$ random/$random.php");
            fclose($HtEdit);
    	}


?>

    </body>
    </html>