<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";
$sql = "SELECT * FROM `ncs`";//выбераем таблицу с цветами
$result = mysqli_query($connect, $sql);//выполняем щапрос
$count_colors = mysqli_num_rows($result);//получаем число результатов
//пока i меньше количества результатов 
for ($i=0; $i < $count_colors; $i++) { 
    //получаем цвета
    $colors = mysqli_fetch_assoc($result);
    ?>
    <option class="dropdown-item" name="<?php echo $colors["color_html"]?>"
    style="background:<?php echo $colors["color_html"]?>;" value="<?php echo $colors["color_name"];?>"><?php echo $colors["color_name"];?></option>
    <?php
}    


