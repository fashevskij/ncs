<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
          integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
          crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
        crossorigin="anonymous">
        <link href="style/style.css" rel="stylesheet" >
    <title>Document</title>
</head>

<body>
<?php
if(isset($_COOKIE["id"])){
    ?>
  <nav class="navbar navbar-dark bg-dark row justify-content-evenly">
    <div class="bg-dark col-10 m-3">
      <a class="navbar-brand" href="/">Главная</a>
      <a class="btn btn-outline-success" href="/modules/exit.php">Выход</a>
    </div>
  </nav>

  <div class="container">
    <div class="row m-3">
        <ul class="navbar-nav mr-auto">
        <form class="form-inline my-lg-0 col-12" id="search" method="POST">
            <input class="form-control mr-sm-2  m-3" type="text" placeholder="Поиск по цветам" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0  m-3" type="submit">Поиск</button>
        </form>
          <br>
        <form class="form-inline  col-12" method="POST" name="options">
            <li class="nav-item dropdown ">
                <select class="form-control m-3" name='color' id="color">
                <option select>Каталог NCS</option>
                <?php include $_SERVER['DOCUMENT_ROOT']."/modules/ncs.php";?>
                </select>
            </li>
            <li class="nav-item dropdown ">
                <select class="form-control m-3" name='product'>
                <option select>Продукты</option>
                <?php include $_SERVER['DOCUMENT_ROOT']."/modules/products.php";?>
                </select>
            </li>
            <input type='hidden' value='1' name='packing'>
            <button class="btn btn-outline-success my-2 my-sm-0  m-3" type="submit" name="btnOptions">OK</button>
        </form>
        </ul>
    </div>

    <div class="recipe-item" id="recipe">
        <?php include $_SERVER['DOCUMENT_ROOT']."/parts/recipe.php";?>
    </div>
    <script src="js/recipe.js"></script>
    <script src="js/search.js"></script>
  </div>
<?php
}else{
    ?>
  <div class="container col-md-3 mt-5">
    <?php
    include $_SERVER['DOCUMENT_ROOT']."/parts/authorization.php";
    ?>
  </div>
<?php
}
?>

</body>
</html>
