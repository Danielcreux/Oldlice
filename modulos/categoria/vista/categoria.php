<!--Listado de bloques en la página categorias -->
<main>
    <?php
    include "config.php";   	
	
		$peticion = "
		SELECT * 
		FROM bloquescategorias
		WHERE categorias_nombre = ".$_GET['cat']."
		;";																					// Creo una petición
		//echo $peticion;
		$resultado = mysqli_query($conexion, $peticion);						// Ejecuto la petición contra el servidor
																								// Creo un array vacio
		while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){		// Para cada uno de los resultados
			if($fila['tipobloque_tipo'] == "1"){                            //Si el bloque es de tipo 1
				$bloque = new BloqueCompleto(
                    $fila['titulo'], 
                    $fila['subtitulo']);                                    //Creo una nueva instancia
    			     "",
                     ""
                echo $bloque->getBloque();                                  //Lanzo el html del bloque
			}else if($fila['tipobloque_tipo'] == "2"){                      //Si el bloque es de tipo 2
				$bloque = new BloqueCaja(
                    $fila['titulo'], 
                    $fila['subtitulo']);                                    //Creo una nueva instancia
    			     "",
                     ""
                echo $bloque->getBloque();                                  //Lanzo el html del bloque
			}else if($fila['tipobloque_tipo'] == "3"){
				$bloque = new BloqueMosaico(
					$fila['titulo'], 
					$fila['subtitulo'],
					$fila['texto'],
					"",
					"",
					["uno","dos","tres","cuatro"]
					
					);
    			echo $bloque->getBloque();
			}
		 }
																		
		

    
    ?>
</main>
<script>
    <?php include "./modulos/categoria/control/categoria.js"; ?>
</script>
<style>
    <?php 
    	include "categoria.css"; 
    	?>
</style>														
		
