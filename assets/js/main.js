// jshint esversion:6

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


