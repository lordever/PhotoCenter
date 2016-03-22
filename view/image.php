<?
ob_start();
session_start();
$_SESSION["s_id"] ++;
if ($_SESSION["s_id"] > 1 && $_SESSION["s_id"] < 3) {
    require_once '../model/model.php';
    header("Location: ../view/Main.php");
    Image::removeImages();
    unset($_SESSION['s_id']);
    exit;
} elseif ($_SESSION["s_id"] > 3) {
    header("Location: ../view/Main.php");
    unset($_SESSION['s_id']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hosting</title>
        <style>
            h1,h2{
                text-align:center;
            }
            #main{
                margin:0 auto;
                width:620px;
                text-align:center;
            }
            .image{
                width:300px;
                height:300px;
                text-align:left;
                float:left;
                padding-right:10px;
                margin:0 auto;
                padding-bottom:270px;
            }
        </style>
        <script type="text/javascript" src="../lib/jquery-2.1.4.min.js"></script>
    </head>
    <?php
    require_once "../constructor/show_image.php";

    require_once "../constructor/linkingAtImage.php"; //Ajax здесь

    if (isset($_POST["remove"]) && isset($_POST["return"])) {
        if (Image::removeImages())
            header("Location: ../view/main.php");
        exit; //Удаление файлов в папке
    }
    ?>
    <body>
        <h1>Welcome to my Hosting!</h1>
        <? if ($results) { ?>

            <div id="main">
                <?
                $count = $_GET["count"]; //Переменная count хранит в себе количество загружаемых изображений
                $br = 0; // Переменная считает div по горизонтали. Если 
                //переменная принимает значение больше двух, блок переносится на слудующую строку
                for ($i = 0; $i < $count; $i++) {
                    OutImageThroughCycle($path, $i); // РАсположение функции: ../constructor/show_image.php 
                }
                ?>
            <? } else { ?>
                <h2>This image isn't found</h2>
            <? } ?>
            <input type="button" id="send" value="Отправить" />
        </div>
         <form action="#" method="post" name="remove">
        <p>
            <input type="submit" class="Return_but" name="return" value="Return to Main" />
        </p>
        <p>
       
            <input type="submit" class="remove" name="remove" value="Remove" />
        
    </p>
    </form>
</body>
</html>
