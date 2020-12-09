




<?php
// COMPROBACIÓN INICIAL ANTES DE CONTINUAR CON EL PROCESO DE UPLOAD
// **********************************************************************


	if (empty($_FILES['inputcarrusel'])) {
		echo json_encode(['error' => 'No hay ficheros para realizar upload.']);
		return;
	}

	// DEFINICIÓN DE LAS VARIABLES DE TRABAJO (CONSTANTES, ARRAYS Y VARIABLES)
	// ************************************************************************

	define('DIR_DESCARGAS', realpath(dirname(__FILE__, 4)) . '\public\img\nosotros\nosotros_carrusel');
	$ficheros = $_FILES['inputcarrusel'];
	$estado_proceso = NULL;
	$paths = array();
	$nombres_ficheros = $ficheros['name'];

	// LÍNEAS ENCARGADAS DE REALIZAR EL PROCESO DE UPLOAD POR CADA FICHERO RECIBIDO
	// ****************************************************************************

	if (!file_exists(DIR_DESCARGAS)) @mkdir(DIR_DESCARGAS);

	if (file_exists(DIR_DESCARGAS)) {
		for ($i = 0; $i < count($nombres_ficheros); $i++) {

			$nombre_extension = explode('.', basename($nombres_ficheros[$i]));
			$extension = array_pop($nombre_extension);
			$nombre = array_pop($nombre_extension);
			$archivo_destino = DIR_DESCARGAS . DIRECTORY_SEPARATOR . utf8_decode($nombre) . '.' . $extension;

			if (move_uploaded_file($ficheros['tmp_name'][$i], $archivo_destino)) {
				$estado_proceso = true;

				$paths[] = $archivo_destino;
			} else {
				$estado_proceso = false;
				break;
			}
		}
	}

	// PREPARAR LAS RESPUESTAS SOBRE EL ESTADO DEL PROCESO REALIZADO
	// **********************************************************************

	$respuestas = array();
	if ($estado_proceso === true) {
		$respuestas = array();
		$respuestas = ['dirupload' => basename(DIR_DESCARGAS), 'total' => count($paths)];
	} elseif ($estado_proceso === false) {
		$respuestas = ['error' => 'Error al subir los archivos. Póngase en contacto con el administrador del sistema'];
		foreach ($paths as $fichero) {
			unlink($fichero);
		}
	} else {
		$respuestas = ['error' => 'No se ha procesado ficheros.'];
	}

	// RESPUESTA DEVUELTA POR EL SCRIPT EN FORMATO JSON
	// **********************************************************************

	// Devolvemos el array asociativo en formato JSON como respuesta
	echo json_encode($respuestas);

?>