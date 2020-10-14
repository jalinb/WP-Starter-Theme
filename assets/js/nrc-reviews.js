window.DS_OPT = {
    buildSummaryHTML: function(data, ctx) {
        var x;
      
        if (data && data.valid) {
          console.log(data);

          var review = data.reviews;
          var reviewsBlock = document.getElementById('reviews-block');
          //console.log(Object.keys(reviews).length);
          
          review.forEach((element, index, array) => { 
            reviewsBlock.innerHTML += 
            '<div class="col-12 col-md-4 review-single mb-3">' +
                '<div class="bubble bg-white p-3 mb-3">' +
                    '<div class="review-body">' +
                        '<p class="mb-2">' + element.body + '</p>' + 
                    '</div>' + 
                    '<div class="review-stars d-flex justify-content-end">' +
                        '<span class="ds-stars ds-stars' + element.rating + '"></span>' +
                    '</div>' + 
                '</div>' + 
                '<div class="review-community">' +
                    '<span class="white font-weight-bold">' + element.profile.name + '</span>' +
                '</div>' + 
            '</div>';
          });
 
          }

    }
};