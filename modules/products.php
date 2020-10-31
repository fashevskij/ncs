<?php
//создаем запрос
$sql = "SELECT * FROM `product`";
//отправляем запрос
$result = mysqli_query($connect, $sql);
//получаем число резултатов
$count_products = mysqli_num_rows($result);
//пока число результатов больше i
for ($i=0; $i < $count_products; $i++) { 
    //получаем найденые результаты
    $products = mysqli_fetch_assoc($result);
?>
     <option class="dropdown-item"><?php echo $products["product_name"];?></option>
<?php
}
?>