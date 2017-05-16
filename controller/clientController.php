<?php
	// Khởi tạo session
    session_start();
    $_SESSION['messages'] ="";

	// Tạo mảng thông tin về giỏ hàng
    if(!isset($_SESSION['cartview04516'])){
        $_SESSION['cartview04516'] = array();
	}

	// upload image
    $image_dir = '../controller/public/client/images/user-avatar/';
    $image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

	switch($action)
    {
		//Trang chủ
        case "home":
            include '../views/client/home.php';
            break;

		//Tim kiếm
        case "search":
			if (empty($_POST['search'])) {
				$_SESSION['messages'] = "Please enter the data you want to search.";
				include '../views/client/search.php';
					break;
			} else {
				$search = addslashes($_POST['search']);
				include '../views/client/search.php';
				break;
			}

		//Trang giới thiệu
        case "about":
            $action="about";
            include '../views/client/about.php';
            break;

		//Trang tin tức
		case "blog":
            $action = "blog";
            include '../views/client/blog.php';
            break;

		//Trang chi tiết tin tức
		case "viewBlog":
            $action="viewBlog";
			$client_id = $_GET['id'];
            include '../views/client/detail_blog.php';
            break;

		//Trang thương hiệu
		case "brand":
            $action = "brand";
            include '../views/client/brand.php';
            break;

		//Trang liên hệ
		case "contact":
            $action = "contact";
            include '../views/client/contact.php';
            break;

		// Trang sản phẩm
		case "product":
            $action = "product";
			if(isset($_GET['brand'])){
				$client_brand = $_GET['brand'];
			}
			if(isset($_GET['feature'])){
				$client_feature = $_GET['feature'];
			}
			if(isset($_GET['origin'])){
				$client_origin = $_GET['origin'];
			}
			if(isset($_GET['all'])){
				$all = $_GET['all'];
			}
            include '../views/client/product.php';
            break;
		case "category":
            $action = "category";
			$client_id = $_GET['id'];
            include '../views/client/product.php';
            break;
		case "detailBrandCate":
            $action = "detailBrandCate";
			$client_id = $_GET['id'];
			$client_brand = $_GET['brand'];
			$all = $_GET['all'];
            include '../views/client/product.php';
            break;
		case "detailFeatureCate":
            $action = "detailFeatureCate";
			$client_id = $_GET['id'];
			$client_feature = $_GET['feature'];
			$all = $_GET['all'];
            include '../views/client/product.php';
            break;
		case "detailOriginCate":
            $action = "detailOriginCate";
			$client_id = $_GET['id'];
			$client_origin = $_GET['origin'];
			$all = $_GET['all'];
            include '../views/client/product.php';
            break;

		case "viewAllProduct":
            $action = "viewAllProduct";
			$client_title = $_GET['id'];
			if(isset($_GET['brand'])){
				$client_brand = $_GET['brand'];
			}
			if(isset($_GET['feature'])){
				$client_feature = $_GET['feature'];
			}
			if(isset($_GET['origin'])){
				$client_origin = $_GET['origin'];
			}
			if(isset($_GET['all'])){
				$all = $_GET['all'];
			}
            include '../views/client/product.php';
            break;

		//Trang chi tiết sản phẩm
		case "viewProduct":
            $action="viewProduct";
			$client_id = $_GET['id'];
            include '../views/client/detail_product.php';
            break;


		//Trang đăng nhập
		case "login":
            $action = "login";
            include '../views/client/login.php';
            break;

		//Trang đăng ký
		case "register":
            $action = "register";
            include '../views/client/register.php';
            break;

		//Trang đăng xuất
		case "logout":
            $action = "logout";
            include '../views/client/logout.php';
            break;

		//Quên mật khẩu
        case "forgot_password":
            $action = 'forgot_password';
            include "../views/client/forgot_password.php";
            break;
        //Hành động khi quên password
        case "login_forgot_password":
            $action = "login_forgot_password";
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $customer = new Users();
            if ($username=="" || $user_email=="")
            {
                // Tạo mặc định biến Session cho người dùng sau khi đăng nhập
                $_SESSION['messages'] = "Please enter username and email!";
                include "../views/client/forgot_password.php";
                break;
            }
            else
            {
                if($customer->checkInfo($username, $user_email))
                {
                   $result = $customer->checkPassword($username, $user_email);
                   $pw  = $result[0];
                   try {
                        send_email_forgot($username, $user_email, $pw);
                        $_SESSION['messages'] = "Please check your email for a new password.";
                        $messages = $_SESSION['messages'];
                        if ($customer->is_valid_admin_login($username, $pw)) {
                            $password1 =  $pw;
                            $password1_md5 = md5($username. $password1);
                            $customer->updatePassword($username,$password1_md5);
                            $action="login";
                            include "../views/client/login.php";
                        }else {
                            $_SESSION['messages'] = "Sorry, the process of recovering your password has failed! Please re-enter.";
                            include "../views/client/forgot_password.php";
                        }
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                        $_SESSION['messages'] = "Sorry, the process of sending your password failed! Please re-enter.";
                        include "../views/client/forgot_password.php";
                    }
                    break;
                }else{
                    $_SESSION['messages'] = "Username or email is incorrect!";
                    include "../views/client/forgot_password.php";
                    break;
                }
            }

        ///Gọi trang thay đổi password và thông tin user
        case "change_password":
            $action = 'change_password';
            include '../views/client/change_password.php';
            break;
        //Thay đổi thông tin
        case "change_data":
            $action = 'change_data';
            include '../views/client/change_password.php';
            break;
        //Cập nhật Avatar
        case "change_avatar":
            $action = 'change_avatar';
            include '../views/client/change_password.php';
            break;

		//Thực hiện đăng nhập
        case "login_action":
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_md5 = md5($username . $password);
            $customer = new Users();
            if ($customer->is_valid_admin_login($username, $password_md5)) {
              // Tạo mặc định biến Session cho người dùng sau khi đăng nhập thành công
                $_SESSION['username04516'] = $username;
                $_SESSION['password04516'] = $password;
                $_SESSION['check'] = $username;
				$permis = $customer->getUsername($username);
                $_SESSION['permission04516'] = $permis['permission'];
                $_SESSION['userId04576'] = $permis['user_id'];
                 if($permis['permission']!=2)
                    {
                        header("Location:./mainController.php?action=admin");
                        break;
                    }else{
                        header("Location:./mainController.php");
                        break;
                    }
                }else{
                    $_SESSION['messages'] = "Username or password is incorrect!";
                    include "../views/client/login.php";
                    break;
                }

        //Thực hiện thay đổi password
        case "login_change_password":
            $action = "login_change_password";
            $username = $_POST['username'];
            $user = new Users();
            $password1 = $_POST['password1'];
            $re_password = $_POST['re_password'];

                $password1_md5 = md5($username. $password1);
                $user->updatePassword($username,$password1_md5);
                include '../views/client/logout.php';
                break;
        // Thực hiện thay đổi avatar
        case 'upload':
            $action = 'change_data';
            $username = $_POST['username'];
            if(isset($_GET['id'])){
                    $user_fullname = $_POST['user_fullname'];
                    $user_email = $_POST['user_email'];
                    $user_phone = $_POST['user_phone'];
                    $user_address = $_POST['user_address'];
                    $user = new Users();
                    $user->updateData($user_fullname, $username, $user_email, $user_phone, $user_address);
                    include '../views/client/logout.php';
                    break;
            }else {
                if ($_FILES['file1']["error"] > 0) {
                    $action ="change_avatar";
                    $messages = "Error: ".$_FILES['file1']["error"]."<br />";
                    include '../views/client/change_password.php';

                }
                if (isset($_FILES['file1'])) {
                    $filename = $_FILES['file1']['name'];
                    if (empty($filename)) {
                        $action ="change_avatar";
                        $messages='<center><p>File Upload Failed!</p>';
                        include '../views/client/change_password.php';
                        break;
                    }
                    $source = $_FILES['file1']['tmp_name'];
                    $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
                    move_uploaded_file($source, $target);
                    $filename1 = process_image1($image_dir, $filename);
                    if($filename !="avatar.png"){
                        unlink( $image_dir.$filename);
                    }
                    //update
                    $user = new Users();
                    $user->updateAvatar($username, $filename1);
                    include '../views/client/logout.php';
                }else{
                    $action ="change_avatar";
                    $messages = '<center><p>You have not selected the upload file!</p>';
                    include '../views/client/change_password.php';
                    }
            }
            break;

		//Thực hiện đăng ký
        case "add_user":
            //Lấy giá trị truyền từ phương thức POST lưu vào các biến tương ứng
            $user_fullname = $_POST['user_fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];
            $user_email = $_POST['user_email'];
            $user_phone = $_POST['user_phone'];
            $user_address = $_POST['user_address'];
            $user_image = "avatar.png";
            $permis = 2;

            $password_md5 = md5($username . $password);
                $customer = new Users();
                if( $customer->checkUser($username)){
                    $_SESSION['messages'] = "Username already in use!";
                    include "../views/client/register.php";
                    break;
                }else{
                    $customer->addUser($user_fullname, $username, $password_md5, $user_email, $user_phone, $user_address, $user_image,$permis);
                    if( $customer->checkUser($username,$password_md5)){
                        $_SESSION['messages'] = "Congratulations on registering successfully! Please login again.";
                        include "../views/client/login.php";
                        break;
                    }else{
                        $_SESSION['messages'] = "Registration failed.";
                        include "../views/client/register.php";
                        break;
                    }
                }

		//Trang giỏ hàng
        case "cart":
			$action = "cart";
            include '../views/client/cart.php';
            break;

        // Thiết lập trang giỏ hàng
            //lấy dữ liệu đưa vào trang giỏ hàng
        case "add_cart":
			if(isset($_SESSION['check'])){
				if(!isset($_POST['productkey']) ||  !isset($_POST['itemqty'])){
					include '../views/client/cart.php';
					break;
				}else{
					echo add_item($_POST['productkey'],$_POST['itemqty']);
					include "../views/client/cart.php";
					break;
				}
			}else{
				include "../views/client/cart.php";
				break;
			}

            echo add_item($_POST['productkey'],$_POST['itemqty']);
            include "../views/client/cart.php";
            break;

        //Hiển thị trang giỏ hàng
        case "show_cart":
            include '../views/client/cart.php';
            break;

        //Cập nhật khi chỉnh sửa số lượng
        case "update_cart":
			if(isset($_SESSION['check'])){
                if(!isset($_SESSION['cartview04516']) || count($_SESSION['cartview04516'])==0 || !isset($_POST['newqty'])){
					include '../views/client/cart.php';
					break;
				}else{
					$new_list = $_POST['newqty'];
					foreach($new_list as $key => $qty){
						if($_SESSION['cartview04516'][$key] != $qty){
							 update_item($key,$qty);
						}
					}

					include '../views/client/cart.php';
					break;
				}
			}else{
				include '../views/client/cart.php';
				break;
			}


        //Xóa giỏ hàng
        case "empty_cart":
			if(isset($_SESSION['check'])){
                if(!isset($_SESSION['cartview04516']) || count($_SESSION['cartview04516'])==0){
					include '../views/client/cart.php';
					break;
				}else{
					unset($_SESSION['cartview04516']);
					include '../views/client/cart.php';
					break;
				}
			}else{
				include '../views/client/cart.php';
				break;
			}

        //Mua Hàng
        case "payments":
			if(isset($_SESSION['check'])){
                if(!isset($_SESSION['cartview04516']) || count($_SESSION['cartview04516'])==0){
					include "../views/client/checkout.php";
					break;
				}else{
					$username = $_SESSION['check'];
					$quest = new Users();
					$result = $quest->getUsername($username);
					$permis = $quest->getPermission(0);
					$userid=$result['user_id'];

					$objOrder = new Order();
					$objOrder->createOrder($userid);
					$order_id = $objOrder->getOrderId();
					$_SESSION['order_id']=$order_id[0];
					$total = 0;
						$fname = $result['full_name'];
						$address = $result['address'];
						$phone = $result['phone'];
						$from = $result['email'];
						$to = $permis['email'];

						$date = new DateTime("now");
						$order_date = $date->format("Y-m-d");
						$subject = 'Orders Date: '.$order_date.', Customer: '.$result['full_name'];
						$is_body_html = true;
						$objPro = new Products();

					try {
						foreach($_SESSION['cartview04516'] as $key => $item){
							$objOrder->addDetail($order_id[0],$key, $item['qty'] , $item['price'], $item['discount'], $item['total']);
							$total += $item['total'];
							$in_stock = $objPro->getInStock($key);
							$qty = $in_stock[0] - $item['qty'];
							$objPro->updateInStock ($key, $qty);
						}
						$objOrder->updateOrder($order_id[0], $total );
						send_email2($fname,$address, $phone, $to, $from, $subject, $order_id[0], $is_body_html);
						include "../views/client/checkout.php";
						break;
					} catch (Exception $e) {
						$error = $e->getMessage();
						$_SESSION['messages'] = "An error occurred during the ordering process! Error: ".$error;
						include '../views/client/cart.php';
						break;
					}
				}
			}else{
				include "../views/client/checkout.php";
				break;
			}

            $new_list = $_POST['newqty'];

            foreach($new_list as $key => $qty){
                if($_SESSION['cartview04516'][$key] != $qty){
                     update_item($key,$qty);
                }
            }

            include '../views/client/cart.php';
            break;

		// Gửi mail
        case 'send_mail':
			$contact = new contactInfo();
			$st = $contact->getContactInfo();
				$fname = $_POST['fname'];
				$address = $_POST['address'];
				$from = $_POST['from'];
				$to = $st['contact_email'];
				$subject = $_POST['subject'];
				$body = $_POST['message'];
				$is_body_html = true;

            try {
                send_email($fname,$address, $to, $from, $subject, $body, $is_body_html);
				$contact->addContactForm($fname, $address, $to, $from, $subject, $body);
                $m = "Gửi mail thành công!";
                include '../views/client/contact.php';
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
                $m = "Gửi mail không thành công!";
                include '../views/client/contact.php';
            }
            break;

	}
?>
