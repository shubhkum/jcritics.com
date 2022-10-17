    $('.star').click(function(e){
        //var postID = <?php echo $postData['id']; ?>;
        //e.preventDefault();
        var ratingNum = $(this).data('value');
		var receiver=$(this).attr('name'); 
        $.post('ajax/ajax_rating_portal.php',{point:ratingNum,receiver:receiver}); 
        for (var i = ratingNum ; i >= 1; i--) {
            var id='#star'+i;
             $(id).removeClass('unrated');
             $(id).addClass('rated');  
        }

    });
    
    $('.star').hover(function(){
            $(this).prevAll().addBack().css({'color':'#FFD800FF'});
    },function(){
            $(this).prevAll().addBack().css({'color':''});
    });