var currentPage = 1;

$('#load-more-review').click(function () {

    var review_id = $("#review-id").val();
    $.ajax({
        url: "/review-comments/"+ review_id +"?",
        type: 'get',
        data: {page: ++currentPage},
        beforeSend:function(){
            $("#load-more-review-button").text("Loading...");
        },
        success: function(response){
            $( "#review-comments" ).append(response.data);

            currentPage = response.currentPage;
            $("#load-more-review-button").text('Read more reviews');

            if (response.lastPage === response.currentPage) {
                $("#load-more-review").hide();
            }

            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }
    })
});