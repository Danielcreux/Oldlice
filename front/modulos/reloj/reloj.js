let temporizador = setTimeout("bucle()",1000)											// Creo un temporizador
		 	
			function bucle(){																					// Esta función se va a repetir en bucle
				let tiempo = new Date();																 	// Atrapo el tiempo ahora mismo
				let hora = tiempo.getHours()																// Del tiempo, extraigo las horas
				let minuto = tiempo.getMinutes();														// Del tiempo, extraigo los minutos
				let segundo = tiempo.getSeconds()														// Del tiempo, extraigo los segundos
				let manecilla_horas = document.querySelector("#horas")							// Selecciono la manecilla de las horas del SVG
				let manecilla_minutos = document.querySelector("#minutos")						// Selecciono la manecilla de los minutos del SVG
				let manecilla_segundos = document.querySelector("#segundos")					// Selecciono la manecilla de los segundos del SVG
				let angulohoras = (hora%12)*(360/12)													// Realizo una conversion de 0-11 a 0-360
				let angulominutos = minuto*(360/60)														// Realizo una conversion de 0-59 a 0-360
				let angulosegundos = segundo*(360/60)													// Realizo una conversion de 0-59 a 0-360
				manecilla_horas.setAttribute("transform","rotate("+angulohoras+")")			// Actualizo convenientemente la rotacion de las horas
				manecilla_minutos.setAttribute("transform","rotate("+angulominutos+")")		// Actualizo convenientemente la rotacion de los minutos
				manecilla_segundos.setAttribute("transform","rotate("+angulosegundos+")")	// Actualizo convenientemente la rotacion de los segundos
				clearTimeout(temporizador)																	// Paro el temporizador
				temporizador = setTimeout("bucle()",1000)												// Y dentro de un segundo lo vuelvo a arrancar
			}