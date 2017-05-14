<?php
  switch ($action) {
  	case 'listTitle':
      include "../views/admin/title/title_list.php";
  	  break;

  	case 'addTitle':
      $alert = "";
  	  include "../views/admin/title/title_add.php";
  	  break;

  	case 'addTitleAction':
      $title = new Titles();
      if($_POST['tName'] == ""){
      	$mes = "Vui lòng nhập tên title";
      	$alert = showAlert($mes);
  	    include "../views/admin/title/title_add.php";
  	    break;
      }else{
      	$name = $_POST['tName'];
      }
      $icon = null;
      $status = $_POST['status'];
      $title -> addTitle ($name, $icon, $status);
      $mes = "Đã thêm title";
      $action = 'listTitle';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
  	  break;

  	case 'editTitle':
  	  $alert = "";
  	  $id = $_GET['id'];
  	  include "../views/admin/title/title_edit.php";
  	  break;

  	case 'editTitleAction':
      $title = new Titles();
      $id = $_POST['tId'];
      $name = $_POST['tName'];
      $icon = null;
      $status = 0;
      $title -> updateTitle ($id, $name, $icon, $status);
      $mes = "Đã sửa title";
      $action = 'listTitle';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
  	  break;

  	case 'delTitle':
      $id = $_GET['id'];
      $title = new Titles();
      $title -> delTitle($id);
      $mes = "Đã xóa title";
      $action = 'listTitle';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
  	  break;

  	case 'updateTitleStatus':
  	  $title = new Titles();
  	  $id = $_GET['id'];
  	  $status = $_GET['status'];
  	  $title -> updateTitleStatus ($id,$status);
  	  $mes = "Đã cập nhập trạng thái";
      $action = 'listTitle';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
  	  break;

  	case 'showListProduct':
  	  $id = $_GET['id'];
  	  include "../views/admin/title/show_list_product.php";
  	  break;

  	case 'delProductInTitle':
  	  $id = $_GET['id'];
  	  $showId = $_GET['showId'];
  	  $title = new Titles();
  	  $title -> delTitleInProduct($showId);
  	  $mes = "Đã xóa sản phẩm khỏi title";
      $action = "showListProduct&id=$id";
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
  	  break;

  	case 'addProductToTitle':
  		$alert = "";
  		$number = 1;
  	  include "../views/admin/title/add_product_to_title.php";
  	  break;

  	case 'numberToLoopTitle':
      $alert = "";
      $number = $_POST['numberToLoop'];
	  include "../views/admin/title/add_product_to_title.php";
  	  break;

  	case 'addProductToTitleAction':
  	  $title = new Titles();

  	  foreach ($_POST['productId'] as $val) {
  	  	$titleId = $_GET['id'];
  	    $product = $val;
  	    $title -> addProductTotitle($titleId, $product);
  	    $mes = "Đã thêm sản phẩm vào title";
        $action = "showListProduct&id=$titleId";
        $typeOfMes = 'alert-success';
        redirect($action,$mes,$typeOfMes);
  	  }

  	  break;
  }
?>