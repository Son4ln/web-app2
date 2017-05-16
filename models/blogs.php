<?php
	class Blogs
	{

		function __construct()
		{

		}
		//lấy tất cả dữ liệu
		public function getBlogs () {
			$db = new connect();
			$query = "select * from blogs";
			$result = $db -> getList($query);
			return $result;
		}

		public function getBlogsByUser ($user) {
			$db = new connect();
			$query = "select * from blogs where user_id = '$user'";
			$result = $db -> getList($query);
			return $result;
		}


		//lấy dữ liệu thông qua id
		public function getBlogById ($id) {
			$db = new connect();
			$query = "select * from blogs where blog_id = '$id'";
			$result = $db ->getInstance($query);
			return $result;
		}

		//thêm dữ liệu vào
		public function addBlogs ($title, $imgs, $desc, $content , $datePost, $user){
			$db = new connect();
			$query = "insert into blogs values('','$title','$imgs','$desc', '$content', '$datePost', '$user')";
			$db -> exec($query);
		}

		//cập nhập dữ liệu
		public function updateBlog ($id, $title, $imgs, $desc, $content) {
			$db = new connect();
			$query = "update blogs set blog_title = '$title', featured_image = '$imgs', blog_description = '$desc', blog_content = '$content' where blog_id = '$id'";
			$db -> exec($query);
		}

		//xóa dữ liệu
		public function delBlog ($id) {
			$db = new connect();
			$query = "delete from blogs where blog_id = '$id'";
			$db -> exec($query);
		}

		public function delBlogByUser ($id) {
			$db = new connect();
			$query = "delete from blogs where user_id = '$id'";
			$db -> exec($query);
		}


		//lấy giới hạn số hàng dữ liệu từ bảng blogs
		public function getBlogSlide ($from, $to) {
			$db = new connect();
			$query = "select * from blogs ORDER BY blog_id DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm số tin trong bảng blogs
		public function getCountBlogSlide() {
			$db = new connect();
			$query = "select count(blog_id) from blogs";
			$result = $db -> getInstance($query);
			return $result;
		}

		//tìm kiếm blog
		public function searchBlog ($search) {
			$db = new connect();
			$query = "SELECT * FROM blogs WHERE blog_title LIKE '%$search%' OR blog_title LIKE '$search' ORDER BY blog_id DESC LIMIT 20";
			$result = $db -> getList($query);
			return $result;
		}

		//tìm kiếm product
		public function searchProduct ($search) {
			$db = new connect();
			$query = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR product_name LIKE '$search' ORDER BY product_id DESC LIMIT 20";
			$result = $db -> getList($query);
			return $result;
		}

		//tìm kiếm brand
		public function searchBrand ($search) {
			$db = new connect();
			$query = "SELECT * FROM brands WHERE brand_name LIKE '%$search%' OR brand_name LIKE '$search' ORDER BY brand_id DESC LIMIT 20";
			$result = $db -> getList($query);
			return $result;
		}

		//tìm kiếm feature
		public function searchFeature ($search) {
			$db = new connect();
			$query = "SELECT * FROM product_features WHERE feature_name LIKE '%$search%' OR feature_name LIKE '$search' ORDER BY feature_id DESC LIMIT 20";
			$result = $db -> getList($query);
			return $result;
		}

		//tìm kiếm origin
		public function searchOrigin ($search) {
			$db = new connect();
			$query = "SELECT * FROM in_origin WHERE  name_of_origin LIKE '%$search%' OR name_of_origin LIKE '$search' ORDER BY origin_id DESC LIMIT 20";
			$result = $db -> getList($query);
			return $result;
		}

		//đếm kết quả tìm kiếm blog
		public function countSearchBlog ($search) {
			$db = new connect();
			$query = "SELECT count(*) FROM blogs WHERE blog_title LIKE '%$search%' OR blog_title LIKE '$search' ORDER BY blog_id DESC LIMIT 20";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm kết quả tìm kiếm product
		public function countSearchProduct ($search) {
			$db = new connect();
			$query = "SELECT count(*) FROM products WHERE product_name LIKE '%$search%' OR product_name LIKE '$search' ORDER BY product_id DESC LIMIT 20";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm kết quả tìm kiếm brand
		public function countSearchBrand ($search) {
			$db = new connect();
			$query = "SELECT count(*) FROM brands WHERE brand_name LIKE '%$search%' OR brand_name LIKE '$search' ORDER BY brand_id DESC LIMIT 20";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm kết quả tìm kiếm feature
		public function countSearchFeature ($search) {
			$db = new connect();
			$query = "SELECT * FROM product_features WHERE feature_name LIKE '%$search%' OR feature_name LIKE '$search' ORDER BY feature_id DESC LIMIT 20";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm kết quả tìm kiếm origin
		public function countSearchOrigin ($search) {
			$db = new connect();
			$query = "SELECT count(*) FROM in_origin WHERE  name_of_origin LIKE '%$search%' OR name_of_origin LIKE '$search' ORDER BY origin_id DESC LIMIT 20";
			$result = $db -> getInstance($query);
			return $result;
		}


	}
?>