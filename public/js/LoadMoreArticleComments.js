var currentPage = 1;

$('#load-more-article').click(function () {

    var article_id = $("#article-id").val();
    $.ajax({
        url: "/article-comments/"+ article_id +"?",
        type: 'get',
        data: {page: ++currentPage},
        beforeSend:function(){
            $("#load-more-article-button").text("Loading...");
        },
        success: function(response){
            $( "#article-comments" ).append(response.data);

            currentPage = response.currentPage;
            $("#load-more-article-button").text('Read more reviews');

            if (response.lastPage === response.currentPage) {
                $("#load-more-article").hide();
            }

            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }
    })
});