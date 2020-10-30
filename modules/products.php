
<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

$sql = "SELECT * FROM `product` WHERE `id_product` ";
$result = mysqli_query($connect, $sql); //оправляем запрос
$count_products = mysqli_num_rows($result);

for ($i=0; $i < $count_products; $i++) { 

    $products = mysqli_fetch_assoc($result);
?>
            <a class="dropdown-item" href="#"><?php echo $products["product_name"];?></a>
<?php
}    

