window.addEventListener('load', function() {
    /*
           Element page add
       */
    let submitForm = document.querySelector("[name='submitFormFlight']");
    let form = document.querySelector(".formFlight form");


    if (form && submitForm) {
        submitForm.addEventListener('click', (evt) => {
            // check mandatory fields
            if (form.querySelector("[name='airline_id']").value == "" ||
                form.querySelector("[name='departure_airport_id']").value == "" ||
                form.querySelector("[name='number_flight']").value == "" ||
                form.querySelector("[name='arrival_airport_id']").value == "" ||
                form.querySelector("[name='arrival_time']").value == "" ||
                form.querySelector("[name='price']").value == ""
            ){
                evt.preventDefault()
            } else {
                let id = form.querySelector("[name='id']").value ;
                let airline_id =  form.querySelector("[name='airline_id']").value;
                let number_flight= form.querySelector("[name='number_flight']").value;
                let departure_airport_id = form.querySelector("[name='departure_airport_id']").value;
                let departure_time = form.querySelector("[name='departure_time']").value;
                let arrival_airport_id= form.querySelector("[name='arrival_airport_id']").value;
                let arrival_time = form.querySelector("[name='arrival_time']").value;
                let price = form.querySelector("[name='price']").value;


                let param = {
                    'id': id,
                    'airline_id':airline_id,
                    'number_flight':number_flight,
                    'departure_airport_id': departure_airport_id,
                    'departure_time' :departure_time,
                    'arrival_airport_id': arrival_airport_id,
                    'arrival_time': arrival_time,
                    'price': price,
                };
                let requete = new Request(BaseURL + "index.php?requete=addFlight",{method:'POST', body: JSON.stringify(param)});
                fetch(requete)
                    .then(response => {
                        if (response.status === 200) {
                            return response.json();
                        }
                        else {
                            console.log(response);
                            throw new Error('Erreur');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

        });

    }


});
