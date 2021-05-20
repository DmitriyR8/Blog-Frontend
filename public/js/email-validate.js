var cross = document.querySelector('.cross');
var emailForm = document.querySelector('.email-form');
var address = emailForm.querySelector('.email-form-wrapper input[type="email"]');
var getAccessBtn = emailForm.querySelector('.email-form-wrapper .pulse');
var footer = document.querySelector('.footer-wrapper');
var forEmail = document.querySelector('.for-email');

cross.addEventListener('click', function() {
    emailForm.style.display = 'none';
});

var validateEmail = function() {
    var reg = /^([a-z0-9]+[._-]){0,}?[a-z0-9]+@[a-z0-9]+[.]{1}[a-z]{2,4}$/i;

    if(reg.test(address.value) === false) {
        getAccessBtn.classList.remove("green");
        return false;
    } else {
        getAccessBtn.classList.add('green');

    }
};

address.addEventListener('input', function(e) {
    validateEmail();
});

getAccessBtn.addEventListener('click', function(e) {
    if (!getAccessBtn.classList.contains('green')) {
        return;
    } else {

    e.preventDefault();

    var mailto = $("#mailto").val();
    var url = $("#url").val();

    $.ajax({
        type: "POST",
        url: '/email/save',
        data: {
            action: url,
            email: mailto,
        },
        success: function (response) {
            if(response.status === 200) {
                getAccessBtn.innerText = 'Thank you!';
                setTimeout(function() {
                    address.value = '';
                    emailForm.style.display = 'none';
                }, 1500)
            } else {
                if (response.data.email[0] === 'The email must be a valid email address.') {
                    getAccessBtn.innerText = 'The email must be a valid email address!';
                    setTimeout(function() {
                        address.value = '';
                        getAccessBtn.innerText = 'GET ACCESS';
                    }, 2500)

                }
                if (response.data.email[0] === 'The email has already been taken.') {
                    getAccessBtn.innerText = 'The email has already been taken!';
                    getAccessBtn.classList.toggle('green');
                    setTimeout(function() {
                        getAccessBtn.innerText = 'GET ACCESS';
                    }, 2500)
                }
            }
            return response;
        }
    });
    }
});

