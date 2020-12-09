
<!doctype html>
<html lang="es">

<head>

	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/fileinput.min.js" type="text/javascript"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>




	<!-- INICIO CSS FILE INPUT -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
	<!-- FIN CSS FILE INPUT -->
	<!-- INICIO JS FILE INPUT -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
	<!-- FIN JS FILE INPUT -->



	<title>Nosotros</title>
</head>

<body>


	<div id="container">



		<input id="archivos" name="imagenes[]" type="file" class="file-loading" multiple=true data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
	</div>


	</div>

</body>

<?php
$directory = "imagenes_/";
$images = glob($directory . "*.*");
?>

<script>
	$("#archivos").fileinput({
		uploadUrl: "upload.php",
		uploadAsync: false,
		minFileCount: 1,
		maxFileCount: 20,
		showUpload: false,
		showRemove: false,

		initialPreview: [
			<?php foreach ($images as $image) { ?> 
			"<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
			<?php } ?>
		],

		initialPreviewConfig: [<?php foreach ($images as $image) {
									$infoImagenes = explode("/", $image); ?> {
					caption: "<?php echo $infoImagenes[1]; ?>",
					height: "120px",
					url: "delete.php",
					key: "<?php echo $infoImagenes[1]; ?>",
					extra: {
						id: "<?php echo $infoImagenes[1]; ?>"
					}
				},
			<?php } ?>
		]
	}).on("filebatchselected", function(event, files) {
		$("#archivos").fileinput("upload");
	});
</script>

</html>