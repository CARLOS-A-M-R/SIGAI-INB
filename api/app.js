//const cotizador = new API('573a7d1d44310872108cfa2865c54db9');
const cotizador = new API('b86c33f71260369c5c7e2442aed647f3');

const ui = new Interfaz();

//cotizador.obtenerAPI();

//ui.mostrarMensaje('texto','clases');

const formulario = document.querySelector('#formulario');

formulario.addEventListener('submit',(e) => {
	e.preventDefault();

	//console.log('enviando...');

	const Selectcampo1 = document.querySelector('#campo1');
	const Selecionadocampo1 = Selectcampo1.options[Selectcampo1.selectedIndex].value;

	const Selectcampo2 = document.querySelector('#campo2');
	const Selecionadocampo2 = Selectcampo2.options[Selectcampo2.selectedIndex].value;

	if(Selecionadocampo1 === '' || Selecionadocampo2 === ''){
		//console.log('Selecciona algo');

		ui.mostrarMensaje('Ambos campos son obligatorios','alert bg-danger text-center');

		
	}else{
		//console.log('Muy bien');
		cotizador.obtenerValores(Selecionadocampo1,Selecionadocampo2)
			.then(resultado=>{
				//console.log(data)
				ui.mostrarResultado(resultado.resultado.posts,Selecionadocampo1,Selecionadocampo2);
			})
	}
} )