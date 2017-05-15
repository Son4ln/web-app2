$('div.alert').delay(3000).slideUp();

function delConfirm (msg) {
    if(window.confirm(msg)){
        return true;
    }
    return false;
 }

 function goback() {
    history.back(-1)
}

function showMes(){
	if (typeof(Storage) !== "undefined") {
		if(!sessionStorage.mes){
			document.getElementById('showMes').style.display = 'none';
			return false;
		}
		document.getElementById('showMes').innerHTML = sessionStorage.mes;
		document.getElementById('showMes').style.display = 'block';
		$('.alert').addClass(sessionStorage.typeOfMes);
		sessionStorage.clear();
		return true;
	} else {
	    document.write('Trình duyệt của bạn không hỗ trợ local storage');
	}
}
showMes();

 function validateAddBanner() {
	var mes = document.getElementById('alert-mes');
	var link = document.getElementById('bLink');
	var bannerImg = document.getElementById('bImages');
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	if(bannerImg.value == "" || !allowedExtensions.exec(bannerImg.value)){
		mes.innerHTML = "Vui lòng chọn hình ảnh (jpg,jpeg,png,gif)";
		mes.style.display = "block";
		bannerImg.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	if(link.value == ""){
		mes.innerHTML = "Vui lòng nhập link";
		mes.style.display = "block";
		link.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validEditBanner(){
	var mes = document.getElementById('alert-mes');
	var editLink = document.getElementById('eBLink');
	if(editLink.value == ""){
		mes.innerHTML = "Vui lòng nhập link";
		mes.style.display = "block";
		editLink.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validBrand(){
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	var mes = document.getElementById('alert-mes');
	var brandName = document.getElementById('brandName');
	var brandImg = document.getElementById('brandImg');
	if(brandName.value == ""){
		mes.innerHTML = "Vui lòng nhập tên brand";
		mes.style.display = "block";
		brandName.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	if(brandImg.value == "" || !allowedExtensions.exec(brandImg.value)){
		mes.innerHTML = "Vui lòng chọn hình ảnh (jpg,jpeg,png,gif)";
		mes.style.display = "block";
		brandImg.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validBrandEdit(){
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	var mes = document.getElementById('alert-mes');
	var brandName = document.getElementById('eBrandName');
	if(brandName.value == ""){
		mes.innerHTML = "Vui lòng nhập tên brand";
		mes.style.display = "block";
		brandName.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validCate(){
	var mes = document.getElementById('alert-mes');
	var cateName = document.getElementById('cateName');
	if(cateName.value == ""){
		mes.innerHTML = "Vui lòng nhập tên category";
		mes.style.display = "block";
		cateName.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validFeature(){
	var mes = document.getElementById('alert-mes');
	var fName = document.getElementById('fName');
	if(fName.value == ""){
		mes.innerHTML = "Vui lòng nhập tên category";
		mes.style.display = "block";
		fName.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validProduct(){
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	var txtName = document.getElementById('txtName');
	var fImages1 = document.getElementById('fImages1');
	var fImages2 = document.getElementById('fImages2');
	var fImages3 = document.getElementById('fImages3');
	var txtPrice = document.getElementById('txtPrice');
	var txtDiscount = document.getElementById('txtDiscount');
	var txtCurrency = document.getElementById('txtCurrency');
	var txtDesc = document.getElementById('txtDesc');
	var txtDetail = document.getElementById('txtDetail');
	var txtStock = document.getElementById('txtStock');
	if(txtName.value == ""){
		document.getElementById('alertName').innerHTML = "Vui lòng nhập tên sản phẩm";
		txtName.focus();
		return false;
	}
	if(fImages1.value == "" || !allowedExtensions.exec(fImages1.value)){
		document.getElementById('alertimg1').innerHTML = "Vui lòng chọn hình ảnh (jpg,jpeg,png,gif)";
		fImages1.focus();
		return false;
	}
	if(fImages2.value == "" || !allowedExtensions.exec(fImages2.value)){
		document.getElementById('alertimg2').innerHTML = "Vui lòng chọn hình ảnh (jpg,jpeg,png,gif)";
		fImages2.focus();
		return false;
	}
	if(fImages3.value == "" || !allowedExtensions.exec(fImages3.value)){
		document.getElementById('alertimg3').innerHTML = "Vui lòng chọn hình ảnh (jpg,jpeg,png,gif)";
		fImages3.focus();
		return false;
	}
	if(txtPrice.value == ""){
		document.getElementById('alertprice').innerHTML = "Vui lòng nhập giá sản phẩm";
		txtPrice.focus();
		return false;
	}
	if(txtDiscount.value == ""){
		document.getElementById('alertdisc').innerHTML = "Vui lòng nhập giá giảm của sản phẩm";
		txtDiscount.focus();
		return false;
	}
	if(txtCurrency.value == ""){
		document.getElementById('alertcerren').innerHTML = "Vui lòng nhập loại tiền tệ sản phẩm";
		txtCurrency.focus();
		return false;
	}
	if(txtDesc.value == ""){
		document.getElementById('txtDesc').innerHTML = "Vui lòng nhập mô tả sản phẩm";
		txtDesc.focus();
		return false;
	}
	if(txtDetail.value == ""){
		document.getElementById('alertdetail').innerHTML = "Vui lòng nhập thông tin chi tiết sản phẩm";
		txtDetail.focus();
		return false;
	}
	if(txtStock.value == ""){
		document.getElementById('alertstock').innerHTML = "Vui lòng nhập số lượng sản phẩm trong kho";
		txtStock.focus();
		return false;
	}
	return true;
}

function validUser(){
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	var txtFullName = document.getElementById('txtFullName');
	var txtUser = document.getElementById('txtUser');
	var txtPass = document.getElementById('txtPass');
	var txtRePass = document.getElementById('txtRePass');
	var txtEmail = document.getElementById('txtEmail');
	var txtPhone = document.getElementById('txtPhone');
	var txtAddr = document.getElementById('txtAddr');
	var txtAva = document.getElementById('txtAva');
	var filterEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(txtFullName.value == ""){
		document.getElementById('alertFullName').innerHTML = "Vui lòng nhập tên đầy đủ";
		txtFullName.focus();
		return false;
	}
	if(txtUser.value == ""){
		document.getElementById('alertUser').innerHTML = "Vui lòng nhập username";
		txtUser.focus();
		return false;
	}
	if (txtUser.value.length < 6  || txtUser.value.length > 16) {
		document.getElementById('alertUser').innerHTML = "Vui lòng nhập username lớn hơn 6 và nhỏ hơn 16 ký tự";
		txtUser.focus();
		return false;
	}
	if(txtPass.value == ""){
		document.getElementById('alertPass').innerHTML = "Vui lòng nhập mật khẩu";
		txtPass.focus();
		return false;
	}
	if(txtRePass.value == ""){
		document.getElementById('alertRepass').innerHTML = "Vui lòng nhập mật khẩu";
		txtRePass.focus();
		return false;
	}
	if (txtRePass.value != txtPass.value) {
		document.getElementById('alertRepass').innerHTML = "Không khớp với mật khẩu";
		txtRePass.focus();
		return false;
	}
	if(txtEmail.value == ""){
		document.getElementById('alertEmail').innerHTML = "Vui lòng nhập email";
		txtEmail.focus();
		return false;
	}
	if(!filterEmail.test(txtEmail.value)){
		document.getElementById('alertEmail').innerHTML = "Vui lòng nhập đúng email";
		txtEmail.focus();
		return false;
	}
	if(txtPhone.value == ""){
		document.getElementById('alertPhone').innerHTML = "Vui lòng nhập số điện thoại";
		txtPhone.focus();
		return false;
	}
	if(txtAddr.value == ""){
		document.getElementById('alertAddr').innerHTML = "Vui lòng nhập địa chỉ";
		txtAddr.focus();
		return false;
	}
	if(txtAva.value == "" || !allowedExtensions.exec(txtAva.value)){
		document.getElementById('alertAva').innerHTML = "Vui chọn avatar(jpg,jpeg,png,gif)";
		txtAva.focus();
		return false;
	}
	return true;
}
function validBlog (){
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	var blogTitle = document.getElementById('blogTitle');
	var featureImg = document.getElementById('featureImg');
	var blogDesc = document.getElementById('blogDesc');

	if(blogTitle.value == ""){
		document.getElementById('alertBlog').innerHTML = "Vui lòng nhập title";
		blogTitle.focus();
		return false;
	}

	if(featureImg.value == "" || !allowedExtensions.exec(featureImg.value)){
		document.getElementById('alertBlogImg').innerHTML = "Vui lòng chọn hình ảnh (jpg,jpeg,png,gif)";
		featureImg.focus();
		return false;
	}

	if(blogDesc.value == ""){
		document.getElementById('alertDescription').innerHTML = "Vui lòng nhập mô tả";
		blogDesc.focus();
		return false;
	}
	return true;
}

function validMaxim (){
	var mes = document.getElementById('alert-mes');
	var mContent = document.getElementById('mContent');
	if(mContent.value == ""){
		mes.innerHTML = "Vui lòng nhập nội dung";
		mes.style.display = "block";
		mContent.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validCertif(){
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
	var mes = document.getElementById('alert-mes');
	var certifName = document.getElementById('certifName');
	var certifImg = document.getElementById('certifImg');
	if(certifName.value == ""){
		mes.innerHTML = "Vui lòng nhập tên chứng nhận";
		mes.style.display = "block";
		certifName.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	if(certifImg.value == "" || !allowedExtensions.exec(certifImg.value)){
		mes.innerHTML = "Vui lòng chọn hình ảnh (jpeg,jpg,png,gif)";
		mes.style.display = "block";
		certifImg.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
	}
	return true;
}

function validTitle(){
	var mes = document.getElementById('alert-mes');
    var tName = document.getElementById('tName');
    if(tName.value == ""){
    	mes.innerHTML = "Vui lòng nhập tiêu đề";
		mes.style.display = "block";
		tName.focus();
		$('div.alert').delay(3000).slideUp();
		return false;
    }
	return true;
}













