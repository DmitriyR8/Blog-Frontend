var currentPage = 1;
var shortText = function(pageNumber) {
    var resultBlock = document.getElementsByClassName('result');
    var counter = (pageNumber - 1) * 6;
    if (this.innerWidth < 560) {
        for(var i = counter; i < resultBlock.length; i++) {
            var resultText = resultBlock[i].querySelector('.result-description');
            if (resultText.innerHTML.length > 160) {
                resultText.innerHTML = resultText.innerHTML.slice(0, 160) + '...';
            }
        }
    }
}

$('#load-more').click(function () {

    var query = $("#query").val();

    $.ajax({
        url: 'search/all?',
        type: 'get',
        data: {query: query, page: ++currentPage},
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

            shortText(response.currentPage);

            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }
    })
});