<?php
switch ($action){
  case "admin":
    include "../views/admin/home.php";
    break;
}
include "../controller/controller/admin-controller/brandController.php";
include "../controller/controller/admin-controller/userController.php";
include "../controller/controller/admin-controller/bannerController.php";
include "../controller/controller/admin-controller/categoryController.php";
include "../controller/controller/admin-controller/productController.php";
include "../controller/controller/admin-controller/blogController.php";
include "../controller/controller/admin-controller/maximController.php";
include "../controller/controller/admin-controller/certificatesController.php";
?>