// when DOM is ready
jQuery(document).ready(function($) {

	hideFlashMessage();	
	colorizeCostBenefit();
	projectSelector();
	resizeTextareas();
	tasksQuickAddModal();
	tasksToggleStatus();
	tasksSetAsAssigned();
	costBenefitSlider();
	commentPostForm();
	initTinyMce();

});

// when all images has been loaded
jQuery(window).load(function($) {

	showFlashMessage();
	logoHover();

});

function commentPostForm() {
	$('form.js-ajax').live('submit', function() {
		
		var model = $('form.js-ajax #CommentModel').val();
		var foreignKey = $('form.js-ajax #CommentForeignKey').val();
		var page = base() + '/comments/comments/index/' + model + '/' + foreignKey + '/called_from_ajax';
		button = $(this).find('.submit input');
		buttonAjaxLoad(button);
		
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
		    data: $(this).serialize(),
		    success: function(){ 
				$("#CommentComment").val(''); //reset textarea
				$('#commentsContainer').load(page); //load new comments
				buttonAjaxFinish(button);
				updateFlashMessage();
		    }
		});
			    
	    return false; 
	});
}

function costBenefitSlider() {
	if ($("#context-tasks-costbenefit .slide-wrapper .slide-container .slider").length > 0) {
		$("#context-tasks-costbenefit .slide-wrapper .slide-container .slider").slider({min: 1,max: 5,step: 1,				
			slide: function(event, ui) {
				var input = $(this).parent().children('input');
				$(input).val(ui.value);				
			},
			stop: function(){
				var inputElm = $(this).parent().children('input');
				var input = inputElm.val();
				input = input ? input : 3;			
				var secondInput = $("#context-tasks-costbenefit .slide-wrapper .slide-container .slider").not(this).parent().children('input').val();
				secondInput = secondInput ? secondInput : 3;
				var total = input*secondInput;
				humanizeCostBenefit(total);
				
				/** update automatically when slider has been invoked - no need for any submit button **/
				var doAjax = $("#context-tasks-costbenefit").hasClass("ajaxUpdate");			
				if(doAjax){
					var foreign_key = $("#foreign_key").val();
					var field = $(inputElm).attr('id');
					var callback = '#'+field+"Callback";				
					var data = {'id':foreign_key, 'field':field, 'value':input, 'callbackText': 'Saved!'}; 
	
					var ajaxLoader = $(this).find("a");
					iconAjaxLoad(ajaxLoader, "slider");
					
					$.post(base() + 'tasks/ajaxjedit/' + foreign_key, data, function(response){
						iconAjaxFinish(ajaxLoader);
						updateFlashMessage();				
					});				
				}
			}
		});	
		
		var total = 1;
		var $inputFields = $("#context-tasks-costbenefit .slide-wrapper .slide-container input");
		$.each($inputFields, function(i,input){
			var slider = $(this).parent().children('.slider');
			var res = input.value ? input.value : 3;
			total *= res; 
			$(slider).slider({value:res});			
		});
		humanizeCostBenefit(total);
	}
}

function humanizeCostBenefit(score){	
			
	var text = "";
	if (score <= 2) {
	  text = "Ignored!";	
	} else if (score < 8) {
	  text = "Low priority";	
	} else if (score < 15) {
	  text = "Average priority";	
	} else if (score < 20) {
	  text = "High priority";	
	} else if (score <= 25){
	  text = "Highest priority!";	
	}

	var oldText = $('#human-verdict').text();
	if(oldText!=text){
		$('#human-verdict').hide().html(text).fadeIn();
	}
	
	icon = "#context-tasks-costbenefit .verdict .task-costbenefit-icon";
	$(icon).html(score);
	colorizeCostBenefit(icon);	
	
}

function tasksToggleStatus() {
	/** toggle task status (solved/pending) **/
	$('.context-table-tasks a.task-status').click(function(event) {
		event.preventDefault();
		var url = $(this).attr("href");
		var container = $(this).parent("div").parent("td");		
		var anchor = this;
		iconAjaxLoad(anchor);
		$.ajax({
			  url: url,
			  success: function(status) {
				iconAjaxFinish(anchor);
				updateFlashMessage();
				if (status == "1") {
					$(container).addClass("task-complete");				
				} else {
					$(container).removeClass("task-complete");
				}				
			 }
		});
	});
}

