// jshint esversion:6
// const loginBtn = document.getElementById('login-button');
// loginBtn.addEventListener('click', function(e) {
//   e.preventDefault();
//   swal('Grattis, du har loggat in!');
// });

  // $.ajax({
  //     url : 'http://localhost/simple-cms/app/ajax.php',
  //     type : 'GET',
  //     // data : data,
  //     dataType : 'json',
  //     success : function(posts) {
  //       console.log(posts.length);
  //     },
  //     error : function() {
  //        sweetAlert("Oops...", "Something went wrong!", "error");
  //     }
  // });
//


$('#older-posts').click(function(e) {
  $('#posts-container').html('');
  $('#loader').addClass('loader');
  e.preventDefault();
  $.ajax({
    url : 'http://localhost/simple-cms/app/ajax.php',
    type : 'POST',
    data : {action: 'older'},
    success : function(data) {
      $('#loader').removeClass('loader');
      const postContainer = $(data).find('div#posts-container').html();
      $('#posts-container').html(postContainer);
    },
    error : function() {
      sweetAlert("Oops...", "Something went wrong!", "error");
    }
  });
});

// function getSummary(id)
// {
//   var values = $(this).serialize();
//   console.log(values);
//    $.ajax({
//
//      type: "GET",
//      url: "http://localhost/simple-cms/index.php",
//      data: "id=" + id, // appears as $_GET['id'] @ your backend side
//      success: function(data) {
//            // data is ur summary
//           // $('#summary').html(data);
//           console.log(data);
//      }
//
//    });



// sweetAlert("Sorry...", "Username already exists!", "error");
