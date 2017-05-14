<?php
	switch ($action) {
	  // danh sách categories
  case 'cateList':
    $success = "";
    include "../views/admin/categories/cate_list.php";
    break;
    // layout thêm categories
  case 'cateAdd':
    $alert = "";
    include "../views/admin/categories/cate_add.php";
    break;
// action thêm categories
  case 'cateAddAction':
      $cate = new Categories();
      $name = $_POST['cateName'];
      $parent = $_POST['parent'];
      if($name == ""){
        $mes = "Vui lòng nhập tên Category";
        $alert = showAlert($mes);
        include "../views/admin/categories/cate_add.php";
        break;
      }

      $cate ->addCategory($name,$parent);
      $mes = "Thêm Categories thành công";
      $action = 'cateList';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;
      // layout sửa categories
  case 'cateEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/categories/cate_edit.php";
    break;
    // action sửa categories
  case 'cateEditAction':
    $cate = new Categories();
    $id = $_POST['cateId'];
    $cateName = $_POST['cateName'];
    $parent = $_POST['parent'];
    if( $cateName == "" ){
      $mes = "Vui lòng nhập tên Categories";
      $alert = showAlert($mes);
      include "../views/admin/categories/cate_edit.php";
      break;
    }
    $cate -> updateCategory($id, $cateName, $parent);
    $mes = "Sửa Categories thành công";
    $action = 'cateList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // xóa categories
  case 'cateDel':
    $id = $_GET['id'];
    $cate = new Categories();
    $order= new Order();
    $product = new Products();
    $certif = new Certificates();
    $title = new ShowTitle();
    $resultProduct = $product -> getProductByCate ($id);
    foreach ($resultProduct as $valueProduct) {
      $order -> delDetailByProduct($valueProduct['product_id']);
      $certif -> delCertificateByProduct($valueProduct['product_id']);
      $title -> delShowTitleByProduct($valueProduct['product_id']);
    }
    $product -> delProductByCate ($id);
    $cate -> delCategory($id);
    $mes = "Xóa Categories thành công";
    $action = 'cateList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
	}
?>