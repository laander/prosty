$(function() {

	var finalScore = "#conclusion";
	costBenefit("#importance", "#importanceScore","#difficultyScore");
	costBenefit("#difficulty", "#difficultyScore", "#importanceScore");

	function costBenefit(sliderName,scoreName1,scoreName2){
		var initialValue = $(scoreName1).val();
		$(sliderName).slider({value:initialValue,min: 1,max: 5,step: 1,				
			slide: function(event, ui) {
				$(scoreName1).val(ui.value);
				$(finalScore).val(ui.value*$(scoreName2).attr("value"));
			},
			stop: function(){writeHumanScore();}
		});

		$(scoreName1).val($(sliderName).slider("value"));
		$(finalScore).val($(sliderName).slider("value"));
	}
});

function writeHumanScore(){
	var score = $("#conclusion").val();
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
