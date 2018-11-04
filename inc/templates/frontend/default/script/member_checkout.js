var freight = 0; 
var insure__ = 0; 
var freight__ = 0; 
function dispatch(insure,topay,fees){
	if(insure > 0){ 
		$('#vouch').css('color','#000');
		$('#vouch input').attr({'checked':false,'disabled':false}); 
		insure__ = get_total() * insure;
	} else { 
		$('#vouch').css('color','#999');
		$('#vouch input').attr({'checked':false,'disabled':true}); 
		insure__ = 0;
	}
	if(topay == 1){ 
		$('#customer').css('color','#000');
		$('#customer input').attr({'checked':false,'disabled':false}); 
		freight__ = fees;	
	} else { 
		$('#customer').css('color','#999');
		$('#customer input').attr({'checked':false,'disabled':true}); 
		freight__ = 0;
	}
	freight = fees;
	show_freight();
}
$(function(){
	if(allows_modify){ 
		$('.consignee .input').add('textarea').focus(function(){$(this).css({'border-color':'#40B3FF','background-color':'#E5F5FF'});});
		$('.consignee .input').add('textarea').blur(function(){$(this).css({'border-color':'#C8C8FF','background-color':'#FFFFFF'});});
		$('input[name="customer"]').click(function(){
			if($(this).attr('checked')){ 
				var t = (parseFloat($('#freight').html()) - freight__); 
				$('#amount').html((get_total() + t).toFixed(2));
				$('#freight').html(t.toFixed(2)); 
			} else { 
				var t = (parseFloat($('#freight').html()) + freight__); 
				$('#amount').html((get_total() + t).toFixed(2));
				$('#freight').html(t.toFixed(2)); 
			}
		});
		$('input[name="vouch"]').click(function(){
			if($(this).attr('checked')){ 
				var t = (parseFloat($('#freight').html()) + insure__); 
				$('#amount').html((get_total() + t).toFixed(2));
				$('#freight').html(t.toFixed(2)); 
			} else { 
				var t = (parseFloat($('#freight').html()) - insure__); 
				$('#amount').html((get_total() + t).toFixed(2));
				$('#freight').html(t.toFixed(2)); 
			}
		});
		if(d_ <= 0){ 
			$('#vouch').css('color','#999');
			$('#vouch input').attr({'checked':false,'disabled':true}); 
		}
		if(f_ != 1){ 
			$('#customer').css('color','#999');
			$('#customer input').attr({'checked':false,'disabled':true}); 
		}		
		insure__ = get_total() * d_;
		freight__ = t_;
	} else { 
		$('input').add('textarea').attr({'disabled':true});
		$('input').add('textarea').css({'border':'0','background':'none'});
		$('.red').css('color','#FFF');
	}
});
function show_amount(){
 	$('#amount').html((get_total() + freight).toFixed(2));
}
function show_freight(){
	$('#freight').html(freight.toFixed(2));
	show_amount();
}
function get_total(){
	return parseFloat($('#total').html());
}