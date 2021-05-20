var loadMoreBtn = document.querySelector('.read-more-btn button');
var mainBottomRightContent = document.querySelector('.main-bottom-right-content');

loadMoreBtn.addEventListener('click', function() {
    if (mainBottomRightContent.classList.length > 1) {
        mainBottomRightContent.style.transition = 'none';
        mainBottomRightContent.classList.remove('main-bottom-right-content-full');
        this.querySelector('span').textContent = 'Read more';
        const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();                
    } else {
        mainBottomRightContent.style.transition = 'max-height 1s ease';
        mainBottomRightContent.classList.add('main-bottom-right-content-full');
        this.querySelector('span').textContent = 'Read less';
        
        setTimeout(function(){
            const stickybitsInstancetoBeUpdated = stickybits('.email-form', {verticalPosition: 'bottom'});
            stickybitsInstancetoBeUpdated.update();
        }, 1000);
    }
})

var listElem = document.querySelectorAll('.navigation-content-list li');

for (var i = 0; i < listElem.length; i++) {
    listElem[i].addEventListener('click', function(){
        for (var z = 0; z < listElem.length; z++) {
            listElem[z].classList.remove('active-li');
        }
        this.classList.add('active-li');
    })
}