function tasksSetAsAssigned() {
	/** toggle task status (solved/pending) **/
	$('.context-table-tasks a.task-assigned').click(function(event) {
		event.preventDefault();
		var url = $(this).attr("href");
		var container = $(this).parent("div").parent("td");		
		var anchor = this;
		replaceAjaxLoad(anchor);
		$.ajax({
			  url: url,
			  success: function(status) {
				replaceAjaxFinish(anchor, "You're assigned!");
				updateFlashMessage();				
			 }
		});
	});
}

function tasksQuickAddModal() {
	//open 'add task'-popup window (colorbox)	
	$("a.tasks-quickadd").click(function(event){
		$.colorbox.init();		
		event.preventDefault();
		$("#TaskMilestoneId").val($(this).attr("rel"));
		$.colorbox({
			title: "Quick Task",
			inline: true,
			href: "#context-tasks-quickadd",
			transition: "fade",
			opacity: 0.4,
			scrolling: false,
			speed: 300},
			function(){
				$('#TaskTitle').focus();
				$('textarea').autoResize({animate: false, extraSpace: 10, onResize: function() {
					$.colorbox.resize();
					$(this).focus();						
				}});
			});
	});
/*	
	// Show/hide more options button
	$("a.showMore").click(function(){		
		var divClass = $(this).attr('rel');		
		$("."+divClass).fadeIn();		
		$.colorbox.resize();
		$(this).hide();
		return false;
	});	
	$("a.showLess").click(function(){
		var divClass = $(this).attr('rel');		
		$("."+divClass).hide();				
		$("a.showMore").show();
		$.colorbox.resize();
		return false;
	});
*/		
};

function resizeTextareas() {
	// resize textarea fields automatically according to content
	$('textarea').not('.tinymce').each(function() {
		$(this).autoResize({animate: false, extraSpace: 10});
		$(this).keydown();
	});
	$('form.inline-edit textarea').live('focus', function() { // small hack for jeditable inline editing fields
		$(this).autoResize({animate: false, extraSpace: 10});
		$(this).keydown();
	});
}

function projectSelector() {
	// change project selector dropdown
	$('.project-selector select').change(function() {
		var project_id = $(this).val();
		window.location = base() + '/projects/view/' + project_id;
	}); 
}

// fading effect when hovering the logo
function logoHover(selector) {
	selector = "#header";
	var speed = 400;	
	$(selector).hover(
		function(event){
			$('#header img').stop().animate({ top: '0', opacity: 0 });
			$('#header span').stop().animate({ top: '50px', opacity: 1 });
		},
		function(event){
			$('#header img').stop().animate({ top: '20px', opacity: 1 });
			$('#header span').stop().animate({ top: '25px', opacity: 0 });
		}
	);	
}

function flashMessageState() {
	if ($('.flash-message').is(':visible') == true) {
		return true;
	} else {
		return false;
	}
}

// turns a integer based value to a color code for task cost-benefit
function colorizeCostBenefit(selector){
	selector = ".task-costbenefit-icon";
	$(selector).each(function() { 	
		score = $(this).html();
		var color = "";
		if (score <= 2) {
		  color = "#feddc4";	
		} else if (score < 8) {
		  color = "#fdc194";	
		} else if (score < 15) {
		  color = "#fc9851";	
		} else if (score < 20) {
		  color = "#df6712";	
		} else if (score <= 25) {
		  color = "#c03f00";	
		}
		$(this).css({"backgroundColor": color});
	});
}

function initTinyMce() {
	tinyMCE.init({
        
        // General options
        mode : "exact",
        elements : "WikiBody",
        theme : "simple"
/*    	
	    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	
	    // Theme options
	    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	    theme_advanced_toolbar_location : "top",
	    theme_advanced_toolbar_align : "left",
	    theme_advanced_statusbar_location : "bottom",
	    theme_advanced_resizing : true,
	
	    // Replace values for the template plugin
	    template_replace_values : {
	            username : "Some User",
	            staffid : "991234"
   		}
*/
	});
}