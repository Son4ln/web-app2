<?php
	switch ($action) {
	  // danh sách blog
  case 'blogList':
    include "../views/admin/blogs/blog_list.php";
    break;
    // sửa blog layout
  case 'blogEdit':
    $alert = "";
    $id = $_GET['id'];
    include "../views/admin/blogs/blog_edit.php";
    break;
    // action sửa blog
  case 'blogEditAction':
    $blog = new Blogs();
    $id = $_POST['blogId'];
    if($_POST['blogTitle'] == ""){
      $mes = "Vui lòng nhập tiêu đề";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_edit.php";
      break;
    }else{
      $title = $_POST['blogTitle'];
    }
    //kiêm tra và upload hình ảnh
    if(!empty($_FILES['featureImg']['name'])){
      if( $_FILES['featureImg']['type'] != 'image/jpeg'
        && $_FILES['featureImg']['type'] != 'image/png'
        && $_FILES['featureImg']['type'] != 'image/gif'){

        $mes = "Ảnh không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/blogs/blog_edit.php";
        break;
      }
      if(isset($_FILES['featureImg'])){
        $img = time().'-'.$_FILES['featureImg']['name'];
        $source = $_FILES['featureImg']['tmp_name'];
        $target = $blog_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
        if(file_exists($blog_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg'])){
          unlink($blog_dir_path.DIRECTORY_SEPARATOR.$_POST['oldImg']);
        }
      }
    }else {
      $img = $_POST['oldImg'];
    }
    if($_POST['desc'] == ""){
      $mes = "Vui lòng nhập mô tả";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_edit.php";
      break;
    }else{
      $desc = $_POST['desc'];
    }

    if ($_POST['contents'] == "") {
      $mes = "Vui lòng nhập nội dung";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_edit.php";
      break;
    }else{
      $content = $_POST['contents'];
    }
    $blog -> updateBlog($id, $title, $img, $desc, $content);

    $mes = "Sửa Blogs thành công";
    $action = 'blogList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // thêm blog
  case 'blogAdd':
    $alert = "";
    include "../views/admin/blogs/blog_add.php";
    break;
    // thêm blog action
  case 'blogAddAction':
    $blog = new Blogs();
    if($_POST['blogTitle'] == ""){
      $mes = "Vui lòng nhập tiêu đề";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_add.php";
      break;
    }else{
      $title = $_POST['blogTitle'];
    }
    //kiểm tra và upload hình ảnh
    if(!empty($_FILES['featureImg']['name'])){
      if( $_FILES['featureImg']['type'] != 'image/jpeg'
        && $_FILES['featureImg']['type'] != 'image/png'
        && $_FILES['featureImg']['type'] != 'image/gif'){

        $mes = "Ảnh không đúng định dạng (jpg,png,gif)";
        $alert = showAlert($mes);
        include "../views/admin/blogs/blog_add.php";
        break;
      }
      if(isset($_FILES['featureImg'])){
        $img = time().'-'.$_FILES['featureImg']['name'];
        $source = $_FILES['featureImg']['tmp_name'];
        $target = $blog_dir_path.DIRECTORY_SEPARATOR.$img;
        move_uploaded_file($source, $target);
      }
    }
    if($_POST['desc'] == ""){
      $mes = "Vui lòng nhập mô tả";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_add.php";
      break;
    }else{
      $desc = $_POST['desc'];
    }

    if ($_POST['contents'] == "") {
      $mes = "Vui lòng nhập nội dung";
      $alert = showAlert($mes);
      include "../views/admin/blogs/blog_add.php";
      break;
    }else{
      $content = $_POST['contents'];
    }
    $datePost = date('Y/m/d');
    $user = $_SESSION['userId04576'];
    $blog -> addBlogs($title, $img, $desc, $content, $datePost, $user);
    $mes = "Thêm Blogs thành công";
    $action = 'blogList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
    // xóa blog
  case 'blogDel':
    $id = $_GET['id'];
    $blog = new Blogs();
    $blog -> delBlog($id);
    $delImg = $blog -> getBlogById($id);
    if(file_exists($blog_dir_path.DIRECTORY_SEPARATOR.$delImg['featured_image'])){
          unlink($blog_dir_path.DIRECTORY_SEPARATOR.$delImg['featured_image']);
        }
    $mes = "Xóa Blogs thành công";
    $action = 'blogList';
    $typeOfMes = 'alert-success';
    redirect($action,$mes,$typeOfMes);
    break;
	}
?>