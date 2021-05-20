var currentPage = 1;

$('#load-more').click(function () {

    var filter = $("#filter").val();
    $.ajax({
        url: 'single-reviews/all?',
        type: 'get',
        data: {filter: filter, page: ++currentPage},
        beforeSend:function(){
            $("#load-more-button").text("Loading...");
        },
        success: function(response){
            $( "#all" ).append(response.data);

            currentPage = response.currentPage;
            $("#load-more-button").text('View all');

            if (response.lastPage === response.currentPage) {
                $("#load-more").hide();
            }

            addShortText(response.currentPage);

            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }
    })
});