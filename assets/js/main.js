// jshint esversion:6

let pageNumber = 1;

$(document).ready(() => {
  $.ajax({
    url: 'http://localhost/simple-cms/app/ajax.php',
    type: 'GET',
    success: data => {
      const postsHtml = $(data).find('div#posts-container').html();
      const postsAmount = $(data).find('div.post-preview').length;
      if (postsAmount > 10) {
        $('#older-posts').click(() => {
          pageNumber++;
          getOlderPosts(postsAmount, postsHtml, data);
        });
      }
    },
    error: () => {
      sweetAlert('Oops...', 'Something went wrong!', 'error');
    }
  });
});

function getOlderPosts(postsAmount, postsHtml, data) {
  const firstPostNumber = postsAmount.toString().charAt(0) * 10;
  const lastPostNumber = pageNumber * 10;
  const lastPost = $(data).find(`.post-preview:eq( ${lastPostNumber} )`).html();

  $('#posts-container').html('');
  for (let i = firstPostNumber; i <= lastPostNumber; i++) {
    const post = $(data).find(`.post-preview:eq( ${i} )`).html();
    if (post !== undefined) {
      $('#posts-container').append(
        `<div class="post-preview">
          ${post}
        </div>
        <hr>`
      );
    }
  }
  if (lastPost !== undefined) {
    $('#posts-container').append(
      `<div class="clearfix" id="page-navigation">
      <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
      <a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>
    </div>`
    );
  } else {
    $('#posts-container').append(
      `<div class="clearfix" id="page-navigation">
      <a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>
    </div>`
    );
  }

  $('#newer-posts').click(() => {
    pageNumber--;
    getNewerPosts(postsAmount, postsHtml, data);
  });
}

function getNewerPosts(postsAmount, postsHtml, data) {
  let firstPostNumber, lastPostNumber, lastPost;

  if (pageNumber > 1) {
    firstPostNumber = postsAmount.toString().charAt(0) * 10;
    lastPostNumber = pageNumber * 10;
    lastPost = $(data).find(`.post-preview:eq( ${lastPostNumber} )`).html();
  } else {
    firstPostNumber = 0;
    lastPostNumber = 10;
    lastPost = $(data).find(`.post-preview:eq( 10 )`).html();
  }

  $('#posts-container').html('');
  for (let i = firstPostNumber; i <= lastPostNumber; i++) {
    const post = $(data).find(`.post-preview:eq( ${i} )`).html();
    if (post !== undefined) {
      $('#posts-container').append(
        `<div class="post-preview">
          ${post}
        </div>
        <hr>`
      );
    }
  }
  if (lastPost !== undefined && pageNumber !== 1) {
    $('#posts-container').append(
      `<div class="clearfix" id="page-navigation">
      <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
      <a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>
    </div>`
    );
  } else {
    $('#posts-container').append(
      `<div class="clearfix" id="page-navigation">
        <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
    </div>`
    );
  }

  $('#older-posts').click(() => {
    pageNumber++;
    getOlderPosts(postsAmount, postsHtml, data);
  });
}

$('#delete-user-btn').click(e => {
  e.preventDefault();
  swal({
    title: 'Are you sure you want to delete your account?',
    text: "You won't be able to recover it.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it.'
  })
    .then(() => {
      window.location.href = e.target.getAttribute('data-link');
    })
    .then(() => {
      swal(
        'Deleted.',
        'Your account has been deleted. You will now be taken back to the home page',
        'success'
      );
    });
});
