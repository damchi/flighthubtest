window.addEventListener('load', function() {
    /*
           Element page add
       */
    let submitForm = document.querySelector("[name='submitFormAirline']");
    let form = document.querySelector(".formAirlines form");


    if (form && submitForm) {
        submitForm.addEventListener('click', (evt) => {
            // check mandatory fields
            if (
                form.querySelector("[name='code']").value == "" ||
                form.querySelector("[name='name_airline']").value == ""
            ){
                evt.preventDefault()
            } else {
               let id = form.querySelector("[name='id']").value ;
               let name_airline =  form.querySelector("[name='name_airline']").value;
               let code= form.querySelector("[name='code']").value;


                let param = {
                    'id': id,
                    'code':code,
                    'name_airline': name_airline,
                };

                let requete = new Request(BaseURL + "index.php?requete=addAirline",{method:'POST', body: JSON.stringify(param)});
                fetch(requete)
                    .then(response => {
                        if (response.status === 200) {
                            return response.json();
                        }
                        else {
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
