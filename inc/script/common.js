
var mle = mle || {version : '1.1.2'};
mle.setcookie = function(name,value,seconds,path,domain) {
	var expires = new Date();
	expires.setTime(expires.getTime() + seconds * 1000);
	document.cookie = escape(name) + '=' + escape(value)
	+ (typeof(seconds) != 'undefined' ? '; expires=' + expires.toGMTString() : '')
	+ (typeof(path) != 'undefined' ? '; path=' + path : '; path=/')
	+ (typeof(domain) != 'undefined' ? '; domain=' + domain : '');
};
mle.getcookie = function(name) {
	var cookie_start = document.cookie.indexOf(name);
	var cookie_end = document.cookie.indexOf(";", cookie_start);
	var result = cookie_start == -1 ? '' : unescape(document.cookie.substring(cookie_start + name.length + 1, (cookie_end > cookie_start ? cookie_end : document.cookie.length)));
	return decodeURIComponent(escape(result));
};
mle.img_auto_size = function(a){
	if(!isNaN(a.width) && !isNaN(a.height)){ 
		var img = new Image();
		img.onload = function(){
			if(!isNaN(img.width) && !isNaN(img.height)){ 
				var offset = 0; 
				var narrow_w = img.width / a.width; 
				var narrow_h = img.height / a.height; 
				if(narrow_w <= narrow_h){
					offset = 0 - Math.round((img.height / narrow_w - a.height) / 2);
					a.style.width = a.width + 'px'; 
					a.style.height = 'auto'; 
					if(offset < 0) a.style.marginTop = offset + 'px'; 
				} else {
					offset = 0 - Math.round((img.width / narrow_h - a.width) / 2);
					a.style.width = 'auto'; 
					a.style.height = a.height + 'px'; 
					if(offset < 0) a.style.marginLeft = offset + 'px'; 
				}
			}
		}
		img.src = a.src; 
	}
};
mle.login = function(uid,pid){
	$.ajax({
		type : 'POST',
		url: "app.php?" + Math.random(),
		data : 'a=login&username=' + $("#"+uid).val() + '&password=' + $("#"+pid).val(),
		dataType : 'script',
		success : function(){
			ajax_login_result(result);
		}
	});
};
mle.support = function(id,t){
	$.ajax({
		type : 'POST',
		url: "app.php?" + Math.random(),
		data : 'a=support&id=' + id,
		dataType : 'script',
		success : function(){
			ajax_support_result(result,t);
		}
	});
}
mle.in_array = function(string,array){
	for (s = 0; s < array.length; s++) {
		thisEntry = array[s].toString();
		if (thisEntry == string) {
			return true;
		}
	}
	return false;
};
mle.empty = function(mixed_var){
    var key;    
    if (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || typeof mixed_var === 'undefined'){
        return true;
    }
    if (typeof mixed_var == 'object') {
        for (key in mixed_var) {
            return false;
        }
		return true;
    } 
    return false;
};
mle.is_numeric = function (mixed_var) {
    return (typeof(mixed_var) === 'number' || typeof(mixed_var) === 'string') && mixed_var !== '' && !isNaN(mixed_var);
};
mle.numeric = function(v){
	v = parseFloat(mle.is_numeric(v) ? v : 0);
	(v < 0) && (v = 0);
	return v;
};
mle.rand = function(min,max){
	return Math.floor(Math.random() * (max - min + 1) + min);
};
var lang = mle.getcookie('mlecms_global_language');
mle.lang = (isNaN(lang) || lang == '') ? 1 : lang;
if(document.all && /MSIE (5\.5|6)/.test(navigator.userAgent) && document.styleSheets && document.styleSheets[0] && document.styleSheets[0].addRule){
	$.getScript('inc/tools/iepngfix/tilebg.js');
};
$(function(){
	$.getScript('inc/script/gb2big.js');
});