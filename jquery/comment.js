$("#comment_form").submit(function(e) {
	e.preventDefault();
	var form=$(this),
		url=form.attr("action");
		comment=form.find('input[name="comment"]').val();
		var posting=$.post(url,{comment_text:comment},function(data){
		var content=$(data);
		$('#comment_block').prepend(content);
		console.log(content);
	});

	$('#commentarea').val('');
})