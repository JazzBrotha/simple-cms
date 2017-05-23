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
