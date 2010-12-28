$(document).ready(function() {

	/** change project selctor **/
	$('select#ProjectProject').change(function() {
		var project_id = $(this).val();
        //$(location).attr('href', '/projects/views/'+project_id);
		 window.location = '/projects/view/'+project_id;
	}); 
	
	/* resize textareas automatically */
	$('textarea').not('.tinymce').each(function() {
		$(this).autoResize();
		$(this).keydown();
	});				
	
	/** show/hide div **/
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
	
	//open 'add task'-popup window (colorbox)	
	$(".addTaskLink").click(function(event){		 
		event.preventDefault();		
		var milestone_id = $(this).attr('rel');
		$('#TaskMilestoneId').val(milestone_id);
		$.colorbox({width:"50%", inline:true, href:"#addTask"}, function(){
				$('#TaskTitle').focus();
		});
	});	
	
	//$.colorbox({width:"50%", inline:true, href:"#addTask"});
	
	/** post comment **/
	$('form.js-ajax').live('submit', function() {
		
		var model = $('form.js-ajax #CommentModel').val();
		var foreignKey = $('form.js-ajax #CommentForeignKey').val();
		var page = '/comments/comments/index/'+model+'/'+foreignKey+'/called_from_ajax';
	
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
		    data: $(this).serialize(),
		    success: function(){ afterSubmit(page); }
		});
			    
	    return false; 
	});
	
	/** toggle task status (solved/pending) **/
	$('.milestone .tasks .toggleStatus').click(function(event) {
		event.preventDefault();
		var url = $(this).parent("a").attr("href");
		var container = $(this).parent("a").parent("p");		
		$.ajax({
			  url: url,
			  success: function(status) {
				if(status=="s0"){
					$(container).removeClass("taskDone");
					$(container).addClass("taskPending");
				}else{
					$(container).addClass("taskDone");
					$(container).removeClass("taskPending");
				}				
			 }
		});
	});
	
});

function afterSubmit(page){	
	$("#CommentComment").val(''); //reset textarea
	$('#commentsContainer').load(page); //load new comments
}