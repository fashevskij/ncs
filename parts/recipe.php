<?php
//подключаем файл с подключением к БД
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

//если был отправлен POST-запрос 'btnOptions' (нажата кнопка "ОК")
if(isset($_POST['btnOptions'])) {
    //проверяем чтобы отправленые поля были выбраны
    if($_POST['color'] != "Каталог NCS" && $_POST['product'] != "Продукты") {
        //определяем фасовку
        $packing = $_POST['packing'];
        //делаем запрос к БД на выбор цвета соответствующего из запроса
        $sql = "SELECT * FROM `ncs` WHERE `color_name` ='" . $_POST["color"] . "'";
        //выполняем запрос
        $result = mysqli_query($connect, $sql);
        //преобразовываем его в массив
        $color = mysqli_fetch_assoc($result);

        //делаем запрос к БД на выбор id продукта соответствующего запросу
        $sql = "SELECT * FROM `product` WHERE `product_name`='" . $_POST['product'] . "'";
        //выполняем запрос
        $result = mysqli_query($connect, $sql);
        //преобразовываем его в массив
        $id_product = mysqli_fetch_assoc($result);

        //делаем запрос к БД на выбор id базы соответствующей цвету и продукту с запроса
        $sql = "SELECT `id_base` FROM `ncs_recept` WHERE `color_name` ='" . $_POST["color"] . "' AND `id_product`='" . $id_product['id_product'] . "'";
        //выполняем запрос
        $result = mysqli_query($connect, $sql);
        //преобразовываем его в массив
        $id_base = mysqli_fetch_assoc($result);

        //делаем запрос к БД на определение названия базы соответствующей цвету и продукту с запроса
        $sql = "SELECT `name_base` FROM `base` WHERE `id_base`=" . $id_base['id_base'];
        //выполняем запрос
        $result = mysqli_query($connect, $sql);
        //преобразовываем его в массив
        $name_base = mysqli_fetch_assoc($result);
        ?>
        <div class="alert alert-primary" > 
            Цвет: <?php echo $color['color_name']; ?>
            <div class="w-25 position-absolute p-3" 
                style="background-color: <?php echo $color['color_html']; ?>; top: 7px; left: 200px;"></div>
        </div>
        <div class="alert alert-primary">
            Краска: <?php echo $_POST['product']; ?>
        </div>
        <div class="alert alert-primary">
            База: <?php echo $name_base['name_base']; ?>
        </div>
        <div class="alert alert-primary">Рецептура:
        <table class="table-responsive-sm-5 table-bordered table-dark" style="font-size:80%; text-align:center;">
                    <thead>
                        <tr>
                        <th scope="col">Колорант</th>
                        <th scope="col">Унция</th>
                        <th scope="col">Доза</th>
                        <th scope="col">1/2</th>
                        <th scope="col">1/4</th>
                        <th scope="col">Shot</th>
                        <th scope="col">ml</th>
                        </tr>
                    </thead>
            <tbody >
            <?php
            //делаем запрос к БД на выбор рецептуры соответствующей цвету и продукту с запроса
            $sql = "SELECT `id_colorant`, `colorant_value` FROM `ncs_recept_item` WHERE `color_name` ='" . $_POST["color"] . "' AND `id_product`='" . $id_product['id_product'] . "' AND `id_base`='" . $id_base['id_base'] . "'";
            //выполняем запрос
            $result = mysqli_query($connect, $sql);
            //определяем количество колорантов
            $count_colorants = mysqli_num_rows($result);
            $price = 0;

            for ($i=0; $i < $count_colorants; $i++) { 
                //преобразовываем его в массив
                $recipe = mysqli_fetch_assoc($result);
                //делаем запрос к БД на определение названия колоранта соответствующей цвету и продукту с запроса
                $sql1 = "SELECT * FROM `colorant` WHERE `id_colorant`=" . $recipe['id_colorant'];
                //выполняем запрос
                $result1 = mysqli_query($connect, $sql1);
                //преобразовываем его в массив
                $colorant = mysqli_fetch_assoc($result1);
                //получим переменные для отображения
                $colorant_ml = round(($recipe['colorant_value']*$packing/6.5), 1);
                $price = $price + ($colorant['price']*$colorant_ml);
                $shot = round(($colorant_ml / 0.154),1);
                $one = 0;
                $two = 0;
                $doz = 0;
                $uncya= 0;
                if ($shot >= 192 ){
                    //получаем остаток от деления
                    $ost = round(($shot%192)."\n",1);
                    //получаем количество делений
                    $uncya = intdiv($shot,192 );
                }else{
                    $ost = $shot;
                }
                if($ost >= 2 ){
                    $ost2 = round(($ost%2)."\n",1);
                    $doz = intdiv($ost,2);
                }  
                if(isset($ost2) && $ost2 >= 1){
                    $ost3 = ($ost2/1)."\n";
                    $two = 1;
                }
                if(isset($ost3) && $ost3 >= 0.5){
                    $one = 1;
                }              
                ?>
                
                    <td><?php echo $colorant['name_colorant'];?></td>
                    <td><?php echo $uncya;?></td>
                    <td><?php echo $doz;?></td>
                    <td><?php echo $two;?></td>
                    <td><?php echo $one;?></td>
                    <td><?php echo $shot;?></td>
                    <td><?php echo $colorant_ml;?></td>
                    
                    <div 
                    style="background-color: <?php echo $colorant['color_html']; ?>;top: 7px; left: 200px;"></div>
                    </tr>
                
            <?php
            
            }
            ?>
            </tbody>
            </table>
        </div>

        <div class="alert alert-primary">
            Выбор фасовки:
            <div class="form-check form-check-inline">
                <input class="form-check-input" id='packing' type="radio" onclick="checkFluency(this, '<?php echo $color['color_name']; ?>', '<?php echo $_POST['product']; ?>')" value="1" checked>
                <label class="form-check-label" for="inlineRadio1">1.4 кг</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id='packing' type="radio" onclick="checkFluency(this, '<?php echo $color['color_name']; ?>', '<?php echo $_POST['product']; ?>')" value="3">
                <label class="form-check-label" for="inlineRadio2">4.2 кг</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id='packing' type="radio" onclick="checkFluency(this, '<?php echo $color['color_name']; ?>', '<?php echo $_POST['product']; ?>')" value="5">
                <label class="form-check-label" for="inlineRadio2">7 кг</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id='packing' type="radio" onclick="checkFluency(this, '<?php echo $color['color_name']; ?>', '<?php echo $_POST['product']; ?>')" value="10">
                <label class="form-check-label" for="inlineRadio2">14 кг</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id='packing' type="radio" onclick="checkFluency(this, '<?php echo $color['color_name']; ?>', '<?php echo $_POST['product']; ?>')" value="14.3">
                <label class="form-check-label" for="inlineRadio2">20 кг</label>
            </div>
        </div>

        <div class="alert alert-primary">
            Цена: <?php echo $price . " грн"?>
        </div>
    <?php
    } else {
        echo "Выбирете все параметры для подсчета рецептур";
    }
} ?>