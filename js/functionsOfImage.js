$(document).ready(function () {
    $("#send").click(function () {
//        
//Переменная count получена в файле(связке) ../constructor/linkingAtImage 
        for (var i = 0; i < count; i++) {
            
            //<editor-fold defaultstate="collapsed" desc="Объявляемые переменные(развернуть)">
            var name_image = $("input[name=name_image_" + i + "]").val();
            var size = $("select[name=size_" + i + "]").val();
            var material = $("select[name=material_" + i + "]").val();
            var cut = $("#cut_" + i).prop("checked");
            var red_eyes = $("#red_eyes_" + i).prop("checked");
            var comments = $("#text_comment_" + i).val();
            var check = false; // Переменная для проверки ввода данных
            //</editor-fold>

            if (cut) // В зависимости от выбранного checkbox возвращается соответствующее значение 
                cut = 1;
            else
                cut = 0;
            if (red_eyes) // В зависимости от выбранного radio возвращается соответствующее значение 
                red_eyes = 1;
            else
                red_eyes = 0;
            if ($.trim(name_image).length > 0) { //trim - уберает пробелы
                check = true;
            } else {
                check = false;
                var borderParam = "1px solid red";
                $("input[name=name_image_" + i + "]").css("border", borderParam);
                break;
            }
        }

       if (check) {
           for (var i = 0; i < count; i++) {
               $("input[name=name_image_" + i + "]").css("border", "1px solid grey");
               $.ajax({
                   url: "add.php?name_image_" + i + "=" + name_image + "&size_" + i + "=" + size +
                           "&material_" + i + "=" + material + "&cut_" + i + "=" + cut + "&red_eyes_" + i + "="
                           + red_eyes + "&comments_" + i + "=" + comments + "&count=" + count + "&link_" + i + "=" + link[i],
                   success: function () {
                       window.location.href = '../view/success.php';
                   }
               });
           }
       } else {
           var borderParam = "1px solid red";
           $("input[name=name_image_" + i + "]").css("border", borderParam);
           check = false;
       }

    });
});






