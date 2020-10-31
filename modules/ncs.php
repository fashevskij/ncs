<?php

//выбераем таблицу с цветами
$sql = "SELECT * FROM `ncs`";
//выполняем запрос
$result = mysqli_query($connect, $sql);
//получаем число результатов
$count_colors = mysqli_num_rows($result);
//пока i меньше количества результатов 
for ($i=0; $i < $count_colors; $i++) { 
    //получаем цвета
    $colors = mysqli_fetch_assoc($result);
    ?>
    <option class="dropdown-item" style="background:<?php echo $colors["color_html"]?>;">
        <?php echo $colors["color_name"];?>
    </option>
    <?php
}
?>