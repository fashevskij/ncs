<?php
include $_SERVER['DOCUMENT_ROOT']."/configs/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css" >
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
if(isset($_COOKIE["id"])){
    ?>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <form class="form-inline my-lg-0" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="Search NCS Color" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <form class="form-inline my-lg-0" method="POST" name="options">
            <li class="nav-item dropdown">
                <select class="form-control" name='color'>
                <option select>NCS</option>
                <?php include $_SERVER['DOCUMENT_ROOT']."/modules/ncs.php";?>
                </select>
            </li>
            <li class="nav-item dropdown">
                <select class="form-control" name='product'>
                <option select>Products</option>
                <?php include $_SERVER['DOCUMENT_ROOT']."/modules/products.php";?>
                </select>
            </li>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnOptions">OK</button>
        </form>
        </ul>
    </div> 
    <a class="btn btn-outline-success my-2 my-sm-0" href="/modules/exit.php">Exit</a>
    </nav>

    <?php include $_SERVER['DOCUMENT_ROOT']."/parts/recipe.php";?>
    
<?php
}else{
include $_SERVER['DOCUMENT_ROOT']."/parts/authorization.php";
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>