$(function() {

	/*----- Menu User ----- */
	$('.account_active').hide();
  	$('.account').on('click', function(){
  		$('.account_active').toggle('fast');
  	});
  	/*---------- */

  	/*----- SideBar ----- */
  	$('.sub-btn').on('click', function(){
  		$(this).next('.sub-item').slideToggle();
  		$(this).find('.dropdown').toggleClass('rolate');
  	});

    $('.menu_bar').on('click', function(){
      $('.side-bar').toggleClass('show');
    });
  	/*---------- */

});




