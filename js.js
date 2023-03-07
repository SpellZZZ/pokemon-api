var poke_container = document.getElementById('poke_container');

var colors = {
	fire: '#FDDFDF',
	grass: 'green',
	electric: '#FCF7DE',
	water: '#DEF3FD',
	ground: '#f4e7da',
	rock: '#d5d5d4',
	fairy: '#fceaff',
	poison: '#98d7a5',
	bug: '#f8d5a3',
	dragon: '#97b3e6',
	psychic: '#eaeda1',
	flying: '#F5F5F5',
	fighting: '#E6E0D4',
	normal: '#F5F5F5'
};
var main_types = Object.keys(colors);



function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function lowerCaseName(string) {
  return string.toLowerCase();
}




function getPokemon2() {

	for(var i = 1; i <= 60; i++){
		

	
	  fetch(`https://pokeapi.co/api/v2/pokemon/`+i+``)
		.then((response) => response.json())
		.then((data) => {
			
		const poke_types = data.types.map(type => type.type.name);
		const type = main_types.find(type => poke_types.indexOf(type) > -1);
		const color = colors[type];

		   document.querySelector(".pokemonBox").innerHTML += `
	
		<element onclick="switchDiv(${data.id})"<div id="${data.id}" style="background-color: ${color};" class="pokeCont" >
		<div class="pokePicture">
			<img
			  src="${data.sprites.other["official-artwork"].front_default}"
			  alt="Pokemon name" />
		</div>
      
		<div class="idText"><p>Id: ${data.id}</p></div>
        <h3>${capitalizeFirstLetter(data.name)}</h3>
		
		
		</div>
	
		  `;
		})
		.catch((err) => {
		  document.querySelector(".pokemonBoxList").innerHTML += `
		  <h4>Pokemon not found 😞</h4>
		  `;
		  console.log("Pokemon not found", err);
		});


	}
	
	delay();	

}



async function delay() {
  await new Promise(resolve => setTimeout(resolve, 1000));
  selectPokemon();
}






function selectPokemon(){
	


fetch("BazaUserDataDisplay.php")
        .then((response) => {
            if(!response.ok){ 
                throw new Error("Something went wrong!");
            }

            return response.json(); 
        })
        .then((data) => {

			for(let i = 0 ;i< data.length; i++){
				var NAME = document.getElementById(data[i].selected);
				NAME.className="pokeContSel";
			}




        })
        .catch((error) => {

        });
		
		
		


	
	
}


function switchDiv(id){
	
	var NAME = document.getElementById(id);
	
	//var key = sessionStorage.getItem("zalogowany") + "Poke" + id;	
	var operType;
	if( NAME.className ==  "pokeCont"){
		NAME.className="pokeContSel";
		operType = '1';
		//sessionStorage.setItem(key, id);
	}else {
		NAME.className="pokeCont";
		operType='0';
		
	///	sessionStorage.removeItem(key);
	}
	

	var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "BazaUserData.php?id="+id+"&op="+operType);
    xmlhttp.send();
	
	
	


	
	
	
	
}





function logOut(){
		
		var x;
		var lista;
		var isCorrect = false;
		for(var i=0;i<sessionStorage.length;i++) {
			x = sessionStorage.key(i);
			lista = sessionStorage.getItem(x);
			
			if(x  == "zalogowany"){
				
				sessionStorage.removeItem(x);
				isCorrect = true;
				break;
			}
		}
		if(isCorrect)	{
		//window.location.href = "login.html";
		}
		
}









