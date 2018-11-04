var mle = mle || {};
mle.shopping = {}
mle.shopping.language = new Array();
mle.shopping.language['add_failed'] = ''; 
mle.shopping.language['sid_exists'] = ''; 
mle.shopping.language['sid_success'] = ''; 
mle.shopping.add_cart = function(sid,show_num){
	if(isNaN(sid) || mle.empty(mle.getcookie('mlecms_global_language'))){ 
		alert(mle.shopping.language['add_failed']);	
		return false;	
	} else {
		var cart = mle.shopping.get_cart(true);
		if(mle.in_array(sid,cart)){ 
			alert(mle.shopping.language['sid_exists']);
			return true;
		} else {
			var new_cart = cart.join(','); 
			new_cart = mle.empty(new_cart) ? sid : new_cart + ',' + sid;
			mle.setcookie('mlecms_cart_sid',new_cart);
			mle.empty(show_num) || $('#' + show_num).html(parseInt($('#' + show_num).html()) + 1);
			alert(mle.shopping.language['sid_success']);
			return true;
		}
	}
};
mle.shopping.get_cart = function(array){
	var cart = mle.getcookie('mlecms_cart_sid');
	return array ? cart.split(',') : cart;
};
mle.shopping.get_cart_count = function(){
	return (mle.shopping.get_cart(true)).length;
};
mle.shopping.uncart = function(sid){
};