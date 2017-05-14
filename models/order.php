<?php
	class Order{

		function __construct()
		{

		}

		public function getOrder (){
			$db = new connect();
			$query = "select * from orders";
			$result = $db -> getList($query);
			return $result;
		}

		function getLatestOrder(){
			$db = new connect();
			$query = "select * from orders ORDER by order_id DESC limit 0,1";
			$result = $db -> getList($query);
			return $result;
		}
		
		//tạo hóa đơn khi người dùng nhấn nút thanh toán
		public function createOrder($user_id){
			$db = new connect();
			$date = new DateTime("now");
			$order_date = $date->format("Y-m-d");
			$query = "INSERT INTO orders VALUES ('','$user_id','$order_date','', 0 , 1)";
			$db->exec($query);     
		}
		
		function getOrderId(){
			$db = new connect();
			$query = "select order_id from orders ORDER by order_id DESC limit 0,1";
			$result = $db -> getInstance($query);
			return $result;
		}

		function addDetail($orderId, $productId, $quantity, $price, $discount, $total){
			$db = new connect();
			$query = "insert into order_details values('','$orderId','$productId', '$quantity', '$price', '$discount', '$total')";
			$db -> exec($query);
		}

		function delDetail($id){
			$db = new connect();
			$query = "delete from order_details where order_id ='$id'";
			$db -> exec($query);
		}

		function delDetailByProduct($id){
			$db = new connect();
			$query = "delete from order_details where product_id ='$id'";
			$db -> exec($query);
		}

		public function addOrder ($user, $orderDate, $deliveryDate, $orderCost, $status){
			$db = new connect();
			$query = "insert into orders values('','$user','$orderDate', '$deliveryDate', '$orderCost', '$status')";
			$db -> exec($query);
		}

		public function updateOrder ($id, $cost){
			$db = new connect();
			$query = "update orders set order_cost = '$cost' where order_id = '$id'";
			$db -> exec($query);
		}

		public function getOrderById ($id){
			$db = new connect();
			$query = "select * from orders WHERE order_id = '$id'";
			$result = $db -> getInstance($query);
			return $result;
		}

		public function getOrderDetailByOrderId ($id){
			$db = new connect();
			$query = "select * FROM order_details WHERE order_id = '$id'"
			;
			$result = $db -> getList($query);
			return $result;
		}
		
		//lấy chi tiết hóa đơn (orderdetails)
		public function getOrderDetail($order_id){
			$db = new connect();
			$select = "SELECT products.product_id,product_name,order_details.product_price,order_details.product_discount,order_quantity,total FROM products JOIN order_details ON products.product_id = order_details.product_id WHERE order_id='$order_id'";
			$result = $db->getList($select);
			return $result;
		}

		public function delOrder($id){
			$db = new connect();
			$query = "delete from orders where order_id ='$id'";
			$db -> exec($query);
		}

		public function delOrderByUser($id){
			$db = new connect();
			$query = "delete from orders where user_id ='$id'";
			$db -> exec($query);
		}
		//đếm số hàng sản phẩm bán chạy
		public function getCountOrderProduct() {
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng sản phẩm bán chạy theo brand_id
		public function getCountOrderProductB ($brand_id){
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details where product_id in (select product_id from products where brand_id = '$brand_id')";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng sản phẩm bán chạy theo origin_id
		public function getCountOrderProductF ($feature_id){
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details where product_id in (select product_id from products where feature_id = '$feature_id')";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số hàng sản phẩm bán chạy theo origin_id
		public function getCountOrderProductO ($origin_id){
			$db = new connect();
			$query = "select count(DISTINCT product_id) from order_details where product_id in (select product_id from products  where origin_id = '$origin_id')";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm bán chạy
		public function getOrderProduct($from, $to) {
			$db = new connect();
			$query = "select products.product_id,product_name,product_image,order_details.product_price,order_details.product_discount,product_currency, sum(order_quantity) as sum_quantity
			from products JOIN order_details ON products.product_id = order_details.product_id group by product_id ORDER BY sum_quantity DESC limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}
		//Brand - Selling Product
		//đếm số lượng sản phẩm theo từng thương hiệu trong bảng products
		public function countOrderBrandById ($brand_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where brand_id = '$brand_id' and product_id in (select product_id from order_details group by product_id)";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng tính năng trong bảng products
		public function countOrderFeatureById ($feature_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where feature_id = '$feature_id' and product_id in (select product_id from order_details group by product_id)";
			$result = $db -> getInstance($query);
			return $result;
		}

		//đếm số lượng sản phẩm theo từng nguồn gốc trong bảng products
		public function countOrderOriginById ($origin_id) {
			$db = new connect();
			$query = "select count(product_id) from  products where origin_id = '$origin_id' and product_id in (select product_id from order_details group by product_id)";
			$result = $db -> getInstance($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm theo từng thương hiệu trong bảng products
		public function getOrderBrand () {
			$db = new connect();
			$query = "select * from  products INNER JOIN order_details ON order_details.product_id = products.product_id INNER JOIN brands ON brands.brand_id = products.brand_id group by products.brand_id";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm theo từng tính năng trong bảng products
		public function getOrderFeature () {
			$db = new connect();
			$query = "select * from  products INNER JOIN order_details ON order_details.product_id = products.product_id INNER JOIN product_features ON product_features.feature_id = products.feature_id group by products.feature_id";
			$result = $db -> getList($query);
			return $result;
		}

		//lấy dữ liệu sản phẩm theo từng nguồn gốc trong bảng products
		public function getOrderOrigin () {
			$db = new connect();
			$query = "select * from  products INNER JOIN order_details ON order_details.product_id = products.product_id INNER JOIN in_origin ON in_origin.origin_id = products.origin_id group by products.origin_id";
			$result = $db -> getList($query);
			return $result;
		}

		//SHOW PRODUCT SELECTED FROM ORDER_DETAILS
		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details
		public function getProductOrderLimit ($from, $to){
			$db = new connect();
			$query = "select * from  products where product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details theo brand_id
		public function getProductOrderLimitB ($brand_id, $from, $to){
			$db = new connect();
			$query = "select * from  products where brand_id = $brand_id and product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details theo feature_id
		public function getProductOrderLimitF ($feature_id, $from, $to){
			$db = new connect();
			$query = "select * from  products where feature_id = $feature_id and product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		//phương thức hiển thị giới hạn sản phẩm trong bảng products và order_details theo origin_id
		public function getProductOrderLimitO ($origin_id, $from, $to){
			$db = new connect();
			$query = "select * from  products where origin_id = $origin_id and product_id in (select product_id from order_details group by product_id) limit $from, $to";
			$result = $db -> getList($query);
			return $result;
		}

		public function updateShipDate ($id, $delivery){
			$db = new connect();
			$query = "update orders set delivery_date = '$delivery' where order_id = '$id'";
			$db -> exec($query);
		}

		public function updateStatus($id, $status){
			$db = new connect();
			$query = "update orders set order_status = '$status' where order_id = '$id'";
			$db -> exec($query);
		}
	}
?>
