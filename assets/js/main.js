// jshint esversion:6
$(document).ready(function() {
    bindOldPosts();
});

function bindOldPosts() {
  $('#older-posts').click(function(e) {
    $('#posts-container').html('');
    $('#loader').addClass('loader');
    e.preventDefault();
    $.ajax({
      url : 'http://localhost/simple-cms/app/ajax.php',
      type : 'POST',
      data : {next: 'get'},
      success : function(data) {
        $('#loader').removeClass('loader');
        const postContainer = $(data).find('div#posts-container').html();
        $('#posts-container').html(postContainer);
        $('#page-navigation').append('<a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>');
        $('#older-posts').remove();
        bindNewPosts();
      },
      error : function() {
        sweetAlert("Oops...", "Something went wrong!", "error");
      }
    });
  });
}

function bindNewPosts() {
  $('#newer-posts').click(function(e) {
    $('#posts-container').html('');
    $('#loader').addClass('loader');
    e.preventDefault();
    $.ajax({
      url : 'http://localhost/simple-cms/app/ajax.php',
      type : 'POST',
      data : {prev: 'get'},
      success : function(data) {
        $('#loader').removeClass('loader');
        const postContainer = $(data).find('div#posts-container').html();
        $('#posts-container').html(postContainer);
        bindOldPosts();
      },
      error : function() {
        sweetAlert("Oops...", "Something went wrong!", "error");
      }
    });
  });
}

$('#delete-user-btn').click(function(e) {
  e.preventDefault();
  swal({
    title: 'Are you sure you want to delete your account?',
    text: "You won't be able to recover it.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it.'
  }).then(function () {
    swal(
      'Deleted.',
      'Your account has been deleted.',
      'success'
    );
    window.location.href = e.target.getAttribute('data-link');
  });
});
