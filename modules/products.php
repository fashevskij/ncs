<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

$sql = "SELECT * FROM `product` WHERE `id_product` ";//создаем запрос
$result = mysqli_query($connect, $sql); //оправляем запрос
$count_products = mysqli_num_rows($result);//получаем число резултатов
//пока число результатов больше i
for ($i=0; $i < $count_products; $i++) { 
    //получаем результаты найденые
    $products = mysqli_fetch_assoc($result);
?>
     <option class="dropdown-item" ><?php echo $products["product_name"];?></option>
<?php
}    

