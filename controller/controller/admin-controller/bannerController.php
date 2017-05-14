<?php
	switch ($action) {
	  // danh sách banner
  case 'bannerList':
    include "../views/admin/banner/banner_list.php";
    break;
    // thêm banner layout
  case 'bannerAdd':
    $alert = "";
    include "../views/admin/banner/banner_add.php";
    break;
    // thêm banner action
  case 'bannerAddAction':
      $slider = new sliderShow();
      // bắt lỗi và upload hình ảnh
      if(empty($_FILES['bImages'])
          || $_FILES['bImages']['type'] != 'image/jpeg'
        && $_FILES['bImages']['type'] != 'image/png'
        && $_FILES['bImages']['type'] != 'image/gif'
        ){
        $mes = "Vui lòng chọn hình ảnh (jpg, png, gif)";
        $alert = showAlert($mes);
        include "../views/admin/banner/banner_add.php";
        break;
      }
      if(isset($_FILES['bImages'])){
        $img = time().'-'.$_FILES['bImages']['name'];
        $source = $_FILES['bImages']['tmp_name'];
        $target = $banner_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
      }
      $link = $_POST['bLink'];
      if($_POST['bLink'] == ""){
        $mes = "Vui lòng nhập đường dẫn";
        $alert = showAlert($mes);
        include "../views/admin/banner/banner_add.php";
        break;
      }
      $slider -> addSlideShow($img, $link);
      $mes = "Thêm Banner thành công";
      $action = 'bannerList';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
      break;
      //Sửa banner layout
  case 'bannerEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/banner/banner_edit.php";
    break;
    //sửa banner action
  case 'bannerEditAction':
    $slider = new sliderShow();
    $id = $_POST['bId'];
    //bắt lỗi và upload hình ảnh
    if(!empty($_FILES['bImages']['name'])){
      if(
        $_FILES['bImages']['type'] != 'image/jpeg'
        && $_FILES['bImages']['type'] != 'image/png'
        && $_FILES['bImages']['type'] != 'image/gif'
        ){
        $mes = "Vui lòng chọn hình ảnh (jpg, png, gif)";
        $alert = showAlert($mes);
        include "../views/admin/banner/banner_add.php";
        break;
      }
      if(isset($_FILES['bImages'])){
        $img = time().'-'.$_FILES['bImages']['name'];
        $source = $_FILES['bImages']['tmp_name'];
        $target = $banner_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
        if(file_exists($banner_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg'])){
          unlink($banner_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg']);
        }

      }
    }else{
      $img = $_POST['oldImg'];
    }
    $link = $_POST['bLink'];
    if($_POST['bLink'] == ""){
      $mes = "Vui lòng nhập link";
      $alert = showAlert($mes);
      include "../views/admin/banner/banner_edit.php";
      break;
    }
    $slider -> updateSlideShow($id, $img, $link);
    $mes = "Sửa Banner thành công";
    $action = 'bannerList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    //xóa banner
  case 'bannerdel':
    $id = $_GET['id'];
    $slider = new sliderShow();
    $slider -> delSlideShow($id);
    $delImg = $slider -> getSlideShowById($id);
    if(file_exists($banner_dir_path.DIRECTORY_SEPARATOR.$delImg['slide_image'])){
          unlink($banner_dir_path.DIRECTORY_SEPARATOR.$delImg['slide_image']);
        }
    $mes = "Xóa Banner thành công";
    $action = 'bannerList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
	}
?>