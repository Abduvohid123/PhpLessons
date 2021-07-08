function show_countries() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://restcountries.eu/rest/v2/all", true);
    xhr.onload = function () {
        if (xhr.status == 200) {
            let countries = JSON.parse(this.response);
            console.log(countries);
        //    var card_country_tr = undefined;
            countries.forEach((country, item) => {
                if (item % 10 == 0) {
                    card_country_tr = document.createElement('tr');
                }
                let card_country_td = document.createElement('td');
                let card_country_image = document.createElement('img');
                card_country_image.src = country.flag;
                card_country_image.style.width = "100px";
                card_country_image.style.height = "50px";
                card_country_image.className="mt-3";
                card_country_td.innerHTML = country.name;
                card_country_td.appendChild(card_country_image);
                card_country_tr.appendChild(card_country_td);
                if (item % 10 == 0) {

                    document.getElementById('demo').appendChild(card_country_tr)
                }

            });

        }
    }
    xhr.send();
}