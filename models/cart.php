<?php
function add_item($key,$quantity)
{
    $pros = new Products();
    $pro = $pros->getProductById($key);
    //Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
    if(isset($_SESSION['cartview04516'][$key]))
    {
        $quantity += $_SESSION['cartview04516'][$key]['qty'];
        update_item($key,$quantity);
        return;
    }
    // Tạo đối tượng mảng lưu trữ thông tin sản phẩm cần thêm vào giỏ hàng
    $price = $pro['product_price'];
	$discount = $pro['product_discount'];
	if($discount!=0){
		$total = $discount * $quantity;
	}else{
		$total = $price * $quantity;
	}
    $item = array(
        'name' => $pro['product_name'],
        'price' => $price,
		'discount' => $discount,
        'qty' => $quantity,
        'total' => $total
     );
    
    // Thêm sản phẩm vào giỏ hàng thông qua mảng biến Session $_SESSION['cartview04516']
    $_SESSION['cartview04516'][$key]= $item;
}
    // Cập nhật sản phẩm cùng giỏ hàng
    function update_item($key,$quantity)
    {
        $quantity = doubleval($quantity);
        if($quantity <= 0)
        {
            //Thực hiện hủy phần tử trong giỏ hàng nếu người dùng nhập giá trị số lượng <=0 
            unset($_SESSION['cartview04516'][$key]);
        }
        else
        {
            // Thực hiện cập nhật số lượng và thành tiền của sản phẩm trong giỏ hàng
            // với mảng biến $_SESSION['cartview04516'] tại vị trí $key của mảng
            $_SESSION['cartview04516'][$key]['qty'] = $quantity;
			if($_SESSION['cartview04516'][$key]['discount']!=0){
				$total = number_format($_SESSION['cartview04516'][$key]['discount'],2) * $_SESSION['cartview04516'][$key]['qty'];
			}else{
				$total = number_format($_SESSION['cartview04516'][$key]['price'],2) * $_SESSION['cartview04516'][$key]['qty'];
			}
				$_SESSION['cartview04516'][$key]['total'] = $total;
        }
    }
      
    // Lấy tổng doanh thu của giỏ hàng
      
    function get_subtotal()
    {
        $subtotal = 0;
        foreach($_SESSION['cartview04516'] as $item)
        {
                $subtotal += number_format($item['total'],2);
        }
      
		$subtotal = number_format($subtotal,2);
		return $subtotal;
    }
      // Tính tống số lượng sản phẩm đã order
    function get_subtotalitem()
    {
        $subtotalitem = 0;
			foreach($_SESSION['cartview04516'] as $item)
        {
                $subtotalitem += $item['qty'];
        }
      
		$subtotal = number_format($subtotalitem ,0);
		return $subtotalitem;
    }
     
     

?>
