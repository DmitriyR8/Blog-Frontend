
var addShortText = function (pageNumber) {
    var allReviewsText = document.querySelectorAll('#all .single-review-info');
    var counter = (pageNumber - 1) * 9;
    for(var i = counter; i < allReviewsText.length; i++) {
        var text = allReviewsText[i].querySelector('.single-review-info-text-load');
        if (text.textContent.length > 40) {
            text.textContent = text.textContent.slice(0, 40) + '...';
        }
    }
}