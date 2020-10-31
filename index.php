<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php
if(isset($_COOKIE["id"])){
    ?>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Главная</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <form class="form-inline my-lg-0" id="search" method="POST" style="margin:10px;">
            <input class="form-control mr-sm-2" type="text" placeholder="Поиск по цветам" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
        <form class="form-inline my-lg-0" style="margin:10px;" method="POST" name="options">
            <li class="nav-item dropdown">
                <select class="form-control" name='color' id="color">
                <option select>Каталог NCS</option>
                <?php include $_SERVER['DOCUMENT_ROOT']."/modules/ncs.php";?>
                </select>
            </li>
            <li class="nav-item dropdown" style="margin:10px;">
                <select class="form-control" name='product'>
                <option select>Продукты</option>
                <?php include $_SERVER['DOCUMENT_ROOT']."/modules/products.php";?>
                </select>
            </li>
            <input type='hidden' value='1' name='packing'>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnOptions">OK</button>
        </form>
        </ul>
    </div> 
    <a class="btn btn-outline-success my-2 my-sm-0" href="/modules/exit.php">Выход</a>
    </nav>
    <div id="recipe" style="font-size:120%;">
        <?php include $_SERVER['DOCUMENT_ROOT']."/parts/recipe.php";?>
    </div>
    <script src="js/recipe.js"></script>
    <script src="js/search.js"></script>
<?php
}else{
    ?>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/parts/authorization.php";
    ?>
    </nav>
<?php
}
?>

</body>
</html>