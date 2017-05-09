// jshint esversion:6
// const loginBtn = document.getElementById('login-button');
// loginBtn.addEventListener('click', function(e) {
//   e.preventDefault();
//   swal('Grattis, du har loggat in!');
// });

function loginError() {
    console.log('hej');
}

function getSummary(id) {
    $.ajax({

        type: "GET",
        url: "http://localhost/simple-cms/index.php",
        data: "id=" + id, // appears as $_GET['id'] @ your backend side
        success: function(data) {
            // data is ur summary
            // $('#summary').html(data);
            console.log(data);
        }

    });

}


// sweetAlert("Sorry...", "Username already exists!", "error");