<?php
	switch ($action) {
	  // danh sách sản phẩm
  case 'productList':
    $success = "";
    include "../views/admin/products/product_list.php";
    break;
    // layout product add
  case 'productAdd':
  $alert = "";
    include "../views/admin/products/product_add.php";
    break;
    // product add action
  case 'productAddAction':
    $products = new Products();
    // bắt lỗi và upload hình ảnh
    if(empty($_FILES['fImages1']['name'])){
      $mes = "Ảnh 1 không được để trống";
      $alert = showAlert($mes);
      include "../views/admin/products/product_add.php";
      break;
    }
    if(!empty($_FILES['fImages1']['name'])){
      if( $_FILES['fImages1']['type'] != 'image/jpeg'
        && $_FILES['fImages1']['type'] != 'image/png'
        && $_FILES['fImages1']['type'] != 'image/gif'){

        $mes = "Ảnh 1 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
      if(isset($_FILES['fImages1'])){
        $img = 'one'.'-'.time().'-'.$_FILES['fImages1']['name'];
        $source = $_FILES['fImages1']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
      }
    }

    if(!empty($_FILES['fImages2']['name'])){
      if( $_FILES['fImages2']['type'] != 'image/jpeg'
        && $_FILES['fImages2']['type'] != 'image/png'
        && $_FILES['fImages2']['type'] != 'image/gif'){

        $mes = "Ảnh 2 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
      if(isset($_FILES['fImages2'])){
        $img1 = -'two'.'-'.time().'-'.$_FILES['fImages2']['name'];
        $source = $_FILES['fImages2']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img1;
        move_uploaded_file($source, $target);
      }
    }else {
      $img1 = "";
    }

    if(!empty($_FILES['fImages3']['name'])){
      if( $_FILES['fImages3']['type'] != 'image/jpeg'
        && $_FILES['fImages3']['type'] != 'image/png'
        && $_FILES['fImages3']['type'] != 'image/gif'){

        $mes = "Ảnh 3 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
      if(isset($_FILES['fImages3'])){
        $img2 = 'thee'.'-'.time().'-'.$_FILES['fImages3']['name'];
        $source = $_FILES['fImages3']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img2;
        move_uploaded_file($source, $target);
      }
    }else {
      $img2 = "";
    }
    $name = $_POST['txtName'];
    $price = $_POST['txtPrice'];
    $discount = $_POST['txtDiscount'];
    $currency = $_POST['txtCurrency'];
    $desc = $_POST['txtDesc'];
    $detail = $_POST['txtDetail'];
    $stock = $_POST['txtStock'];
    if($name == "" || $price == "" || $discount == "" || $currency == "" || $desc == "" || $detail == "" || $stock == ""){
       $mes = "Vui lòng nhập đầy đủ thông tin";
        $alert = showAlert($mes);
        include "../views/admin/products/product_add.php";
        break;
    }
    $cate = $_POST['cateId'];
    $feature = $_POST['featureId'];
    $brand = $_POST['brandId'];
    $origin = $_POST['originId'];
    $user = $_SESSION['userId04576'];
    $products -> addProducts($name, $img, $img1, $img2, $price, $discount, $currency, $desc, $detail, $stock, $cate, $feature, $brand, $origin, $user);

    $action = 'productList';
    $mes = 'Thêm sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // layout sửa sản phẩm
  case 'productEdit':
    $id = $_GET['id'];
    $alert = "";
    include "../views/admin/products/product_edit.php";
    break;
    // action sửa sản phẩm
  case 'productEditAction':
    $products = new Products();
    $id = $_POST['prodId'];
    $name = $_POST['txtName'];
   // bắt lỗi và upload hình ảnh
    if(!empty($_FILES['fImages1']['name'])){
      if( $_FILES['fImages1']['type'] != 'image/jpeg'
        && $_FILES['fImages1']['type'] != 'image/png'
        && $_FILES['fImages1']['type'] != 'image/gif'){

        $mes = "Ảnh 1 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages1'])){
        $img = 'one'.'-'.time().'-'.$_FILES['fImages1']['name'];
        $source = $_FILES['fImages1']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
        if(file_exists($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages1'])){
          unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages1']);
        }

      }
    }else{
      $img = $_POST['oldImages1'];
    }

    if(!empty($_FILES['fImages2']['name'])){
      if( $_FILES['fImages2']['type'] != 'image/jpeg'
        && $_FILES['fImages2']['type'] != 'image/png'
        && $_FILES['fImages2']['type'] != 'image/gif'){

        $mes = "Ảnh 2 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages2'])){
        $img1 = -'two'.'-'.time().'-'.$_FILES['fImages2']['name'];
        $source = $_FILES['fImages2']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img1;
        move_uploaded_file($source, $target);
        if(file_exists($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages2'])){
          unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages2']);
        }
      }
    }else{
      $img1 = $_POST['oldImages2'];
    }

    if(!empty($_FILES['fImages3']['name'])){
      if( $_FILES['fImages3']['type'] != 'image/jpeg'
        && $_FILES['fImages3']['type'] != 'image/png'
        && $_FILES['fImages3']['type'] != 'image/gif'){

        $mes = "Ảnh 3 chọn không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/products/product_edit.php";
        break;
    }
      if(isset($_FILES['fImages3'])){
        $img2 = 'thee'.'-'.time().'-'.$_FILES['fImages3']['name'];
        $source = $_FILES['fImages3']['tmp_name'];
        $target = $product_dir_path.DIRECTORY_SEPARATOR.$img2;
        move_uploaded_file($source, $target);
        if(file_exists($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages3'])){
          unlink($product_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImages3']);
        }
      }
    }else{
      $img2 = $_POST['oldImages3'];
    }

    $price = $_POST['txtPrice'];
    $discount = $_POST['txtDiscount'];
    $currency = $_POST['txtCurrency'];
    $desc = $_POST['txtDesc'];
    $detail = $_POST['txtDetail'];
    $stock = $_POST['txtStock'];
    $cate = $_POST['cateId'];
    $feature = $_POST['featureId'];
    $brand = $_POST['brandId'];
    $origin = $_POST['originId'];
    $products -> updateProduct($id, $name, $img, $img1, $img2, $price, $discount, $currency, $desc, $detail, $stock, $cate, $feature, $brand, $origin);

    $action = 'productList';
    $mes = 'Sửa sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // xóa sản phẩm
  case 'productDel':
    $products = new Products();
    $id = $_GET['id'];
    $order= new Order();
    $certif = new Certificates();
    $title = new ShowTitle();
    //xóa các bảng liên quan trước khi xóa sản phẩm
    $order -> delDetailByProduct($id);
    $certif -> delCertificateByProduct($id);
    $title -> delShowTitleByProduct($id);

    $products -> delProduct($id);
    $delImg = $products -> getProductById($id);
    if(file_exists($product_dir_path.DIRECTORY_SEPARATOR.$delImg['product_image'])){
          unlink($product_dir_path.DIRECTORY_SEPARATOR.$delImg['product_image']);
        }
    if(file_exists($product_dir_path.DIRECTORY_SEPARATOR.$delImg['product_image1'])){
          unlink($product_dir_path.DIRECTORY_SEPARATOR.$delImg['product_image1']);
        }
    if(file_exists($product_dir_path.DIRECTORY_SEPARATOR.$delImg['product_image2'])){
          unlink($product_dir_path.DIRECTORY_SEPARATOR.$delImg['product_image2']);
        }
    $action = 'productList';
    $mes = 'Xóa sản phẩm thành công';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
	}
?>