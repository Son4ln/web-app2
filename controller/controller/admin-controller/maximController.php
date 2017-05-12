<?php
	switch ($action) {
	   // danh sách châm ngôn
  case 'listMaxim':
    include "../views/admin/maxim/maxim_list.php";
    break;
    //thêm châm ngôn layout
  case 'addMaxim':
    $alert = "";
    include "../views/admin/maxim/maxim_add.php";
    break;
    //thêm trâm ngôn action
  case 'addMaximAction':
    $maxim = new Maxim();
    $content = $_POST['mContent'];
    $background = $_POST['mbackground'];
    if( $content == "" || $background == "" ){
      $mes = "Vui lòng nhập đầy đủ nội dung";
      $alert = showAlert($mes);
      include "../views/admin/maxim/maxim_add.php";
      break;
    }
    $maxim -> addMaxim($content, $background);
    $mes = "Thêm châm ngôn thành công";
    $action = 'listMaxim';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    //sửa châm ngôn layout
   case 'editMaxim':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/maxim/maxim_edit.php";
    break;
    //sửa châm ngôn action
  case 'editMaximAction':
    $maxim = new Maxim();
    $id = $_POST['mId'];
    $content = $_POST['mContent'];
    $background = $_POST['mbackground'];
    if($content == "" || $background = ""){
      $mes = "Vui lòng nhập đầy đủ nội dung";
      $alert = showAlert($mes);
      include "../views/admin/maxim/maxim_edit.php";
      break;
    }
    $maxim -> updateMaxim($id, $content , $background);
    $mes = "Sửa châm ngôn thành công";
    $action = 'listMaxim';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    //xóa châm ngôn
  case 'delMaxim':
    $maxim = new Maxim();
    $id = $_GET['id'];
    $maxim -> delMaxim($id);
    $mes = "Xóa châm ngôn thành công";
    $action = 'listMaxim';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
	}
?>