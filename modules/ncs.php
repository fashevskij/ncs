<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

$sql = "SELECT * FROM `ncs` WHERE `id` ";
$result = mysqli_query($connect, $sql);
$count_colors = mysqli_num_rows($result);

for ($i=0; $i < $count_colors; $i++) { 
    $colors = mysqli_fetch_assoc($result);
    ?>
    <a class="dropdown-item" href="#"><?php echo $colors["color_name"];?></a>
    <?php
}    


