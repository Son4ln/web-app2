<?php
	class Users {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getUsers (){
			$db = new connect();
			$query = "select * from users";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getUserById($id) {
			$db = new connect();
			$query = "select * from users where user_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addUser ($name, $username, $pass, $email, $phone, $address, $avat, $permis){
			$db = new connect();
			$query = "insert into users values('','$name', '$username', '$pass', '$email', '$phone', '$address', '$avat', '$permis')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateUser ($id, $name, $username, $pass, $email, $phone, $address, $avat, $permis) {
			$db = new connect();
			$query = "update users set
				full_name = '$name',
				username = '$username',
				password = '$pass',
				email = '$email',
				phone = '$phone',
				address = '$address',
				avatar = '$avat',
				permission = '$permis'
				where user_id = '$id'";
			$db -> exec($query);
		}
		//update phân quyền.
		public function permission ($id, $permis) {
			$db = new connect();
			$query = "update users set
				permission = '$permis'
				where user_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delUser ($id){
			$db = new connect();
			$query = "delete from users where user_id ='$id'";
			$db -> exec($query);
		}
		
		//kiểm tra đăng nhập.
		public function is_valid_admin_login ($username, $password) {
			$db = new connect();
            $query = "SELECT user_id FROM users WHERE username='$username' and password='$password'";
            $result = $db->getInstance($query); 
            if($result!=null) 
                return true; 
            else 
                return false; 
		}
		
		// Kiểm tra đăng nhập khi người dùng quên password
        public function checkPassword($username,$email) 
        { 
            $db = new connect();               
            $select="select password from users where username='$username' and email='$email'"; 
            $result = $db->getInstance($select); 
            return $result; 
        }

        public function checkInfo($username,$email)
         {
            $db = new connect(); 
            $select="select * from users where username='$username' and email='$email'";
            $result = $db->getInstance($select);
            if($result!=null)
				return true;
            else
				return false;
        } 
		
		//Khai báo phương thức đổi mật khẩu
        function updatePassword($username,$password)
        { 
            $db = new connect();
            $query = "update users set password='$password' where username='$username'";
            $db->exec($query);
        }
		
		//kiểm tra tên đăng nhập đã tồn tại
        public function checkUser($username) 
        { 
            $db = new connect();               
            $select="select * from users where username='$username'"; 
            $result = $db->getInstance($select); 
            if($result!=null) 
                return true; 
            else 
                return false; 
        }
		
		//phương thức lấy 1 dòng dữ liệu bằng username
		public function getUsername($username) {
			$db = new connect();
			$query = "select * from users where username = '$username'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//phương thức lấy 1 dòng dữ liệu bằng permission
		public function getPermission($permis) {
			$db = new connect();
			$query = "select * from users where permission = '$permis'";
			$result = $db -> getInstance($query);
			return $result;
		}
		
		//Khai báo phương thức đổi thông tin user
        function updateData($user_fullname, $username, $user_email, $user_phone, $user_address)
        { 
            $db = new connect();
            $query = "update users set full_name =n'$user_fullname', email='$user_email', phone='$user_phone', address='$user_address' where username='$username'";
            $db->exec($query);
        }
		
        //Khai báo phương thức đổi ảnh đại diện
        function updateAvatar($username,$user_image)
        { 
            $db = new connect();
            $query = "update users set avatar='$user_image' where username='$username'";
            $db->exec($query);
        }
	}
?>