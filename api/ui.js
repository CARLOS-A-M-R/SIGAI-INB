class Interfaz{

	/*constructor(){
		this.init();
	}
	init(){
		this.construirSelect();
	}

	construirSelect(){
		cotizador.obtenerAPI()
		.then(resultado => {
			//console.log(resultado.resultado.posts);
			//resultado.resultado.posts.forEach(resultados => {
				//console.log(resultado);
			//console.log(Object.entries(resultado.resultado.posts));
			//console.log(resultado);

			const select = document.querySelector('#campo2')

			for (const [key,value] of Object.entries(resultado.resultado.posts))  {
				console.log(value);
				const opcion = document.createElement('option');
				opcion.value = value.network;
				opcion.appendChild(document.createTextNode(value.text));
				select.appendChild(opcion);	
			}
			})	
		
	}	*/

	mostrarMensaje(mensaje,clases){	
		const div = document.createElement('div');
		div.className = clases;
		div.appendChild(document.createTextNode(mensaje));

		//console.log(div);

		const divMensaje = document.querySelector('.mensajes');
		divMensaje.appendChild(div);

		setTimeout(() => {
			document.querySelector('.mensajes div').remove();
		},3000);
	}

	mostrarResultado(resultado,nombre,red){

		
		console.log(nombre);
		console.log(red);

		//let json = JSON.stringify(resultado);
		//alert(typeof json); // we've got a string!

		//alert(json);

		//const modelo =  resultado;

		//console.log(modelo);

		console.log(resultado);
		

		
		//console.log(modelo.user.name);


  //   console.log(modelo.user.name);
     


//console.log(modelo);

		//for(const [key,value] of Object.entries(resultado)){
		//	console.log(value.user);
	//	}

		//console.log(Object.entries(resultado));

		

	
		


		//for (var i in resultado) {
			//for(var j in resultado){
        //console.log(resultado[i].network);
        //console.log(resultado[i].user);
    //}

//    }

		/*let templateHTML = `
			<div class="card bg-warning">
				<div class="card-body text-light">
					<h2 class="card-title align="center">Resultado:</2>
					<p>Usuario Buscado: ${nombre}</p>
					<p>Red social: ${red}</p>
					<h2 class="card-title align="center">Datos encontrados:</2>
					<p>Dato1: </p>
				</div>
			</div>			
					`;*/

	let templateHTML = `
									
								<p>Nombre: ${nombre}</p>
									<p>Red social : ${red}</p>

									`;

	var div = document.getElementById('birds');     // The parent <div>.
      div.innerHTML = '';

		for(var i in resultado){

			if(resultado[i].network === "facebook"){

				var divRight = document.createElement('div');
               	divRight.setAttribute('class', 'column');

				var divRed = document.createElement('div');
               	divRed.setAttribute('class', 'card');
               	divRed.setAttribute('style', 'background-color:blue; color:white;');
               	divRed.innerHTML = resultado[i].network;

               	var divTex = document.createElement('div');
               	divTex.setAttribute('class', 'card');
               	divTex.innerHTML = resultado[i].text;

               	var divPost = document.createElement('div');
               	divPost.setAttribute('class', 'card');
               	divPost.innerHTML = resultado[i].posted;

               	var divPhoto = document.createElement('div');
               	divPhoto.setAttribute('class', 'card');
               	divPhoto.innerHTML = resultado[i].user.__proto__;

               	//var poid = resultado[i].postid;


               	var hola = document.createElement('a');
               	hola.innerHTML = resultado[i].postid;

               	//console.log(hr);
               	var divU = document.createElement('div');
               	divU.setAttribute('class','card');


               	divRight.appendChild(divRed);
               	divRight.appendChild(divU);
               	divRight.appendChild(divTex);
               	divRight.appendChild(divPost);
               	divRight.appendChild(divPhoto);

               	divU.appendChild(hola);

				div.appendChild(divRight);

				
			}else if(resultado[i].network === "twitter"){


							var imagen= resultado[i].user.image;
							//var red = resultado[i].network;
							//var red = "twitter";

							//console.log(red);

							var img = document.createElement('img'); 
							img.src = imagen; 


						//	console.log(img);
						

							var divRight = document.createElement('div');
               				divRight.setAttribute('class', 'column');

               				var divNuevo = document.createElement('div');
               				divNuevo.setAttribute('class','card');

               				var divRed = document.createElement('div');
               				divRed.setAttribute('class', 'card');
               				divRed.setAttribute('style', 'background-color:#00BFFF; color:white;');
               				divRed.innerHTML = resultado[i].network;

               				var divP = document.createElement('div');
               				divP.setAttribute('class', 'card');
               				divP.innerHTML = resultado[i].posted;

               				var divText = document.createElement('div');
               				divText.setAttribute('class', 'card');
               				divText.innerHTML = resultado[i].text;

               				

               				var divUrl = document.createElement('div');
               				divUrl.setAttribute('class', 'card');
               				divUrl.innerHTML = resultado[i].user.url;

               				var divNombre = document.createElement('div');
               				divNombre.setAttribute('class', 'card');
               				divNombre.innerHTML = resultado[i].user.name;


               				divRight.appendChild(divRed);
               				divRight.appendChild(divP);
               				divRight.appendChild(divNombre);
               				divRight.appendChild(divNuevo);
               				divRight.appendChild(divText);
               				
               				divRight.appendChild(divUrl);
               				
               //				divRight.appendChild(divRed);
               		
               				divNuevo.appendChild(img);

               				


               	//			divRed.appendChild(red);

              				  // Add the child DIVs to parent DIV.
              				  //div.appendChild(divLeft);
              				  div.appendChild(divRight);
              				 

              				//templateHTML += `<div class="">
 							//					<doctypeiv class="column">
 													
 							//						<div class="card">${resultado[i].network}</div>
  							//					</div>
  							//					</div>`; 			


			}else if (resultado[i].network === "instagram"){

				var divRight = document.createElement('div');
               	divRight.setAttribute('class', 'column');

				var divRed = document.createElement('div');
               	divRed.setAttribute('class', 'card');
               	divRed.setAttribute('style', 'background-color:#8a3ab9; color:black;');
               	divRed.innerHTML = resultado[i].network;

               	var divTex = document.createElement('div');
               	divTex.setAttribute('class', 'card');
               	divTex.innerHTML = resultado[i].text;

               	var divPost = document.createElement('div');
               	divPost.setAttribute('class', 'card');
               	divPost.innerHTML = resultado[i].posted;

               	var divPhoto = document.createElement('div');
               	divPhoto.setAttribute('class', 'card');
               	
               	var imagen = resultado[i].image;


               	var img = document.createElement('img'); 
				img.src = imagen; 

               	//console.log(hr);
               	var divU = document.createElement('div');
               	divU.setAttribute('class','card');
               	divU.innerHTML = resultado[i].url;


               	divRight.appendChild(divRed);
                divRight.appendChild(divPost);
                divRight.appendChild(divTex);
               	divRight.appendChild(divU);
               	divRight.appendChild(divPhoto);

               	divPhoto.appendChild(img);

				div.appendChild(divRight);

			}

			

			//console.log(imagen);

//			templateHTML += `<div class="">
 // <div class="column">
  
   // <div class="card">${imagen}</div>
    
  //</div>
 
//</div>`; 			
		}		

		//document.querySelector('#resultado').innerHTML = templateHTML;

	}
}