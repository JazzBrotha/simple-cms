(function() {
  document.querySelectorAll('.delete-btn').forEach(el => {
    el.addEventListener('click', e => {
      let title = e.target.getAttribute('data-name');
      let name = e.target.getAttribute('name') || 'post';
      swal({
        title: `Sure you want to delete ${name} "${title}" ?`,
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function() {
        window.location.href = e.target.getAttribute('data-link');
      });
    });
  });
})();

document
  .getElementById('delete-user-btn')
  .addEventListener('click', function(e) {
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

document
  .getElementById('delete-user-btn')
  .addEventListener('click', function(e) {
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
