$(document).ready(function() {

  // Mobile Navigation Dropdowns
  var dropdown = $("#mobile-navigation .mobile-dropdown ul")
  dropdown.hide();
  var control = $("#mobile-navigation .mobile-dropdown .dropdown-caret")

  control.click(function() {
    // $(this).next(dropdown).toggle("fast");
    $(this).next(dropdown).toggle("fast");
  });




  // Home Page Service Types
  if ($('body').hasClass('home') ) {
    if ($(window).width() >= 768) {	
      var service = $('.service-single');
      var serviceIcon = $('.service-icon');
      var serviceDescription = $('.service-description');

      service.hover(function() {
        //Service Icon
        var iconId = $(this).attr('id');
        var iconActive = $('#' + iconId + '-icon');
        serviceIcon.removeClass('service-active');
        iconActive.addClass('service-active');
        //Service Description
        var serviceId = $(this).attr('id');
        var serviceActive = $('#' + serviceId + '-description');
        serviceDescription.removeClass('animate');
        serviceDescription.addClass('hide');
        serviceActive.removeClass('hide');
        serviceActive.addClass('animate');
      });
    }
  }




  // Home Page Hero
  if ($('body').hasClass('home') ) {
    if ($(window).width() >= 768) {	
      var heroContainer = $('.home-hero');
      var heroBackground = heroContainer.attr('style');
      var service = $('.service-wrap');

      service.hover(function() {
        var serviceImage = $(this).children('.service').attr('data-image');
        heroContainer.css('background-image', 'url(' + serviceImage + ')');
      }, function(){
        heroContainer.attr('style', heroBackground);
      });
    }
  }




  // FAQs
  if ($('body').hasClass('faqs-page') ) {
    $('#faqsAccordion').on('show.bs.collapse', function (e) {
      var faqSvg = $(e.target).siblings('.faq-header').find('svg');
      faqSvg.attr('data-icon', 'minus');
    })

    $('#faqsAccordion').on('hide.bs.collapse', function (e) {
      var faqSvg = $(e.target).siblings('.faq-header').find('svg');
      faqSvg.attr('data-icon', 'plus');
    })
  }




  // COMMUNITIES LIST

	// Default active community
	// var defaultActiveLink = $('[data-link="jackson-creek-senior-living-304"]');
	// var defaultActiveCommunity = $('#jackson-creek-senior-living-304');

	// defaultActiveLink.addClass('active');
	// defaultActiveCommunity.addClass('show');

	// Community List Functionality
	var communityBtn = $('.community-link');
	var allCommunities = $('.community-single');

	communityBtn.click(function() {
		communityBtn.removeClass('active');
		$(this).addClass('active');
		var communityBtnId = $(this).attr('data-link');
		var communityId = communityBtnId;
		var community = $('#' + communityId);
		allCommunities.removeClass('show');
		community.addClass('show');


		if ($(window).width() <= 991) {	
			$('html, body').animate( {
				scrollTop: $('#community-single').offset().top - 100,
			},
			500,'linear')
		}

  });




  // YouTube Modal
  var $videoSrc;  
  $('.video-btn').click(function() {
      $videoSrc = $(this).data( "src" );
  });

  // when the modal is opened autoplay it  
  $('#videoModal').on('shown.bs.modal', function (e) {
    // set the video src to autoplay and not to show related video.
    $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
  })
  
  // stop playing the youtube video when I close the modal
  $('#videoModal').on('hide.bs.modal', function (e) {
      // a poor man's stop video
      $("#video").attr('src',$videoSrc); 
  }) 

});