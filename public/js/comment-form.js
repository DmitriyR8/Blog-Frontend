var commentWrapper = document.querySelector('.add-comment-wrapper');
var commentForm = commentWrapper.querySelector('#comment-form');
var headerComment = commentForm.querySelector('.header-comment');
var addCommentBtn = commentWrapper.querySelector('.button');
var inputEmail = commentForm.querySelector("input[type = 'email']");
var inputName = commentForm.querySelector('.name');
var inputTitle = commentForm.querySelector('.add-comment-title');
var commentText = commentForm.querySelector('textarea');
var reg = /^([a-z0-9]+[._-]){0,}?[a-z0-9]+@[a-z0-9]+[.]{1}[a-z]{2,4}$/i;
//var reg = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
var successAddedMessage = document.createElement('p');
var failedAddedMessage = document.createElement('p');
var stars = document.querySelectorAll('.label-input > span');
successAddedMessage.classList.add('comment-push');
successAddedMessage.textContent = 'Thank you your comment on moderation soon it will be published';
failedAddedMessage.classList.add('comment-push');
failedAddedMessage.textContent = 'Sorry :( Your comment did not get moderated because not all fields are filled. \n' + 'Please try again';

var checkAllInput = function() {
	if (
		inputName.value.length > 1 &&
		reg.test(inputEmail.value) &&
		commentText.value.length > 0 &&
		inputTitle.value.length > 4	&&
		inputTitle.value.length < 40
		) {
		addCommentBtn.style.backgroundColor = 'green';
		addCommentBtn.classList.add('valid');
	} else {
		addCommentBtn.style.backgroundColor = '#BB261A';
		addCommentBtn.classList.remove('valid');
	}
};

var checkInputLength = function(value) {
	if (value.length !== 0) {
		headerComment.style.height = 'auto';
		headerComment.style.visibility = 'visible';
		inputTitle.parentNode.style.height = 'auto';
		inputTitle.parentNode.style.visibility = 'visible';
	}
};

commentText.addEventListener('input', function() {
	checkInputLength(this.value);
	if (this.value.length > 0) {
		if(commentForm.classList.contains('submitted')) {
			var newTextArea = document.querySelector('.submitted #comment');
			newTextArea.style.border = 'none';
		}
		this.parentNode.querySelector('.label-input > span').style.color = 'green';
	} else {
		if(commentForm.classList.contains('submitted')) {
			var newTextArea = document.querySelector('.submitted #comment');
			newTextArea.style.border = '1px solid #BB261A';
			newTextArea.style.borderRadius = '4px';
		}
		this.parentNode.querySelector('.label-input > span').style.color = 'red';
	}
	checkAllInput();
});

inputEmail.addEventListener('input', function() {
	checkInputLength(this.value);
	if (reg.test(this.value)) {
		this.parentNode.querySelector('.label-input > span').style.color = 'green';
	} else {
		this.parentNode.querySelector('.label-input > span').style.color = 'red';
	}
	checkAllInput();
});

inputName.addEventListener('input', function() {
	checkInputLength(this.value);
	if (this.value.length > 1) {
		this.parentNode.querySelector('.label-input > span').style.color = 'green';
	} else {
		this.parentNode.querySelector('.label-input > span').style.color = 'red';
	}
	checkAllInput();
});

inputTitle.addEventListener('input', function() {
	checkInputLength(this.value);
	if (this.value.length > 4 && this.value.length < 41) {
		this.parentNode.querySelector('.label-input > span').style.color = 'green';
	} else {
		this.parentNode.querySelector('.label-input > span').style.color = 'red';
	}
	checkAllInput();
});

addCommentBtn.addEventListener('click', function(e) {
	commentForm.classList.add('submitted');
		headerComment.style.height = 'auto';
		headerComment.style.visibility = 'visible';
		inputTitle.parentNode.style.height = 'auto';
		inputTitle.parentNode.style.visibility = 'visible';
	var newTextArea = document.querySelector('.submitted #comment');
	if(commentText.value.length <= 0) {
		newTextArea.style.border = '1px solid #BB261A';
		newTextArea.style.borderRadius = '4px';
	}
	if(addCommentBtn.classList.contains('valid')) {
		e.preventDefault();
		commentForm.classList.remove('submitted');
		addCommentBtn.classList.remove('valid');
		if ( reg.test(inputEmail.value) === false ||
			inputName.value.length < 2 ||
			commentText.value === '' ||
			inputTitle.value.length < 4) {
			commentForm.appendChild(failedAddedMessage);
			setTimeout(function() {
				commentForm.removeChild(failedAddedMessage);
			}, 2000);
		} else {
			createComment();
			commentForm.appendChild(successAddedMessage);
			setTimeout(function() {
				commentForm.removeChild(successAddedMessage);
				inputEmail.value = '';
				inputName.value = '';
				inputTitle.value = '';
				commentText.value = '';
				for(i = 0; i < stars.length; i++) {
					stars[i].style.color = 'red';
				}
				addCommentBtn.style.backgroundColor = '#BB261A';
				headerComment.removeAttribute('style');
				inputTitle.parentNode.removeAttribute('style');
			}, 2000);
		}
	}
	
});

function createComment() {

	var name = $("#name").val();
	var email = $("#email").val();
	var title = $("#title").val();
	var text = $("#comment").val();
	var rating = $("#rateYo").val();
	var type = $("#type").val();
	var id = $("#comment-id").val();
	var comment_type = $("#comment-type").val();

	$.ajax({
		type: "POST",
		url: '/comment/create',
		data: {
			name: name,
			email: email,
			title: title,
			comment_body: text,
			rating: rating ? rating : 0.5,
			type: type,
			commentable_id: id,
			commentable_type: comment_type
		},
		success: function (response) {
			return response;
		}
	});
}
