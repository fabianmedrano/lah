
<?php
$directory = '../../public/img/nosotros/nosotros_carrusel/';
$images = glob($directory . "*.*");





?>
<script>
  var tipos = ['png', 'jpg'];
  initFileInput();
  function initFileInput() {
   
  $('#inputcarrusel').fileinput({
    language: 'es',
    uploadUrl: "../../lib/fileinput/nosotros/upload.php",
 
    allowedFileExtensions: tipos,
    
    uploadAsync: true,

    showUpload: false, // hide upload button
    overwriteInitial: false, // append files to initial preview
    minFileCount: 1,
    maxFileCount: 5,
    browseOnZoneClick: true,
    
    initialPreview: [
      <?php foreach ($images as $image) { ?> "<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
      <?php } ?>
    ],
    initialPreviewConfig: [<?php foreach ($images as $image) {

        $infoImagenes = explode("/", $image); ?> {
          caption: "<?php echo $infoImagenes[6]; ?>",
          height: "120px",
          url: "../../lib/fileinput/nosotros/delete.php",
          key: "<?php echo $infoImagenes[6]; ?>",
          extra: {
            id: "<?php echo $infoImagenes[6]; ?>"
          }
        },
      <?php } ?>
    ]
  }).on("filebatchselected", function(event, files) {
    $('#inputcarrusel').fileinput("upload");
});
 
  }
  /*
  $.when(LlamarFuncion()).then(function(){

    self.getFrames(' .kv-file-upload').each(function () {
    console.log('Cambio');
});*/

/*
  $('#inputcarrusel').on('filebatchuploadsuccess', function(event, data) {
        console.log('File batch upload complete');
        $('#inputcarrusel').fileinput('destroy');
        initFileInput();
    });
    
  $('#inputcarrusel').on('filecleared', function(event) {
    $('div.alert').empty();
    $('div.alert').hide();
  });
  
    $('div.alert').hide();
*/
</script>


