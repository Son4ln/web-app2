<?php
	switch ($action) {
	      //danh sách brand
  case 'brandList':
    include "../views/admin/brand/brand_list.php";
    break;
    // layout band Add
  case 'brandAdd':
    $alert = "";
    include "../views/admin/brand/brand_add.php";
    break;
    // Brand delete
  case 'brandDel':
    $mes = "Xóa Brand thành công";
    $id = $_GET['id'];
    $brand = new Brands();
    $order= new Order();
    $product = new Products();
    $certif = new Certificates();
    $title = new ShowTitle();
    $resultProduct = $product -> getProductByBrandId ($id);
    foreach ($resultProduct as $valueProduct) {
      $order -> delDetailByProduct($valueProduct['product_id']);
      $certif -> delCertificateByProduct($valueProduct['product_id']);
      $title -> delShowTitleByProduct($valueProduct['product_id']);
    }
    $product -> delProductByBrandId ($id);
    $brand -> delBrand($id);
    $delImg = $brand -> getBrandById($id);

    if(file_exists($brand_dir.DIRECTORY_SEPARATOR.$delImg['brand_image'])){
      unlink($brand_dir.DIRECTORY_SEPARATOR.$delImg['brand_image']);
    }
    $mes = "Xóa Brand thành công";
    $action = 'brandList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // Brand add action
  case 'brandAddAction':
    $brand = new Brands();
    $brandName = $_POST['brandName'];
    // kiểm tra và upload hình ảnh
    if (empty($_FILES['brandImg'])
        || $_FILES['brandImg']['type'] != 'image/jpeg'
        && $_FILES['brandImg']['type'] != 'image/png'
        && $_FILES['brandImg']['type'] != 'image/gif')
      {
        $mes = "Vui lòng chọn hình ảnh (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_add.php";
        break;
    }
    if(isset($_FILES['brandImg'])){
        $brandImg= time().'-'.$_FILES['brandImg']['name'];
        $source=$_FILES['brandImg']['tmp_name'];
        $target=$brand_dir.DIRECTORY_SEPARATOR.$brandImg;
        move_uploaded_file($source, $target);
      }
    if(isset($_POST['brandUpload'])){
      if( $brandName == "" ){
        $mes = "Vui lòng nhập Brand Name";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_add.php";
        break;
      }
      else {
        $brand -> addBrands($brandName, $brandImg);
        $mes = 'Thêm Brand thành công';
        $action = 'brandList';
        $typeOfMes = 'alert-success';
        redirect($action,$mes,$typeOfMes);
      }
    }
    break;
    // Sửa brand layout
  case 'brandEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/brand/brand_edit.php";
    break;
    // Sửa brand action
  case 'brandEditAction':
    $brand = new Brands();
    $id = $_POST['brandId'];
    $brandName = $_POST['brandName'];
    // kiểm tra và upload hình ảnh
    if(!empty($_FILES['brandImg']['name'])){
      if (
         $_FILES['brandImg']['type'] != 'image/jpeg'
        && $_FILES['brandImg']['type'] != 'image/png'
        && $_FILES['brandImg']['type'] != 'image/gif'
        )
      {
        $mes = "Vui lòng chọn hình ảnh (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_add.php";
        break;
    }
     if(isset($_FILES['brandImg'])){
        $brandImg= time().'-'.$_FILES['brandImg']['name'];
        $source=$_FILES['brandImg']['tmp_name'];
        $target=$brand_dir.DIRECTORY_SEPARATOR.$brandImg;
        move_uploaded_file($source, $target);
        if(file_exists($brand_dir.DIRECTORY_SEPARATOR.$_POST['oldImg'])){
          unlink($brand_dir.DIRECTORY_SEPARATOR.$_POST['oldImg']);
        }

      }
    }else{
      $brandImg = $_POST['oldImg'];
    }

     if($_POST['brandName'] == ""){
        $mes = "Vui lòng nhập tên Brand";
        $alert = showAlert($mes);
        include "../views/admin/brand/brand_edit.php";
     }
     else
     {
      $brand -> updateBrand($id, $brandName, $brandImg);
      $mes = "Sửa Brand thành công";
      $action = 'brandList';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
     }
     break;
	}
?>