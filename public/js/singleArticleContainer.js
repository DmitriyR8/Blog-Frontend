var addShortText = function(pageNumber) {
    var blogInfo = document.querySelectorAll('#popular .three-blog-theme-info');
    var counter = (pageNumber - 1) * 3;
    for (var i = counter; i < blogInfo.length; i++) {
        var text = blogInfo[i].querySelector('p a');
        if (text.textContent.length > 50) {
            text.textContent = text.textContent.slice(0, 50) + '...';
        }
    }
}