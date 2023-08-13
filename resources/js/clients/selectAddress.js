var cities = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
const btnSelect = document.getElementById('btnSelect');
var Parameter = {
    url: "http://localhost:8000/api/address",
    method: "GET",
    responseType: "application/json",
};
var promise = axios(Parameter);
promise.then(function (result) {
    renderCity(result.data);
});

// districts.style.backgroundColor = "#ebebeb";
// wards.style.backgroundColor = "#ebebeb";
// districts.disabled = true;
// wards.disabled = true;
// if (btnSelect) {
//     btnSelect.disabled = true;
// }

function renderCity(data) {
    for (const city of data) {
        cities.options[cities.options.length] = new Option(city.Name, city.Name);
    }
    cities.onchange = function () {
        district.length = 1;
        ward.length = 1;
        // districts.style.backgroundColor = "#fff";
        // districts.disabled = false;
        if (this.value != "") {
            const result = data.filter(n => n.Name === this.value);

            for (const district of result[0].Districts) {
                districts.options[districts.options.length] = new Option(district.Name, district.Name);
            }
        }
    };
    district.onchange = function () {
        ward.length = 1;
        // ward.style.backgroundColor = "#fff";
        // ward.disabled = false;
        const dataCity = data.filter((n) => n.Name === cities.value);
        if (this.value != "") {
            const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

            for (const ward of dataWards) {
                wards.options[wards.options.length] = new Option(ward.Name, ward.Name);
            }

        }
    };

    wards.onchange = function () {
        if(btnSelect) {
            btnSelect.disabled = false;
        }
    }
}

