  (function() {
      document.addEventListener('DOMContentLoaded', () => {
          document.getElementById('post-preview-btn').addEventListener('click', preview);
      })

      //triggers tinymce preview function when preview button is clicked
      function preview() {
          event.preventDefault();
          tinymce.activeEditor.execCommand('mcePreview');
      }
  })();

  tinymce.init({
      selector: '#text-area',
      height: 400,
      theme: 'modern',
      plugins: [
          'advlist autolink autosave lists link image charmap preview hr anchor',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'media nonbreaking save table contextmenu directionality',
          'template paste textcolor colorpicker textpattern imagetools codesample toc'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |',
      toolbar2: 'forecolor backcolor | link image media codesample | code restoredraft preview |',
      image_advtab: true,
      templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
      ],
      content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css'
      ],
      plugin_preview_width: 1000
  });