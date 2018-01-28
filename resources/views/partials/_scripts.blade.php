<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
var editor_config = {
    path_absolute : "{{ URL::to('/') }}/",
    selector : ".textarea",
    language: 'ar',
    branding: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
      var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
      if (type = 'image') {
        cmsURL = cmsURL+'&type=Images';
      } else {
        cmsUrl = cmsURL+'&type=Files';
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizeble : 'yes',
        close_previous : 'no'
      });
    }
};

tinymce.init(editor_config);

function ConfirmDelete()
  {
  var x = confirm("هل أنت متأكد أنك تريد حذف المقال؟");
  if (x)
    return true;
  else
    return false;
  }

</script>﻿
