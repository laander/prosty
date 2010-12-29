$(document).ready(function() {

	$("#costBenefit .slideContainer .slider").slider({min: 1,max: 5,step: 1,				
		slide: function(event, ui) {
			var input = $(this).parent().children('input');
			$(input).val(ui.value);				
		},
		stop: function(){
			var inputElm = $(this).parent().children('input');
			var input = inputElm.val();
			input = input ? input : 3;			
			var secondInput = $("#costBenefit .slideContainer .slider").not(this).parent().children('input').val();
			secondInput = secondInput ? secondInput : 3;
			var total = input*secondInput;
			writeHumanScore(total);
			
			/** update automatically when slider has been invoked - no need for any submit button **/
			var doAjax = $("#costBenefit").hasClass("ajaxUpdate");			
			if(doAjax){
				var foreign_key = $("#foreign_key").val();
				var field = $(inputElm).attr('id');
				var callback = '#'+field+"Callback";				
				var data = {'id':foreign_key, 'field':field, 'value':input, 'callbackText': 'Saved!'}; 
				
				$.post('/tasks/inlineEdit/'+foreign_key, data, function(response){
					//$(callback).hide();
					$(callback).html(response).fadeIn();	
				});				
			}
				
			
		}
	});	
	
	var total = 1;
	var $inputFields = $("#costBenefit .slideContainer input");
	$.each($inputFields, function(i,input){
		var slider = $(this).parent().children('.slider');
		var res = input.value ? input.value : 3;
		total *= res; 
		$(slider).slider({value:res});			
	});
	writeHumanScore(total);
});

function writeHumanScore(score){	
	var text = "";
	if(score<=2){
	  text ="Ignored!";	
	}else if(score<8){
	  text ="Low priority";	
	}else if(score<15){
	  text ="Average priority";	
	}else if(score<20){
	  text ="High priority";	
	}else if(score<=25){
	  text ="Highest priority!";	
	}

	var oldText = $('#humanScore').text();
	if(oldText!=text){
		$('#humanScore').hide().html(text).fadeIn();
	}	
}
