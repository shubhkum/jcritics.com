//if pro_india button click run function
$('.pro_india_btn').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
 var receiver = $(this).attr("rel");
//if button has class following

    if($button.hasClass('tagged')){
    //send ajax request to ajax.php for unfollow
    $.post('ajax/ajax_pro_india_portal.php',{Untag:receiver}); 
 
    //Remove button class Following
    $button.removeClass('tagged');
    $button.addClass('badge-primary')
   
} else {
    //else send ajax request for follow
    $.post('ajax/ajax_pro_india_portal.php',
        {tag:receiver}
       );
   
    //And add class following
    $button.addClass('tagged');     

    }
});
//run a function on hover on follow button 

$('.badge').hover(function(){
 //Make variable for button
     $button = $(this);

     //if button have class following
    if($button.hasClass('badge-primary')){
     //then add class unfollow
        $button.css({'background-color':'#878a8d'});
        //and add text unfollow so 
        //when you hover on follow button you'll see unfollow button
    }
}, function(){
  //if button have class following
    if($button.hasClass('badge-primary')){
      
        $button.css({'background-color':''});
    }
});

//if pro_india button click run function
$('.anti_india_btn').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
 var receiver = $(this).attr("rel");
 
//if button has class following
    if($button.hasClass('tagged')){
    //send ajax request to ajax.php for unfollow
    $.post('ajax/ajax_anti_india_portal.php',{Untag:receiver}); 
 
    //Remove button class Following
    $button.removeClass('tagged');
    $button.addClass('badge-primary')
   
} else {
    //else send ajax request for follow
    $.post('ajax/ajax_anti_india_portal.php',
        {tag:receiver}
       );
   
    //And add class following
    $button.addClass('tagged');     

    }
});


//if pro_india button click run function
$('.pro_bjp_btn').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
 var receiver = $(this).attr("rel");
 
//if button has class following
    if($button.hasClass('tagged')){
    //send ajax request to ajax.php for unfollow
    $.post('ajax/ajax_pro_bjp_portal.php',{Untag:receiver}); 
 
    //Remove button class Following
    $button.removeClass('tagged');
    $button.addClass('badge-primary')
   
} else {
    //else send ajax request for follow
    $.post('ajax/ajax_pro_bjp_portal.php',
        {tag:receiver}
       );
   
    //And add class following
    $button.addClass('tagged');     

    }
});
//run a function on hover on follow button 


//if pro_india button click run function
$('.leftist_btn').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
 var receiver = $(this).attr("rel");
 
//if button has class following
    if($button.hasClass('tagged')){
    //send ajax request to ajax.php for unfollow
    $.post('ajax/ajax_leftist_portal.php',{Untag:receiver}); 
 
    //Remove button class Following
    $button.removeClass('tagged');
    $button.addClass('badge-primary')
   
} else {
    //else send ajax request for follow
    $.post('ajax/ajax_leftist_portal.php',
        {tag:receiver}
       );
   
    //And add class following
    $button.addClass('tagged');     

    }
});
//run a function on hover on follow button 


//if pro_india button click run function
$('.rightist_btn').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
 var receiver = $(this).attr("rel");
 
//if button has class following
    if($button.hasClass('tagged')){
    //send ajax request to ajax.php for unfollow
    $.post('ajax/ajax_rightist_portal.php',{Untag:receiver}); 
 
    //Remove button class Following
    $button.removeClass('tagged');
    $button.addClass('badge-primary')
   
} else {
    //else send ajax request for follow
    $.post('ajax/ajax_rightist_portal.php',
        {tag:receiver}
       );
   
    //And add class following
    $button.addClass('tagged');     

    }
});
//run a function on hover on follow button 

$('.pro_cong_btn').click( function(e){
e.preventDefault();
//Make variable for this button
$button = $(this);
//Get follow_id from follow button rel tag
 var receiver = $(this).attr("rel");
 
//if button has class following
    if($button.hasClass('tagged')){
    //send ajax request to ajax.php for unfollow
    $.post('ajax/ajax_pro_cong_portal.php',{Untag:receiver}); 
 
    //Remove button class Following
    $button.removeClass('tagged');
    $button.addClass('badge-primary')
   
} else {
    //else send ajax request for follow
    $.post('ajax/ajax_pro_cong_portal.php',
        {tag:receiver}
       );
   
    //And add class following
    $button.addClass('tagged');     

    }
});

