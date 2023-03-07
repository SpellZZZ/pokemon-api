

function removeDiv(i){
	
	$("#"+i+"").remove();

	var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "BazaUserDelete.php?id="+i);
    xmlhttp.send();




}

function getSelectedPoke2(){
	
	
	
	
	var x;
	var id_2;
	var key;

fetch("BazaUserDataDisplay.php")
        .then((response) => {
            if(!response.ok){ 
                throw new Error("Something went wrong!");
            }

            return response.json(); 
        })
        .then((data) => {

			for(let i = 0 ;i< data.length; i++){
				
				
				
				
				
				
				
	
				
				
				
			id_2 = data[i].selected;
					
			fetch(`https://pokeapi.co/api/v2/pokemon/`+id_2+``)
			.then((response) => response.json())
			.then((data) => {
				
			const poke_types = data.types.map(type => type.type.name);
			const type = main_types.find(type => poke_types.indexOf(type) > -1);
			const color = colors[type];

			document.querySelector(".pokemonBox").innerHTML += `
			<element onclick="removeDiv(${data.id})"<div id="${data.id}" style="background-color: ${color};" class="pokeCont" >
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




        })
        .catch((error) => {

        });
		
	
	
	
	
	
	
	
	
	
	
	


	
	
	
	
	
	
	/*for(var i=0;i<data.length;i++) {
	
		//alert(data[i].selected);
		var NAME = document.getElementById(data[i].selected);
		NAME.className="pokeContSel";
		
	}*/
	

	
	

	

	
	
	
	
	
	
	
	
	
	


		
		
	}
	
		
		
		







