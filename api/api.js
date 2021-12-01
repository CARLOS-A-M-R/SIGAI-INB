class API{
	constructor(apikey){
		this.apikey = apikey;
		
	
	}


	/*async obtenerAPI(){
		const url = `https://api.social-searcher.com/v2/search?q=${this.nombre}&limit=100&key=${this.apikey}`;

		const urlObtenerAPI = await fetch(url);

		const resultado = await urlObtenerAPI.json();

		//console.log(resultado);

		return {
			resultado
		}
	}*/

	async obtenerValores(nombre,red){
		const url = `https://api.social-searcher.com/v2/search?q=${nombre}&network=${red}&limit=100&lang=es&key=${this.apikey}`;
		const urlConvertir = await fetch(url);
		const resultado = await urlConvertir.json();
		return {
			resultado
		}
	}

}