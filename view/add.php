<?php

require_once '../model/model.php';

$count = $_GET["count"];

$name_image = array();
$size = array();
$material = array();
$cut = array();
$red_eyes = array();
$comments = array();
$links = array();
for ($i = 0; $i < $count; $i++) {
    $name_image[$i] = $_GET["name_image_" . $i];
    $size[$i] = getSize($_GET["size_" . $i]);
    $material[$i] = getMaterial($_GET["material_" . $i]);
    $cut[$i] = getCut($_GET["cut_" . $i]);
    $red_eyes[$i] = getRedEyes($_GET["red_eyes_" . $i]);
    $comments[$i] = getComments($_GET["comments_" . $i]);
    $links[$i] = $_GET["link_".$i];
}


for ($i = 0; $i < $count; $i++) {
    Comments::loadComments($links[$i], $name_image[$i],$material[$i], $size[$i],$red_eyes[$i], 
        $cut[$i],$comments[$i]);
}

// Получить из выпадающего списка значение размера изображения
function getSize($size) {
    switch ($size) {
        case 1:
            $size_result = "10X15";
            break;
        case 2:
            $size_result = "15X20";
            break;
        case 3:
            $size_result = "20X30";
            break;
    }
    return $size_result;
}

// Получить из выпадающего списка значение материала изображения
function getMaterial($material) {
    switch ($material) {
        case 1:
            $material_result = "Глянец";
            break;
        case 2:
            $material_result = "Мат";
            break;
        case 3:
            $material_result = "Бумага";
            break;
    }
    return $material_result;
}

//Отметить была ли выбрана обрезка фотографии
function getCut($cut) {
    if ($cut == 1) {
        $cut_result = "Отмечено";
    } else {
        $cut_result = "Не отмечено";
    }
    return $cut_result;
}

//Отметить было ли выбрано редактирование красных глаз
function getRedEyes($red_eyes) {
    if ($red_eyes == 1) {
        $red_result = "Отмечено";
    } else {
        $red_result = "Не отмечено";
    }
    return $red_result;
}


//В случае отсутсвия комментариев вернуть текстовое сообщение об их отсутствии
function getComments($comments){
    if (strlen($comments) == 0){
        return "Коментарии отсутствуют";
    }
    else 
        return $comments;
}

?>