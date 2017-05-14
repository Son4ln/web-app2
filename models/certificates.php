<?php
	class Certificates {
		public function __construct(){

		}
		//phương thức lấy tất cả dữ liệu
		public function getCertificates (){
			$db = new connect();
			$query = "select * from certificates";
			$result = $db -> getList($query);
			return $result;
		}
		//phương thức lấy 1 dòng dữ liệu bằng id
		public function getCertificateById($id) {
			$db = new connect();
			$query = "select * from certificates where certificate_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
		//thêm dữ liệu vào bảng
		public function addCertificate ($name, $img){
			$db = new connect();
			$query = "insert into certificates values('','$name','$img')";
			$db -> exec($query);
		}
		//cập nhật dữ liệu cho bảng
		public function updateCertificate ($id, $name, $img) {
			$db = new connect();
			$query = "update certificates set certificate_name = '$name', certificate_image = '$img' where certificate_id = '$id'";
			$db -> exec($query);
		}
		//xóa dữ liệu bảng thông qua id
		public function delCertificate ($id){
			$db = new connect();
			$query = "delete from certificates where certificate_id ='$id'";
			$db -> exec($query);
		}
<<<<<<< Updated upstream

		//phương thức lấy tất cả dữ liệu
		public function getCertificatesAndProducts (){
			$db = new connect();
			$query = "select * from product_certificate";
			$result = $db -> getList($query);
			return $result;
		}

		public function getCertificatesAndProductsById ($id){
			$db = new connect();
			$query = "select * from product_certificate where show_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		public function updateCertificatesAndProducts ($id, $product, $certificate) {
			$db = new connect();
			$query = "update product_certificate set product_id = '$product', certificate_id = '$certificate' where show_id = '$id'";
			$db -> exec($query);
		}

		public function addCertificateToProduct ($product, $certificate){
			$db = new connect();
			$query = "insert into product_certificate values('','$product','$certificate')";
			$db -> exec($query);
		}

		public function delCertificateToProduct ($id){
			$db = new connect();
			$query = "delete from product_certificate where show_id ='$id'";
			$db -> exec($query);
		}
=======
>>>>>>> Stashed changes
		
		//đếm số hàng dữ liệu theo 1 id sản phẩm có trong bảng product_certificate
		public function countProductCertificateById($id) {
			$db = new connect();
			$query = "select count(product_id) from product_certificate where product_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}
<<<<<<< Updated upstream

=======
		
>>>>>>> Stashed changes
		//lấy dữ liệu trong bảng product_certificate và certificates theo 1 sản phẩm
		public function getProductCertificate($id) {
			$db = new connect();
			$query = "select * from certificates JOIN  product_certificate ON certificates.certificate_id = product_certificate.certificate_id where product_id = '$id'";
			$result = $db -> getList($query);
			return $result;
		}
	}
?>