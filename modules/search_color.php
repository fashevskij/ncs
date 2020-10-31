<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
$sql = "SELECT * FROM ncs ";//создаем запрос к базе данных выбираем таблицу ncs
$result = mysqli_query($connect, $sql); //выполняем щапрос
$count_colors = mysqli_num_rows($result); //получаем число результатов
//если существует запрос на поиск
if (isset($_POST["search-color"])) {
    //если запрос не пустой
    if ($_POST["search-color"] != "") {
        $i = 0;
    //создаем цикл для перебора результатов
    while ($i < $count_colors) {
        $colors = mysqli_fetch_assoc($result); //получаем результат в виде массива данных
        //сравниваем введеный текст с именем в базе данных
        $search = stripos($colors["color_name"], $_POST["search-color"]);
        //если результат не равне лжи то вывидем результат поиска запроса
        if ($search !== false) { ?>
            <option class="dropdown-item" name="<?php echo $colors["color_html"] ?>" style="background:<?php echo $colors["color_html"] ?>;"><?php echo $colors["color_name"]; ?></option>
<?php }
        $i++;
    }
    }else {
        //подключим ncs как был так как запрос пуст
    include $_SERVER['DOCUMENT_ROOT'] . "/modules/ncs.php";
    }
} 

?>