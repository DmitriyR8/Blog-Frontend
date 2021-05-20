<div class = 'add-comment'>
    <div class = 'container'>
        <div class = 'add-comment-wrapper'>
            <div class = 'underline add-comment-underline'><span>Add comment</span></div>
            <form id = 'comment-form' name = 'comment-form' validate>
                <div class = 'comment-form_title_wrapper'>
                    <input type = "text" id="title" placeholder="Title" pattern = "[A-Za-zА-Яа-яЁё0-9\s]{5,39}" title = 'This field must contain more than 4 letters and less then 40 letters' class='add-comment-title' required>
                    <label for="title" class = "label-input"><span>*</span></label>
                </div>
                <div class = 'header-comment'>
                    <div class = 'header-comment_input_wrapper'>
                        <input class='name' id="name" type = 'text'  pattern = "[^0-9]{2,}" title = 'This field must contain more than 1 letters' placeholder= "Enter your name" required>
                        <label for="name" class = "label-input"><span>*</span></label>
                    </div>
                    <span></span>
                    <div class = 'header-comment_input_wrapper_email'>
                        <input type = 'email' id="email" pattern="([a-z0-9]+[._-]){0,}?[a-z0-9]+@[a-z0-9]+[.]{1}[a-z]{2,4}$" title = "user.name@some.ca" placeholder = "Enter your actual email" required>
                        <label for="email" class = "label-input"><span>*</span></label>
                    </div>
                    <span></span>
                    <div id="rateYo" value=""></div>
                </div>
                <div class = 'comment-textarea-wrapper'>
                    <textarea id="comment" placeholder = "Add your comment" required></textarea>
                    <label for="comment" class = "label-input"><span>*</span></label>
                </div>                
                <input type="hidden" id="type" value="single-review">
                <input type="hidden" id="comment-type" value="App\SingleReview">
                <input type="hidden" id="comment-id" value="{{$reviewById['id']}}">
            </form>
            <button class = 'button raised hoverable' type = 'submit' form = 'comment-form'>
                <div class = 'anim'></div>
                Add comment
            </button>

        </div>
    </div>
</div>