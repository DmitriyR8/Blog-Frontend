var currentPage = 1;

$('#load-more').click(function () {

    $.ajax({
        url: 'discounts/all?',
        type: 'get',
        data: {page: ++currentPage},
        beforeSend:function(){
            $("#load-more-button").text("Loading...");
        },
        success: function(response){
            $( "#coupon" ).append(response.data);

            currentPage = response.currentPage;
            $("#load-more-button").text('View all');

            if (response.lastPage === response.currentPage) {
                $("#load-more").hide();
            }

            addShortTextCoupon(response.currentPage);
            
            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }
    })
});