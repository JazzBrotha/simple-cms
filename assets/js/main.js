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



// sweetAlert("Sorry...", "Username already exists!", "error");
