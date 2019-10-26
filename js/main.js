const BaseURL = document.baseURI;
window.addEventListener('load', function() {

    //form
    let form = document.querySelector(".formTrip form");
    // let btnModifier;
    // let total=[];
    let totalPrice = 0;
    let data;




    if (form) {
        let departure = form.querySelector("[name='departure_trip']");


        departure.addEventListener('change', (evt) => {
        document.getElementById("insertChild").innerHTML="";

            let param = {
                'departure_airport_id': evt.target.value,
            };


            //requeste to get the destionations possible from the departure
            let requete = new Request(BaseURL + "index.php?requete=getAirportsArrival",{method:'POST', body: JSON.stringify(param)});
            fetch(requete)
                .then(response => {

                    if (response.status === 200) {
                        return response.json();
                    }
                    else {
                        throw new Error('Erreur');
                    }
                })
                .then(response =>{
                    let output ="";

                    //if arrivals exisit create the selects and the button to submit
                    if (response.length > 0){
                        for (let i = 0; i < response.length; i++){
                            output += "<option value='"+ response[i].arrival_airport_id +"'>"+ response[i].name_airports+"</option>"
                        }

                        let node = document.createElement("SELECT");
                        node.innerHTML =output;
                        node.setAttribute('name','arrival_airport_id');

                        document.getElementById("insertChild").appendChild(node);

                    } else {
                        document.getElementById("insertChild").innerHTML="Sorry no flights to this destination yet";
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });

        let submitFormTrip = form.querySelector("[name='submitFormTrip']");
            submitFormTrip.addEventListener('click', (evt) => {
            // check mandatory fields
            if (
                form.querySelector("[name='departure_trip']").value == "" ||
                form.querySelector("[name='arrival_airport_id']").value == ""||
                form.querySelector("[name='roundTrip']").value == ""
            ){
                evt.preventDefault()
            } else {
                let departure_trip = form.querySelector("[name='departure_trip']").value ;
                let arrival_airport_id =  form.querySelector("[name='arrival_airport_id']").value;
                let round = document.getElementsByName('roundTrip');
                let radioCheck = false;
                console.log(round);

                for (var i = 0; i < round.length; i++) {
                    if (round[i].checked) {
                        radioCheck = round[i].value;
                        console.log(radioCheck);
                        break;
                    }
                }

                let param = {
                    'departure_airport_id': departure_trip,
                    'arrival_airport_id': arrival_airport_id,
                };


                if (radioCheck == 'round') {


                    let requete = new Request(BaseURL + "index.php?requete=findRoundTrip",{method:'POST', body: JSON.stringify(param)});
                    fetch(requete)
                        .then(response => {

                            if (response.status === 200) {
                                return response.json();
                            }
                            else {
                                throw new Error('Erreur');
                            }
                        })
                        .then(response =>{
                            data = response;
                            printResult(response);
                        })
                        .then(response =>{
                            printPrice(data, radioCheck, totalPrice);

                        })
                        .catch(error => {
                            console.error(error);
                        });
                } else{
                    let requeteSingle = new Request(BaseURL + "index.php?requete=findSingleTrip",{method:'POST', body: JSON.stringify(param)});
                    fetch(requeteSingle)
                        .then(response => {

                            if (response.status === 200) {
                                return response.json();
                            }
                            else {
                                throw new Error('Erreur');
                            }
                        })
                        .then(response =>{
                            data = response;
                            printResult(response);
                        })
                        .then(response =>{
                            printPrice(data, radioCheck, totalPrice);
                        })
                        .catch(error => {
                            console.error(error);
                        });

                }

            }
        });
    }

});


function printResult(response){
    document.getElementById("insertTrips").innerHTML="";

    let output ="<tr><th>Flight number</th> <th>Compagnie</th> <th>Aiport departure</th> <th>City</th><th>Departure Time</th> <th>Arrival Time</th> <th>Price</th> <th>Choice</th></tr>";
    // console.log(data);
    //if arrivals exisit create the selects and the button to submit
    if (response.length > 0){
        for (let i = 0; i < response.length; i++){
            output += "<tr>";
            output +="<td>" + response[i].code + response[i].number_flight + "</td><td>" + response[i].name_airline + "</td>";
            output +="<td>" + response[i].name_airports + "</td><td>" + response[i].city + "</td>";
            output +="<td>" + response[i].departure_time + "</td><td>" + response[i].arrival_time + "</td>";
            output +="<td>" + response[i].price + "</td>";
            output +="<td> <input type='button' value='Choose'  class='selectTrip' id='"+ response[i].number_flight +"'> </td>";
            output+= "</tr>";
        }

        let nodeTripe = document.createElement("TABLE");
        nodeTripe.innerHTML =output;
        document.getElementById("insertTrips").appendChild(nodeTripe);

    } else {
        document.getElementById("insertTrips").innerHTML="Sorry no trips yet";
    }

}
function printPrice(data,radioCheck,totalPrice ){
    let btnModifier;
    let total=[];

    btnModifier = document.querySelectorAll('.selectTrip')
    let outputPrice ="";
    if (btnModifier != undefined){
        for ( var j = 0; j < btnModifier.length; j++) {
            btnModifier[j].addEventListener('click', (evt) => {
                document.getElementById("insertPrice").innerHTML = "";
                data.find( (element)=> {
                    if( element.number_flight == evt.target.id){
                        if(radioCheck == 'round'&& total.length == 2){
                            total = [];
                            totalPrice =0;
                        }
                        if(radioCheck == 'single'&& total.length == 1){
                            total = [];
                            totalPrice =0;
                        }
                        total.push(element.price);
                        totalPrice += parseFloat(element.price);
                        outputPrice ="<h2>Price for the trip:</h2>" + totalPrice;
                        let nodePrice = document.createElement("DIV");
                        nodePrice.innerHTML =  outputPrice;
                        document.getElementById("insertPrice").appendChild(nodePrice);
                    };
                });
            });
        }
    }
}
