window.addEventListener('load', function() {
    /*
           Element page add
       */
    let submitForm = document.querySelector("[name='submitForm']");
    let form = document.querySelector(".formAirport form");


    if (form && submitForm) {
        submitForm.addEventListener('click', (evt) => {
            // check mandatory fields
            if (form.querySelector("[name='city_code']").value == "" ||
                form.querySelector("[name='code']").value == "" ||
                form.querySelector("[name='name_airports']").value == "" ||
                form.querySelector("[name='city']").value == "" ||
                form.querySelector("[name='country_code']").value == "" ||
                form.querySelector("[name='region_code']").value == "" ||
                form.querySelector("[name='latitude']").value == "" ||
                form.querySelector("[name='longitude']").value == "" ||
                form.querySelector("[name='timezone']").value == ""
            ){
                evt.preventDefault()
            } else {
               let id = form.querySelector("[name='id']").value ;
               let city_code =  form.querySelector("[name='city_code']").value;
               let code= form.querySelector("[name='code']").value;
               let name_airports = form.querySelector("[name='name_airports']").value;
               let city = form.querySelector("[name='city']").value;
               let country_code= form.querySelector("[name='country_code']").value;
               let region_code = form.querySelector("[name='region_code']").value;
               let latitude = form.querySelector("[name='latitude']").value;
               let longitude = form.querySelector("[name='longitude']").value;
               let timezone = form.querySelector("[name='timezone']").value;

                let param = {
                    'id': id,
                    'city_code':city_code,
                    'code':code,
                    'name_airports': name_airports,
                    'city' :city,
                    'country_code': country_code,
                    'region_code': region_code,
                    'latitude': latitude,
                    'longitude': longitude,
                    'timezone':timezone
                };

                let requete = new Request(BaseURL + "index.php?requete=addAirport",{method:'POST', body: JSON.stringify(param)});
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
