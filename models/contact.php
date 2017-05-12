<?php
	class Contact{
		
		function __construct()
		{

		}
		//lấy dữ liệu từ bảng contact_info
		public function getShowContactInfo() {
			$db = new connect();
			$query = "select * from contact_info";
			$result = $db -> getInstance($query);
			return $result;
		}
	}
?>
