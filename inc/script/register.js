var mle = mle || {};
mle.register = {};
mle.register.username = false; 
mle.register.email = false; 
mle.register.password = false; 
mle.register.password2 = false;
mle.register.captcha = false; 
mle.register.bind = function(id,error_msg,exists_msg,strictly){
	$('#register_form input').focus(function(){
		$(this).parent().parent('ul').find('ol').hide(); 
		$(this).parent().parent('ul').find('.attention').show(); 
		$(this).css({'border-color':'#40B3FF','background-color':'#E5F5FF'});
	});
	$('#register_form ' + id).blur(function(){
		if($(this).val() != ''){
			return mle.register.check(id,error_msg,exists_msg,strictly);
		} else {
			$(id).parent().parent('ul').find('ol').hide();
			$(id).css({'border-color':'#C8C8FF','background-color':'#FFFFFF'});
			return false;
		}
	});		
	$('#register_form').submit(function(){
		mle.register.check(id,error_msg,exists_msg,strictly,true); 
		if(mle.register.username && mle.register.email && mle.register.password && mle.register.password2 && mle.register.captcha){
			return true;
		} else {
			return false;	
		}
	});	
}
mle.register.check = function(id,error_msg,exists_msg,strictly,ajax){	
	switch (id){
		case '#username' :
			if((strictly == true && $(id).val().match(/^[a-zA-Z][a-zA-Z0-9_]{4,20}$/) == null) || (strictly == false && ($(id).val().match(/[\"\'\\\/\@\$\%<>\?\|\:#&]/) != null || mle.register.get_length($(id).val()) < 5 || mle.register.get_length($(id).val()) > 20))){
				mle.register.style_error(id,error_msg);
				mle.register.username = false;
				return false;
			} else {
				if(true !== ajax){	 
					$(id).parent().parent('ul').find('ol').hide(); 
					$(id).parent().parent('ul').find('.loading').show(); 
					$.ajax({
						type : 'POST', 
						url: "app.php", 
						data : 'a=register&uid=' + $(id).val(), 
						dataType : 'script', 
						complete : function(){ 
							if(typeof(result) == 'undefined'){
								result = true; 
							} 
							if(result == true){
								mle.register.style_ok(id);
								mle.register.username = true;
								return true;							
							} else { 
								mle.register.style_error(id,exists_msg);
								mle.register.username = false;
								return false;								
							}
						}
					});
				} else {
					mle.register.style_ok(id);
					mle.register.username = true;
					return true;						
				}
			}		
		break;
		case '#email' :
			if($(id).val().match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/) == null){
				mle.register.style_error(id,error_msg);
				mle.register.email = false;
				return false;
			} else {
				if(true !== ajax){	 
					$(id).parent().parent('ul').find('ol').hide(); 
					$(id).parent().parent('ul').find('.loading').show(); 
					$.ajax({
						type : 'POST', 
						url: "app.php", 
						data : 'a=register&uid=' + $(id).val(), 
						dataType : 'script', 
						complete : function(){ 
							if(typeof(result) == 'undefined'){
								result = true; 
							} 
							if(result == true){
								mle.register.style_ok(id);
								mle.register.email = true;
								return true;							
							} else { 
								mle.register.style_error(id,exists_msg);
								mle.register.email = false;
								return false;								
							}
						}
					});	
				} else {
					mle.register.style_ok(id);
					mle.register.email = true;
					return true;						
				}
			}			
		break;
		case '#password' :
			if($(id).val().match(/[^\'\"\\\/]{6,20}$/) == null){
				mle.register.style_error(id,error_msg);
				mle.register.password = false;
				return false;
			} else {
				mle.register.style_ok(id);
				mle.register.password = true;
				return true;
			}			
		break;
		case '#password2' :
			if($('#password2').val() == $('#password').val() && $('#password2').val() != ''){
				mle.register.style_ok(id);
				mle.register.password2 = true;
				return true;
			} else {
				mle.register.style_error(id,error_msg);
				mle.register.password2 = false;
				return false;
			}		
		break;
		case '#captcha' :
			if($('#captcha').val() != ''){
				mle.register.style_ok(id);
				mle.register.captcha = true;
				return true;
			} else {
				mle.register.style_error(id,error_msg);
				mle.register.captcha = false;
				return false;
			}		
		break;
		default: break;		
	}
}
mle.register.style_error = function(id,msg){
	$(id).parent().parent('ul').find('ol').hide();
	$(id).parent().parent('ul').find('.error').show();
	$(id).parent().parent('ul').find('.error').html(msg);
	$(id).css({'border-color':'#F60','background-color':'#FFF2F2'});
}
mle.register.style_ok = function(id){
	$(id).parent().parent('ul').find('ol').hide();
	$(id).parent().parent('ul').find('.ok').show();
	$(id).css({'border-color':'#C8C8FF','background-color':'#FFFFFF'});
}
mle.register.get_length = function(str) {
	return str.replace(/[^\x00-\xff]/g,'xx').length;
}
mle.register.rank = function(lang){
	$('#password').keyup(function(){
		var level = mle.register.password_level($(this).val());
		$('#rank_score').html(level); 
		if(level == 100){
			$('#rank_text').html(lang[6]);
			$('#rank_text').css('color','#81C31F');
			$('#rank_image').css('background-position','0 -145px');
		} else if (level >= 80){
			$('#rank_text').html(lang[5]);
			$('#rank_text').css('color','#81C31F');
			$('#rank_image').css('background-position','0 -124px');
		} else if (level >= 60){
			$('#rank_text').html(lang[4]);
			$('#rank_text').css('color','#F60');
			$('#rank_image').css('background-position','0 -103px');
		} else if (level >= 50){
			$('#rank_text').html(lang[3]);
			$('#rank_text').css('color','#F60');
			$('#rank_image').css('background-position','0 -82px');
		} else if (level >= 40){
			$('#rank_text').html(lang[2]);
			$('#rank_text').css('color','#F60');
			$('#rank_image').css('background-position','0 -61px');
		} else if (level >= 20){
			$('#rank_text').html(lang[1]);
			$('#rank_text').css('color','#E65900');
			$('#rank_image').css('background-position','0 -40px');
		} else if (level > 0){
			$('#rank_text').html(lang[0]);
			$('#rank_text').css('color','#E65900');
			$('#rank_image').css('background-position','0 -19px');
		} else { 
			$('#rank_text').html('');
			$('#rank_score').html('');
			$('#rank_image').css('background-position','0 2px');
		}
	});
}
mle.register.password_level = function(password){
	var result = 0;
	if (password.length == 0){
		result += 0;
	} else if (password.length < 8 && password.length > 0){
		result += 5;
	} else if (password.length > 10){
		result += 25;
	} else {
		result += 10;
	}
	var bHave = false;
	var bAll = false;
	var capital = password.match(/[A-Z]{1}/); 
	var small = password.match(/[a-z]{1}/); 
	if (capital == null && small == null){
		result += 0; 
		bHave = false;
	} else if (capital != null && small != null){
		result += 20;
		bAll = true;
	} else {	
		result += 10;
		bAll = true;
	}
	var bDigi = false;
	var digitalLen = 0;
	for (var i=0; i<password.length; i++){
		if (password.charAt(i) <= '9' && password.charAt(i) >= '0'){
			bDigi = true;
			digitalLen += 1;
		}
	}
	if (digitalLen == 0){ 
		result += 0;
		bDigi = false;
	} else if (digitalLen > 2){ 
		result += 20 ;
		bDigi = true;
	} else	{
		result += 10;
		bDigi = true;
	}
	var bOther = false;
	var otherLen = 0;
	for (var i=0; i<password.length; i++){
		if ((password.charAt(i) >= '0' && password.charAt(i) <= '9') || (password.charAt(i) >= 'A' && password.charAt(i) <= 'Z') || (password.charAt(i) >= 'a' && password.charAt(i) <= 'z')){
			continue;
		}
		otherLen += 1;
		bOther = true;
	}
	if (otherLen == 0){ 
		result += 0;
		bOther = false;
	} else if (otherLen > 1){ 
		result += 25;
		bOther = true;
	} else {
		result += 10;
		bOther = true;
	}
	if (bAll && bDigi && bOther){
		result += 10;
	} else if (bHave && bDigi && bOther){
		result += 6;
	} else if (bHave && bDigi){
		result += 3;
	}
	return result;
}