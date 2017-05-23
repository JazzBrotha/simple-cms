// jshint esversion:6

let pageNumber = 1;

$(document).ready(() => {
  const header = $('#main-header').html();
  if (header !== undefined) {
    $.ajax({
      url: 'http://localhost/simple-cms/app/ajax.php',
      type: 'GET',
      success: data => {
        const postsAmount = $(data).find('div.post-preview').length;
        if (postsAmount > 10) {
          $('#posts-container').append(
            `<div class="clearfix" id="page-navigation">
                  <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
              </div>`
          );
          $('#older-posts').click(() => {
            let prevPage = pageNumber;
            pageNumber++;
            getOlderPosts(prevPage, data);
          });
        }
      },
      error: () => {
        sweetAlert('Oops...', 'Something went wrong!', 'error');
      }
    });

    const getOlderPosts = (prevPage, data) => {
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      const firstPostNumber = prevPage * 10 + 1;
      const lastPostNumber = pageNumber * 10;
      const lastPost = $(data)
        .find(`.post-preview:eq( ${lastPostNumber + 1} )`)
        .html();
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
        $('#older-posts').click(() => {
          prevPage = pageNumber;
          pageNumber++;
          getOlderPosts(prevPage, data);
        });
      } else {
        $('#posts-container').append(
          `<div class="clearfix" id="page-navigation">
            <a class="btn btn-secondary float-left pointer" id="newer-posts">&larr; Newer Posts</a>
          </div>`
        );
      }

      $('#newer-posts').click(() => {
        prevPage = pageNumber;
        pageNumber--;
        getNewerPosts(prevPage, data);
      });
    };

    const getNewerPosts = (prevPage, data) => {
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      let firstPostNumber, lastPostNumber, lastPost;

      if (pageNumber > 1) {
        firstPostNumber = pageNumber * 10 + 1 - 10;
        lastPostNumber = prevPage * 10 - 10;
        lastPost = $(data)
          .find(`.post-preview:eq( ${lastPostNumber + 1} )`)
          .html();
      } else {
        firstPostNumber = 0;
        lastPostNumber = 9;
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
        $('#newer-posts').click(() => {
          prevPage = pageNumber;
          pageNumber--;
          getNewerPosts(prevPage, data);
        });
      } else {
        $('#posts-container').append(
          `<div class="clearfix" id="page-navigation">
              <a class="btn btn-secondary float-right pointer" id="older-posts">Older Posts &rarr;</a>
          </div>`
        );
      }

      $('#older-posts').click(() => {
        prevPage = pageNumber;
        pageNumber++;
        getOlderPosts(prevPage, data);
      });
    };
  }
});
