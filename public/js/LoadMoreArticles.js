var currentPage = 1;

$('#load-more').click(function () {

    $.ajax({
        url: 'blog-articles/all?',
        type: 'get',
        data: {page: ++currentPage},
        beforeSend:function(){
            $("#load-more-button").text("Loading...");
        },
        success: function(response){
            $( "#popular" ).append(response.data);

            currentPage = response.currentPage;
            $("#load-more-button").text('Read more');

            if (response.lastPage === response.currentPage) {
                $("#load-more").hide();
            }

            addShortText(response.currentPage);

            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }
    })
});