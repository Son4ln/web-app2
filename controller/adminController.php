<?php
if(isset($_SESSION['username04516']) && $_SESSION['permission04516'] != 2){
	switch ($action){
  case "admin":
    include "../views/admin/home.php";
    break;
}
	if($_SESSION['permission04516'] == 0){
		include "../controller/controller/admin-controller/userController.php";
	}else if($_SESSION['permission04516'] != 0 && $action == "userList"){
		echo "Bạn không có quyền thực hiện hành động này";
	}
include "../controller/controller/admin-controller/brandController.php";
include "../controller/controller/admin-controller/bannerController.php";
include "../controller/controller/admin-controller/categoryController.php";
include "../controller/controller/admin-controller/productController.php";
include "../controller/controller/admin-controller/blogController.php";
include "../controller/controller/admin-controller/maximController.php";
include "../controller/controller/admin-controller/certificatesController.php";
include "../controller/controller/admin-controller/orderController.php";
include "../controller/controller/admin-controller/contactController.php";
include "../controller/controller/admin-controller/featureController.php";
include "../controller/controller/admin-controller/titleController.php";
}else if(!isset($_SESSION['username04516']) && !isset($_SESSION['permission04516']) && $action == "admin"){
	header("Location:./mainController.php");
}
?>