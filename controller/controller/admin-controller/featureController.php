<?php
  switch ($action) {
	case 'listFeature':
	  include "../views/admin/feature/feature_list.php";
      break;

    case 'addFeature':
      $alert = "";
      include "../views/admin/feature/feature_add.php";
      break;

    case 'addFeatureAction':
      $feature = new Features();
      if($_POST['fName'] == ""){
      	$mes = "Vui lòng nhập tên faeture";
      	$alert = showAlert($mes);
      	include "../views/admin/feature/feature_add.php";
      	break;
      }else{
      	$name = $_POST['fName'];
      }

      $feature -> addFeature ($name);
      $mes = "Thêm feature thành công";
	  $action = 'listFeature';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;

    case 'editFeature':
      $alert = "";
      $id = $_GET['id'];
      include "../views/admin/feature/feature_edit.php";
      break;

    case 'editFeatureAction':
      $id = $_POST['fId'];
      $name = $_POST['fName'];
      $feature = new Features();
      $feature -> updateFeature ($id, $name);
      $mes = "Sửa feature thành công";
	  $action = 'listFeature';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;
      break;

    case 'delFeature':
      $id = $_GET['id'];
      $feature = new Features();

      $order= new Order();
      $product = new Products();
      $certif = new Certificates();
      $title = new ShowTitle();
      $resultProduct = $product -> getProductByFeature ($id);
      foreach ($resultProduct as $valueProduct) {
        $order -> delDetailByProduct($valueProduct['product_id']);
        $certif -> delCertificateByProduct($valueProduct['product_id']);
        $title -> delShowTitleByProduct($valueProduct['product_id']);
      }
      $product -> delProductByFeature ($id);

      $feature -> delFeature($id);
      $mes = "Xóa feature thành công";
	   $action = 'listFeature';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;
  }
?>