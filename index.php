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

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div style="display:none" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
        <form class="form-inline my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search NCS Color" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            NCS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php include $_SERVER['DOCUMENT_ROOT']."/modules/ncs.php";?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Продукт
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php include $_SERVER['DOCUMENT_ROOT']."/modules/products.php";?>
            </div>
        </li>
        </ul>
    </div> 
    <?php include $_SERVER['DOCUMENT_ROOT']."/modules/authorization.php";?>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/authorization.js"></script>
</body>
</html>