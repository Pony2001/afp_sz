    $(document).ready(function() {

        const inputSearch = document.querySelector("#search");
        const inputField = document.querySelector("#field");
        const inputCounty = document.querySelector("#county");
        const inputCity = document.querySelector("#city");

        // the default state is disabled
        inputCity.disabled = true;
        // alternative is to use "change" - explained below
        inputSearch.addEventListener("keyup", inputState);


        function inputState() {
            if (document.querySelector("#search").value === "") {
                inputField.disabled = false; // enable the inputs once the inputSearch field has not content
                inputCounty.disabled = false;
                inputCity.disabled = false;
            } else {
                inputField.disabled = true;
                inputCounty.disabled = true; // return disabled as true whenever the input field is not empty
                inputCity.disabled = true;
            }
        }

        function cityState() {


            const countyId = document.getElementById('county').value;
            const cityId = document.getElementById('city');


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
