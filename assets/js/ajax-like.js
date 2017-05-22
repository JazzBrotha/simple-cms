(function() {
    let btn = document.querySelector('.likebtn');
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleLoading();
        let postId = e.target.getAttribute('data-post');
        let action = e.target.getAttribute('data-action');
        ajaxLike(postId, action, btn);
    });

    function ajaxLike(postId, action, btn) {
        $.ajax({
            url: 'simple-cms/user/like.php',
            type: 'post',
            data: { 'post_id': postId, 'action': action },
            success: (response) => {
                switch (response) {
                    case 'error_no_post_id':
                        window.location.href = 'simple-cms/index.php';
                        break;
                    case 'login':
                        window.location.href = 'simple-cms/public/login.php?forced=true';
                        break;
                    case 'liked':
                        btn.setAttribute('data-action', 'unlike');
                        btn.firstChild.nodeValue = 'Unlike';
                        likeCount('increase');
                        break;
                    case 'unliked':
                        btn.setAttribute('data-action', 'like');
                        btn.firstChild.nodeValue = 'Like';
                        likeCount('decrease');
                        break;
                    default:
                        break;
                }
                toggleLoading();
            },
            error: (err) => {
                console.log(err);
            }
        })
    }

    function toggleLoading() {
        document.querySelectorAll('.like-toggles').forEach((e) => {
            e.classList.toggle('hidden');
        })
    }

    function likeCount(action) {
        let heart = document.querySelector('.fa-heart-o');
        let el = document.getElementById("like-count");
        let count = parseInt(el.firstChild.nodeValue);
        if (action == 'increase') {
            el.innerHTML = count + 1;
            heart.classList.add('animate');
            document.addEventListener('transitionend', () => {
                heart.classList.remove('animate');
            })
        }
        if (action == 'decrease') el.innerHTML = count - 1;
    }

})();