    $(document).ready(function() {


        // return disable the field,county,city inputs/slecets whenever search input not empty, and inverted
        const inputSearch = document.querySelector("#search");
        const inputField = document.querySelector("#field");
        const inputCounty = document.querySelector("#county");
        const inputCity = document.querySelector("#city");


        if(inputSearch.value !== ""){

            // return disabled as true whenever the input field is not empty
            inputField.disabled = true; 
            inputCounty.disabled = true; 
            inputCity.disabled = true;

            // return value as empty whenever the input field is not empty
            inputField.value = "";      
            inputCounty.value = "";
            inputCity.value = "";
        }else{
            inputField.disabled = false;
            inputCounty.disabled = false; 
            inputCity.disabled = false;
        }

        // the default state is disabled
        inputCity.disabled = true;

        // call the inputState function on "keyup"
        inputSearch.addEventListener("keyup", inputState);


        function inputState() {
            if (document.querySelector("#search").value === "") {

                // enable the inputs once the inputSearch field has not content, but set the inputCity to disabled
                inputField.disabled = false;
                inputCounty.disabled = false;

                inputCity.disabled = true;

            } else {
                var option = '<option value="">Előbb válassz megyét</option>';
                document.getElementById('city').innerHTML = option;

                // return disabled as true whenever the input field is not empty
                inputField.disabled = true; 
                inputCounty.disabled = true; 
                inputCity.disabled = true;

                // return value as empty whenever the input field is not empty
                inputField.value = "";      
                inputCounty.value = "";
                inputCity.value = "";
            }
        }

        

        // if all inputs value is empty then disable the submit button 
        const btnSubmit = document.getElementById('submit');

        // set the default state for submit button: disabled
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

            if (valueSearch !== ''|| valueField !== '' || valueCounty !== '' || valueCity !== '') {
                // enable the submit button once an input is not empty
                btnSubmit.disabled = false;
            } else {
                // return disabled as true whenever an input is empty
                btnSubmit.disabled = true;
            }
        }


        // if county input not empty call the getCities function from CityController.php
        
        inputCounty.addEventListener("change", cityState);

        async function cityState() {

            const countySelect = document.getElementById('county').value;
            const citySelect = document.getElementById('city');

            if (countySelect !== '') {
                // enable the citySelect once the getCitiesByCounty asynchronous function succsessfully completed
                await getCitiesByCounty();
                citySelect.disabled = false;
            } else {
                // return disabled as true whenever the countySelect is empty
                var option = '<option value="">Előbb válassz megyét</option>';
                citySelect.innerHTML = option;
                citySelect.disabled = true;
            }
        }

        async function getCitiesByCounty(){

            const URL = '/getCities?county_id=' + document.getElementById('county').value;

            // request to call the getCities function from CityController.php
            const response = await fetch(URL); // waits until the request completes

            // return a promise
            const data = await response.json();

            // set a default text with null of value
            var option = '<option value="">Válassz várost</option>';

            // fill the text and value with data
            for (let i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].city + '</option>';
            }

            // insert between the <select id="city"></select> tags
            document.getElementById('city').innerHTML = option;   
        }

    });
