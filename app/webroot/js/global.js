$(document).ready(function() {
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
});

function afterSubmit(page){	
	$("#CommentComment").val(''); //reset textarea
	$('#commentsContainer').load(page); //load new comments
}