var addShortTextCoupon = function (pageNumber) {
    var allButtons = document.querySelectorAll('.coupon a button');
    var allInputs = document.querySelectorAll('.coupon-code');

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

    var coupon = document.querySelectorAll('.main-coupons .coupon');
    var counter = (pageNumber - 1) * 3;
    for(var i = counter; i < coupon.length; i++) {
        var description = coupon[i].children[1];
        if (description.textContent.length > 50) {
            description.textContent = description.textContent.slice(0, 50) + '...';
        }
    }
}