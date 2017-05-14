<?php
	switch ($action) {
		//danh sách
	  case 'certifList':
	  	include "../views/admin/certificates/certifi_list.php";
	  	break;
	  	//thêm chứng nhận
	  case 'certifAdd':
	  	$alert = "";
	  	include "../views/admin/certificates/certifi_add.php";
	  	break;
	  	//thêm chứng nhận action
	  case 'certifAddAction':
	  	$certif = new Certificates();
	  	if($_POST['certifName'] == ""){
	  		$mes = "Vui lòng nhập tên chứng nhận";
	  		$alert = showAlert($mes);
	  		include "../views/admin/certificates/certifi_add.php";
	  		break;
	  	}else{
	  		$name = $_POST['certifName'];
	  	}
	  	//bắt lỗi và upload hình ảnh
	  	if(!empty($_FILES['certifImg']['name'])){
	  	  if(empty($_FILES['certifImg'])
            || $_FILES['certifImg']['type'] != 'image/jpeg'
            && $_FILES['certifImg']['type'] != 'image/png'
            && $_FILES['certifImg']['type'] != 'image/gif'
        ){
	        $mes = "Vui lòng chọn hình ảnh (jpg, png, gif)";
	        $alert = showAlert($mes);
	        include "../views/admin/certificates/certifi_add.php";
	        break;
        }
	  	  if(isset($_FILES['certifImg'])){
            $img = time().'-'.$_FILES['certifImg']['name'];
            $source = $_FILES['certifImg']['tmp_name'];
            $target = $certif_dir_path.DIRECTORY_SEPARATOR.$img;
            move_uploaded_file($source, $target);
          }
	  	}
	  	$certif -> addCertificate($name, $img);
	  	$mes = "Thêm chứng nhận thành công";
	    $action = 'certifList';
	    $typeOfMes = 'alert-success';
	    redirect($action,$mes,$typeOfMes);
	  	break;
	  	// sửa chứng nhận
	  case 'certifEdit':
	  	$alert = "";
	  	$id = $_GET['id'];
	  	include "../views/admin/certificates/certifi_edit.php";
	  	break;
	  	//sửa chứng nhận action
	  case 'certifEditAction':
	  	$certif = new Certificates();
	  	$id = $_POST['certifId'];
	  	if($_POST['certifName'] == ""){
	  	  $mes = "Vui lòng nhập tên chứng nhận";
	  	  $alert = showAlert($mes);
	  	  include "../views/admin/certificates/certifi_edit.php";
	  	  break;
	  	}else{
	  	  $name = $_POST['certifName'];
	  	}
	  	// bắt lỗi và upload
	  	if(!empty($_FILES['certifImg']['name'])){
	  	  if(
            $_FILES['certifImg']['type'] != 'image/jpeg'
            && $_FILES['certifImg']['type'] != 'image/png'
            && $_FILES['certifImg']['type'] != 'image/gif'
          ){
	        $mes = "Vui lòng chọn hình ảnh (jpg, png, gif)";
	        $alert = showAlert($mes);
	        include "../views/admin/certificates/certifi_edit.php";
	        break;
          }

 		  if(isset($_FILES['certifImg'])){
            $img = time().'-'.$_FILES['certifImg']['name'];
            $source = $_FILES['certifImg']['tmp_name'];
            $target = $certif_dir_path.DIRECTORY_SEPARATOR.$img;
            move_uploaded_file($source, $target);
            //xóa hình ảnh
            if(file_exists($certif_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg'])){
            	unlink($certif_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg']);
            }
          }
	  	}else{
	  	  $img = $_POST['oldImg'];
	  	}
	  	$certif -> updateCertificate ($id, $name, $img);
	  	$mes = "Sửa chứng nhận thành công";
	    $action = 'certifList';
	    $typeOfMes = 'alert-success';
	    redirect($action,$mes,$typeOfMes);
	  	break;
	  	//xóa chứng nhận
	  case 'certifDel':
	  	$id = $_GET['id'];
	  	$certif = new Certificates();
	  	$certif -> delCertificateByCertificateId ($id);
	  	$certif -> delCertificate($id);
	  	$delImg = $certif -> getCertificateById($id);
	  	if( file_exists($certif_dir_path.DIRECTORY_SEPARATOR.$delImg['certificate_image'])){
	  		unlink($certif_dir_path.DIRECTORY_SEPARATOR.$delImg['certificate_image']);
	  	}

	  	$mes = "Xóa chứng nhận thành công";
	    $action = 'certifList';
	    $typeOfMes = 'alert-success';
	    redirect($action,$mes,$typeOfMes);
	  	break;
	  	// thêm chứng nhấnh vào sản phẩm layout
	  case 'addCertifToProduct':
	  	$alert = "";

	  	include "../views/admin/certificates/add_certifi_to_product.php";
	  	break;
	  	// thêm chứng nhấnh vào sản phẩm action
	  case 'addCertifToProductAction':
	  	$certif = new Certificates();
	  	if($_POST['prodId'] == ""){
	  	  $mes = "Vui lòng chọn sản phẩm";
	      $alert = showAlert($mes);
	      include "../views/admin/certificates/add_certifi_to_product.php";
	      break;
	  	}else{
	  	  $product = $_POST['prodId'];
	  	}

	  	$certificate = $_POST['certifId'];
	  	$certif -> addCertificateToProduct ($product, $certificate);
	  	$mes = "Thêm chứng nhận vào sản phẩm thành công";
	    $action = 'addCertifToProduct';
	    $typeOfMes = 'alert-success';
	    redirect($action,$mes,$typeOfMes);
	    break;
	    // danh sách sản phẩm và chứng nhận
	  case 'certificateAndProductList':
	  	include "../views/admin/certificates/certificate_to_products_list.php";
	    break;

	  case 'certificateAndProductDel':
	  	$id = $_GET['id'];
	  	$certif = new Certificates();
	  	$certif -> delCertificateToProduct($id);
	  	$mes = "Xóa chứng nhận đi kèm sản phẩm thành công";
	    $action = 'certificateAndProductList';
	    $typeOfMes = 'alert-success';
	    redirect($action,$mes,$typeOfMes);
	    break;

	  case 'certificateAndProductEdit':
	  	$id = $_GET['id'];
	  	$alert = "";
	  	include "../views/admin/certificates/edit_certifi_to_product.php";
	    break;

	  case 'certificateAndProductEditAction':
	    $certif = new Certificates();
	    $id = $_POST['showId'];
	    $product = $_POST['prodId'];
	  	$certificate = $_POST['certifId'];
	  	$certif -> updateCertificatesAndProducts($id, $product, $certificate);
	  	$mes = "Sửa chứng nhận đi kèm sản phẩm thành công";
	    $action = 'certificateAndProductList';
	    $typeOfMes = 'alert-success';
	    redirect($action,$mes,$typeOfMes);
	    break;
	}
?>