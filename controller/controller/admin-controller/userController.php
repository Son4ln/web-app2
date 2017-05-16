<?php
	switch ($action) {
	  // danh sách user
  case 'userList':
  	include "../views/admin/users/user_list.php";
  	break;
    // thêm user layout
  case 'userAdd':
    $alert = "";
  	include "../views/admin/users/user_add.php";
  	break;
    // thêm user action
  case 'userAddAction':
    $user = new Users();
    $name = $_POST['txtFullName'];
    $username = $_POST['txtUser'];
    $pass = $_POST['txtPass'];
    $rePass = $_POST['txtRePass'];
    $password=md5($username . $pass);
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $address = $_POST['txtAddr'];
    $permis = $_POST['permis'];
    //upload hình ảnh
    if(empty($_FILES['txtAva'])
        || $_FILES['txtAva']['type'] != 'image/jpeg'
        && $_FILES['txtAva']['type'] != 'image/png'
        && $_FILES['txtAva']['type'] != 'image/gif'
        ){
          $mes = 'Vui chọn hình ảnh (jpg,png,gif)';
          $alert = showAlert($mes);
          include "../views/admin/users/user_add.php";
          break;
      }
    if(isset($_FILES['txtAva'])){
        $avat= time().'-'.$_FILES['txtAva']['name'];
        $source=$_FILES['txtAva']['tmp_name'];
        $target=$ava_dir_path.DIRECTORY_SEPARATOR.$avat;
        move_uploaded_file($source, $target);
      }

    //Bắt lỗi
    if (isset($_POST['uploadclick']))
    {
      if($user -> checkUser($username)){
        $mes = 'username đã được sử dụng';
        $alert = showAlert($mes);
        include "../views/admin/users/user_add.php";
        break;
      }
      if($pass != $rePass){
        $mes = 'Xác nhận mật khẩu sai';
        $alert = showAlert($mes);
        include "../views/admin/users/user_add.php";
      }else if ($name == "" || $username == "" || $pass == "" || $email == "" || $phone == "" || $address == "" || $avat == "" || $permis == "")
      {
        $mes = 'Vui lòng nhập đầy đủ thông tin';
        $alert = showAlert($mes);
        include "../views/admin/user_add.php";
      }
      else{
        $mes = "Thêm User thành công";
        $user->addUser($name, $username, $password, $email, $phone, $address, $avat, $permis);
        $action = 'userList';
        $typeOfMes = 'alert-success';
        redirect($action,$mes,$typeOfMes);
      }

    }

    break;
    // sửa user layout
  case 'userEdit':
    $id = $_GET['id'];
    $alert = "";
  	include "../views/admin/users/user_edit.php";
  	break;
    // phân quyền user
  case 'userPermisAction':
    $alert = "";
    $user = new Users();
    $id = $_POST['userID'];
    $permis = $_POST['permis'];
    $user -> permission($id, $permis);
    $mes = "Phân quyền thành công";
    $action = 'userList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // xóa User
  case 'delUser':
    $mes = "Xóa User thành công";
    $user = new Users();
    $id = $_GET['id'];
    $blog = new Blogs();
    $order= new Order();
    $product = new Products();
    $certif = new Certificates();
    $title = new ShowTitle();
    $resultProduct = $product -> getProductByUserId ($id);
    $resultOrderDetail = $order -> getOrderDetailByOrderId ($id);
    foreach ($resultProduct as $valueProduct) {
      $order -> delDetailByProduct($valueProduct['product_id']);
      $certif -> delCertificateByProduct($valueProduct['product_id']);
      $title -> delShowTitleByProduct($valueProduct['product_id']);
    }
    foreach ($resultOrderDetail as $valueDetail) {
      $order -> delDetail($valueDetail['order_id']);
    }
    $order -> delOrderByUser($id);
    $product -> delProductByUser ($id);
    $blog -> delBlogByUser ($id);

    $user -> delUser($id);
    $delImg = $user -> getUserById($id);
    if(file_exists($ava_dir_path.DIRECTORY_SEPARATOR.$delImg['avatar'])){
      unlink($ava_dir_path.DIRECTORY_SEPARATOR.$delImg['avatar']);
    }
    $action = 'userList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
	}
?>