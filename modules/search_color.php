<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
//создаем запрос к базе данных выбираем таблицу ncs
$sql = "SELECT * FROM ncs";
//выполняем запрос
$result = mysqli_query($connect, $sql);
//получаем число результатов
$count_colors = mysqli_num_rows($result);
//если существует запрос на поиск
if (isset($_POST["search_color"])) {
    //если запрос не пустой
    if ($_POST["search_color"] != "") {
        $i = 0;
        //создаем цикл для перебора результатов
        while ($i < $count_colors) {
            $colors = mysqli_fetch_assoc($result); //получаем результат в виде массива данных
            //сравниваем введеный текст с именем в базе данных
            $search = stripos($colors["color_name"], $_POST["search_color"]);
            //если результат не равне лжи то вывидем результат поиска запроса
                if ($search !== false) { ?>
                    <option class="dropdown-item" name="<?php echo $colors["color_html"] ?>" style="background:<?php echo $colors["color_html"] ?>;"><?php echo $colors["color_name"]; ?></option>
                <?php }
            $i++;
        }
    } else {
        //подключим ncs как был так как запрос пуст
        include $_SERVER['DOCUMENT_ROOT'] . "/modules/ncs.php";
    }
}
?>