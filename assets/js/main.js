// jshint esversion:6

// $(document).ready(() => {
//   $('#page-navigation').append(
//     `<a class="btn btn-secondary float-right pointer" id="older-posts" data-link="1">&larr; Older Posts</a>`
//   );
//   bindOldPosts();
// });

let pageNumber = 1;

$(document).ready(() => {
  $.ajax({
    url: 'http://localhost/simple-cms/app/ajax.php',
    type: 'GET',
    success: data => {
      const postsHtml = $(data).find('div#posts-container').html();
      const postsAmount = $(data).find('div.post-preview').length;
      if (postsAmount > 10) {
        $('#page-navigation').append(
          `<a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>`
        );
        $('#older-posts').click(() => {
          pageNumber++;
          getOlderPosts(postsAmount, postsHtml, data);
        });
      }
      // const postNumber = $('.post-preview').length;
      // console.log($('.post-preview:eq(9)'));
      // $('#posts-container').html('');
      // $('#loader').removeClass('loader');

      // bindNewPosts();
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
      <a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>
    </div>`
    );
  }
  // $('#page-navigation').append(
  //   `<a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>`
  // );
  // $('#newer-posts').click(() => {
  //   pageNumber--;
  //   getNewerPosts(postsAmount, postsHtml, data);
  // });
}

function getNewerPosts(postsAmount, postsHtml, data) {
  $('#posts-container').html('');
  $('#posts-container').html(postsHtml);
  console.log(pageNumber);
  $('#page-navigation').append(
    `<a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>`
  );
  $('#older-posts').click(() => {
    pageNumber++;
    getOlderPosts(postsAmount, postsHtml, data);
  });
}

// $.ajax({
//   url: 'http://localhost/simple-cms/app/ajax.php',
//   type: 'POST',
//   data: { page: dataLink },
//   success: data => {
//     const postContainer = $(data).find('div#posts-container').html();
//     $('#loader').removeClass('loader');
//     $('#posts-container').html(postContainer);
//     $('#page-navigation').append(
//       `<a class="btn btn-secondary float-left pointer" id="newer-posts" data-link="${dataLink - 1}">&larr; Newer Posts</a>`
//     );
//     bindNewPosts();
//   },
//   error: () => {
//     sweetAlert('Oops...', 'Something went wrong!', 'error');
//   }
// });
//
// function bindNewPosts() {
//   $('#newer-posts').click(function(e) {
//     const dataLink = $(this).attr('data-link');
//     console.log(dataLink);
//     $('#posts-container').html('');
//     $('#loader').addClass('loader');
//     e.preventDefault();
//     $.ajax({
//       url: 'http://localhost/simple-cms/app/ajax.php',
//       type: 'POST',
//       data: { page: dataLink },
//       success: data => {
//         const postContainer = $(data).find('div#posts-container').html();
//         $('#loader').removeClass('loader');
//         $('#posts-container').html(postContainer);
//         $('#page-navigation').append(
//           `<a class="btn btn-secondary float-right pointer" id="older-posts" data-link="${dataLink + 1}" >Older Posts &rarr;</a>`
//         );
//         bindOldPosts();
//       },
//       error: () => {
//         sweetAlert('Oops...', 'Something went wrong!', 'error');
//       }
//     });
//   });
// }

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
