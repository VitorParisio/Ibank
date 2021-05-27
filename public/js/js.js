$(function() {

	/*----- Menu User ----- */
	$('.active').hide();
  	$('.account').on('click', function(){
  		$('.active').toggle('fast');
  	});
  	/*---------- */

  	/*----- SideBar ----- */
  	$('.sub-btn').on('click', function(){
  		$(this).next('.sub-item').slideToggle();
  		$(this).find('.dropdown').toggleClass('rolate');
  	});
  	/*---------- */
});




