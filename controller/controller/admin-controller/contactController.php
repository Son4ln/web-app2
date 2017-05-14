<?php
  switch ($action) {
	case 'showContact':
	  $alert = "";
	  include "../views/admin/contact/contact_edit.php";
	  break;

	case 'showContactAction':
	  $contact = new contactInfo();
	  $id = $_POST['infoId'];
	  $company_name = $_POST['companyName'];
	  $address = $_POST['address'];
	  $headquarters = $_POST['Headquarters'];
	  $branch = $_POST['branch'];
	  $contact_email = $_POST['mail'];
	  $vietnam_phone = $_POST['vnPhone'];
	  $australia_phone = $_POST['ausPhone'];
	  $fax = $_POST['fax'];
	  if(!empty($_FILES['imgLogo']['name'])){
	  	if( $_FILES['imgLogo']['type'] != 'image/jpeg'
        && $_FILES['imgLogo']['type'] != 'image/png'
        && $_FILES['imgLogo']['type'] != 'image/gif'){
        	$mes = "Ảnh chọn không đúng định dạng (jpg,png,gif)";
        	$alert = showAlert($mes);
        	include "../views/admin/contact/contact_edit.php";
        	break;
        }
	  	if(isset($_FILES['imgLogo'])){
	      $logo_image = time().$_FILES['imgLogo']['name'];
	      $source = $_FILES['imgLogo']['tmp_name'];
	      $target = $logo_dir_path.DIRECTORY_SEPARATOR.$logo_image;
	      move_uploaded_file($source, $target);
	      if(file_exists($logo_dir_path.DIRECTORY_SEPARATOR.$_POST['oldLogo'])){
	      	unlink($logo_dir_path.DIRECTORY_SEPARATOR.$_POST['oldLogo']);
	      }
      	}
	  }else{
      	 $logo_image = $_POST['oldLogo'];
      }
	  $map = $_POST['map'];
	  $contact -> updateContactInfo ($id, $company_name, $address, $headquarters, $branch, $contact_email, $vietnam_phone, $australia_phone, $fax, $logo_image, $map);
	  $action = 'showContact';
      $mes = 'Sửa thông tin thành công';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
	  break;

	case 'listContactFromUser':
	  include "../views/admin/contact/contact_list.php";
	  break;

	case 'delContactFromUser':
	  $id = $_GET['id'];
	  $contact = new contactInfo();
	  $contact -> delContactFromUser($id);
	  $action = 'listContactFromUser';
      $mes = 'Xóa thông tin thành công';
      $typeOfMes = 'alert-success';
      redirect($action,$mes,$typeOfMes);
	  break;
  }
?>