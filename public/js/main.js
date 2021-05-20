"use strict";

$(window).on('resize', function() {
    const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
    stickybitsInstancetoBeUpdated.update();
})

var burger = document.getElementById("checkbox-burger");
burger.addEventListener("click",function(){
    document.documentElement.classList.toggle("overflow-hidden")
});

//Copy discount
var allButtons = document.querySelectorAll('.coupon a button');
var allInputs = document.querySelectorAll('.coupon-code');
var success = document.createElement('div');
success.classList.add('success-copy');
success.innerText = 'Successful copy';

var copyToClipboard = function(element) {
    var range = document.createRange();
    range.selectNode(element);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
}

var popperCreater = function(coupon, el) {
    var popperBlock = document.createElement('div');
    coupon.appendChild(popperBlock);
    popperBlock.textContent = 'Copied';
    popperBlock.classList.add('styled-popper');
    
    var popper = new Popper(el, popperBlock, {
        placement: 'top'
    });

    popperBlock.style.opacity = '0.2';

    setTimeout(function() {
        coupon.removeChild(popperBlock);
    }, 1500);
}

for (var i = 0; i < allButtons.length;i++) {
    allButtons[i].addEventListener('click', function() {
        var link = this.parentNode;
        var coupon = link.parentNode;
        var couponCodeBlock = coupon.querySelector('.coupon-code');
        var input = couponCodeBlock.querySelector('input');

        copyToClipboard(input);

        couponCodeBlock.appendChild(success);
    });
};

for (var i = 0; i < allInputs.length; i++) {
    allInputs[i].addEventListener('click', function() {
        var couponCodeBlock = this;
        var input = couponCodeBlock.querySelector('input');

        copyToClipboard(input);

        couponCodeBlock.appendChild(success);

    });
};


// All reviews
var allReviewsText = document.querySelectorAll('.single-review-info');
for(var i = 0; i < allReviewsText.length; i++) {
    var text = allReviewsText[i].querySelector('.single-review-info-text');
    if (text.textContent.length > 40) {
        text.textContent = text.textContent.slice(0, 40) + '...';
    }
}

var filterReviews = document.querySelectorAll('.filter');
for(var i = 0; i < filterReviews.length; i++) {
    filterReviews[i].addEventListener('click', function() {
        for (var z = 0; z < filterReviews.length; z++) {
            filterReviews[z].classList.remove('active-filter-reviews');
        }
        this.classList.add('active-filter-reviews');
    })
}

//Search page
var resultBlock = document.getElementsByClassName('result');
if (this.innerWidth < 560) {
    for(var i = 0; i < resultBlock.length; i++) {
        var resultText = resultBlock[i].querySelector('.result-description');
        if (resultText.innerHTML.length > 160) {
            resultText.innerHTML = resultText.innerHTML.slice(0, 160) + '...';
        }
    }
}


//Discount page
var coupon = document.querySelectorAll('.coupon');
for(var i = 0; i < coupon.length; i++) {
    var description = coupon[i].children[1];
    if (description.textContent.length > 50) {
        description.textContent = description.textContent.slice(0, 50) + '...';
    }
}

var banner = document.querySelectorAll('.rate-banner');
for(var i = 0; i < banner.length; i++) {
    var description = banner[i].children[1].querySelector('p a');
    if (description.textContent.length > 50) {
        description.textContent = description.textContent.slice(0, 50) + '...';
    }
}

//blog page
var blogInfo = document.querySelectorAll('.three-blog-theme-info, .blog-theme-last-info, .blog-theme');
for(var i = 0; i < blogInfo.length; i++) {
    var blogInfoText = blogInfo[i].querySelector('p a');
    if (blogInfo[i].classList.contains('blog-theme-last-info') || blogInfo[i].classList.contains('blog-theme')) {
        if (blogInfoText.textContent.length > 150) {
            blogInfoText.textContent = blogInfoText.textContent.slice(0, 150) + '...';
        }
    } else {
        if (blogInfoText.textContent.length > 50) {
            blogInfoText.textContent = blogInfoText.textContent.slice(0, 50) + '...';
        }
    }
}

$("#click").click(function () {
    var query = $("#string").val();

    $.ajax({
         url: '/',
         type: 'get',
         data: {query: query},
         success: function(response) {
             if (query) {
                 window.location = ("../search?query=" + query + "");
                 return response;
             }
         }
     });
});

$("#click-burger").click(function (e) {
    e.preventDefault();

    var query = $("#string-burger").val();

    $.ajax({
        url: '/',
        type: 'get',
        data: {query: query},
        success: function(response) {
            if (query) {
                window.location = ("../search?query=" + query + "");
                return response;
            }
        }
    });
});