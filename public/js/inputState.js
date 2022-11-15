    $(document).ready(function() {


        // return disable the field,county,city inputs/slecets whenever search input not empty, and inverted
        const inputSearch = document.querySelector("#search");
        const inputField = document.querySelector("#field");
        const inputCounty = document.querySelector("#county");
        const inputCity = document.querySelector("#city");


        if(inputSearch.value !== ""){
            inputField.disabled = true; // return disabled as true whenever the input field is not empty
            inputField.value = "";      // return value as empty whenever the input field is not empty
            inputCounty.disabled = true; 
            inputCounty.value = "";
            inputCity.disabled = true;
            inputCity.value = "";
        }else{
            inputField.disabled = false;
            inputCounty.disabled = false; 
            inputCity.disabled = false;
        }

        // the default state is disabled
        inputCity.disabled = true;
        // alternative is to use "change" - explained below
        inputSearch.addEventListener("keyup", inputState);


        function inputState() {
            if (document.querySelector("#search").value === "") {
                inputField.disabled = false; // enable the inputs once the inputSearch field has not content
                
                inputCounty.disabled = false;
                inputCity.disabled = true;
            } else {
                inputField.disabled = true; // return disabled as true whenever the input field is not empty
                inputField.value = "";      // return value as empty whenever the input field is not empty
                inputCounty.disabled = true; 
                inputCounty.value = "";
                inputCity.disabled = true;
                inputCity.value = "";
            }
        }



        /*
        inputField.addEventListener("change", clearSearch);
        inputCounty.addEventListener("change", clearSearch);
        inputCity.addEventListener("change", clearSearch);

        function clearSearch(){
            const clearSearch2 = document.querySelector("#search");
            const valueField2 = document.querySelector("#field").value;
            const valueCounty2 = document.querySelector("#county").value;
            const valueCity2 = document.querySelector('#city').value;

            if (valueField2 !== '' || valueCounty2 !== '' || valueCity2 !== '') {
                clearSearch.value = "";
                console.log({clearSearch});
            }
        }
        */

        

        // if all inputs value is empty then disable the submit button 
        const btnSubmit = document.getElementById('submit');

        // set the default state for submit button is dasbled
        btnSubmit.disabled = true;
        
        inputSearch.addEventListener("keyup", inputEmpty);
        inputSearch.addEventListener("change", inputEmpty);
        inputField.addEventListener("change", inputEmpty);
        inputCounty.addEventListener("change", inputEmpty);
        inputCity.addEventListener("change", inputEmpty);

        function inputEmpty() {
            const valueSearch = document.querySelector("#search").value;
            const valueField = document.querySelector("#field").value;
            const valueCounty = document.querySelector("#county").value;
            const valueCity = document.querySelector('#city').value;

            // console.log({
            //     valueSearch,
            //     valueField,
            //     valueCounty,
            //     valueCity
            // });
            if (valueSearch !== ''|| valueField !== '' || valueCounty !== '' || valueCity !== '') {
                btnSubmit.disabled = false;
            } else {
                btnSubmit.disabled = true;
            }
        }


        // if county input not empty call the getCities function from CityController.php
        
        function cityState() {

            const countyId = document.getElementById('county').value;
            const cityId = document.getElementById('city');
            //console.log({countyId});


            if (countyId !== '') {
                cityId.disabled = false;
            } else {
                cityId.disabled = true;
            }
        }
        
        $('#county').on('change', function() {
            get_city_by_county();
            cityState();
        });

        function get_city_by_county() {
            var county_id = $('#county').val();
            var token = $('[name="_token"]').val();

            // const inputToken = document.getElementById('token').value;
            // console.log(inputToken);



            $.ajax({
                "type": 'GET',
                "url": '/getCities',
                "data": {
                    "county_id": county_id
                },
                success: function(response) {
                    $('#city').html(null);
                    $('#city').append($('<option value="">Válassz várost</option>', {}));
                    //$('#city').attr("disabled", true);
                    for (var i = 0; i < response.length; i++) {
                        $('#city').append($('<option>', {
                            value: response[i].id,
                            text: response[i].city
                        }));
                    }
                }
            });
        }
    });
