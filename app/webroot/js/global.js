$(document).ready(function() {
	
	//add task popup window (colorbox)
	$(".addTaskLink").colorbox({width:"50%", inline:true, href:"#addTask"});		
	
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

