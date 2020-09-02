tinymce.init({
  selector: 'textarea',
  language: 'fr_FR',
  height:300,
  content_css: 'css/tinymce.css?'+ new Date().getTime(),

  toolbar: 'fontsizeselect',
  fontsize_formats: '8px 10px 12px 16px 18px 24px 32px 48px',
  toolbar: 'fontselect',
  font_formats: 'Helvetica=helvetica',

  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
    'table template paste help'
  ],
  toolbar: 'undo redo | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | forecolor backcolor | print preview',
  menubar: 'file edit view insert format tools table help',
// image picker
  image_title: true,
  automatic_uploads: true,
  file_picker_types: 'image',
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  }
});
