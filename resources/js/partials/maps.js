import tt from '@tomtom-international/web-sdk-maps';
const Handlebars = require("handlebars");
const moment = require('moment');

// HOME
if (top.location.pathname == '/') {
    /* const key = at_ePKTXsPGeFZvLvzRruIoAuGwX3T1P& SECONDA SCELTA API KEY */
    /* Chiamata geoipify per ritornare lat e long dal nostro ip */
    const key = 'at_z7oYG17ozoVykgwWGmwQ3aEBuAF0H&';
    const url = 'https://geo.ipify.org/api/v1?apiKey=' + key;
    fetch(url)
        .then(results => results.json())
        .then(data => {
            const lat = data.location.lat;
            const lng = data.location.lng;
            /* Chiamata tomtom per ritornare city in italiano a partire da lat e long */
            fetch(`https://api.tomtom.com/search/2/reverseGeocode/${lat}%2C${lng}.json?key=5Z8I7aJ1jQ9uAE4iFQcNHybukpBS3Lz2`)
                .then(result => result.json())
                .then(data => {
                    const city = data.addresses[0].address.localName;
                    $('#explore-section input#geoip').val(city);
                })
        }).catch(err => {
            console.log(err);
            $('#explore-section button').attr('disabled', 'disabled');
            $('#explore-section button').html('Disabilita ad block e aggiorna la pagina');
        })
}

// INDEX APARTMENT
if ((top.location.pathname === '/user/apartments' && $('#map').length)) {

    var place = [12.48293, 41.89332];

    mapMarkerTable(place, true);
}

// CREATE APARTMENT AND EDIT APARTMENT
if (top.location.pathname === '/user/apartments/create' || top.location.href == $('#edit-apartment-form').attr('action') + '/edit') {

    $('#address').focusout(function () {
        console.log('focusout');
        var url = "https://api.tomtom.com/search/2/geocode/";
        var query = encodeURI($('#address').val())
        $.ajax({
            "url": url + query + ".json?countrySet=IT&lat=37.337&lon=-121.89&topLeft=37.553%2C-122.453&btmRight=37.4%2C-122.55&key=5Z8I7aJ1jQ9uAE4iFQcNHybukpBS3Lz2",
            "method": "GET",
            success: function (data) {

                console.log(data.results[0].address.freeformAddress);

                var address = data.results[0].address.freeformAddress;

                var long = data.results[0].position.lon;
                var lat = data.results[0].position.lat;

                $('#address').val(address);
                $('#longitude').val(long);
                $('#latitude').val(lat);
            },
            'error': function (richiesta, stato, errori) {
                console.log("errore");
            }
        });
    })
}

// SEARCH HOME PAGE
if ($('#search').val() != undefined) {
    searchCall();
}

// SEARCH GUEST
$('#searchBtn').on('click', function () {
    searchCall();
});

$('#search').keydown(function (e) {
    if (e.which == 13 && e.keyCode == 13 && $('#search').val()) {
        searchCall()
    }
});

// MARKER GUEST SHOW APARTMENT
if (top.location.pathname == '/guest/show/' + $('#apartment_id').val()) {
    let lat = $('#latitude').val();
    let long = $('#longitude').val();
    mapMarkerShow([long, lat], true);
}



/****** FUNZIONI *******/

// marker nella dashboard user
function mapMarkerTable(array, marker) {
    var map = tt.map({
        key: "5Z8I7aJ1jQ9uAE4iFQcNHybukpBS3Lz2",
        container: "map",
        zoom: 5,
        center: array,
        style: "tomtom://vector/1/basic-main"
    });

    if (marker) {
        // for (var i = 0; i < $("tbody tr").length; i++) {
        //     var lat = $(`td[data-lat-${i}]`).attr(`data-lat-${i}`);
        //     var long = $(`td[data-long-${i}]`).attr(`data-long-${i}`);
        //     var marker = new tt.Marker().setLngLat([long, lat]).addTo(map);
        // }
        $('.position').each(function () {
            let lat = $(this).children('p')[0].textContent;
            let long = $(this).children('p')[1].textContent;
            var element = document.createElement('div');
            element.id = 'marker';
            var marker = new tt.Marker({ element: element }).setLngLat([long, lat]).addTo(map);
            let prev = $(this).prev('div');
            let title = prev.children('.apartment_title-src')[0].textContent;
            let address = prev.children('.apartment_position-src')[0].textContent;
            var popupOffsets = {
                top: [0, 0],
                bottom: [-2, -40],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }
            var popup = new tt.Popup({
                offset: popupOffsets,
                closeButton: false,
                className: 'popupstyle',
            }).setHTML(`<h5>${title}</h5><br/><h6> ${address} </h6>`);
            marker.setPopup(popup);
        });
    }
}

// marker nella search guest (partials HB)
function mapMarker(array, marker) {
    var map = tt.map({
        key: "5Z8I7aJ1jQ9uAE4iFQcNHybukpBS3Lz2",
        container: "map",
        zoom: 10,
        center: array,
        style: "tomtom://vector/1/basic-main"
    });
    if (marker) {
        //   acquisisco elementi nascosti nel DOM DOPO la loro creazione
        $('.position').each(function () {
            let lat = $(this).children('p')[0].textContent;
            let long = $(this).children('p')[1].textContent;

            var element = document.createElement('div');
            element.id = 'marker';

            var marker = new tt.Marker({element: element}).setLngLat([long, lat]).addTo(map);

            /* **************************** */
            let prev = $(this).prev('span');
            let title = prev.children('.apartment_title-src')[0].textContent;
            let address = prev.children('.apartment_position-src')[0].textContent;

            var popupOffsets = {
                top: [0, 0],
                bottom: [-2, -40],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }

            var popup = new tt.Popup({
                offset: popupOffsets,
                closeButton: false,
                className: 'popupstyle',
            }).setHTML(`<h5>${ title }</h5><br/><h6> ${ address } </h6>`);
            marker.setPopup(popup);
            /* **************************** */



        });
    }
}

// marker nella show guest (passo direttamente i parametri)
function mapMarkerShow(array, marker) {
    var map = tt.map({
        key: "5Z8I7aJ1jQ9uAE4iFQcNHybukpBS3Lz2",
        container: "map",
        zoom: 10,
        center: array,
        style: "tomtom://vector/1/basic-main"
    });
    if (marker) {
        //   coordinate passate come paramentri
        // var marker = new tt.Marker().setLngLat([array[0], array[1]]).addTo(map);
        $('.position').each(function () {
            let lat = $(this).children('p')[0].textContent;
            let long = $(this).children('p')[1].textContent;
            var element = document.createElement('div');
            element.id = 'marker';
            var marker = new tt.Marker({ element: element }).setLngLat([long, lat]).addTo(map);
            let prev = $(this).prev('div');
            let title = prev.children('.apartment_title')[0].textContent;
            let address = prev.children('.apartment_position')[0].textContent;
            var popupOffsets = {
                top: [0, 0],
                bottom: [-2, -40],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }
            var popup = new tt.Popup({
                offset: popupOffsets,
                closeButton: false,
                className: 'popupstyle',
            }).setHTML(`<h5>${title}</h5><br/><h6> ${address} </h6>`);
            marker.setPopup(popup);
        });
    }
}

function searchApiDBfilter(lat, long, radius = 20) {
    $.ajax({
        "url": `http://127.0.0.1:8000/api/search/lat=${lat}&long=${long}&radius=${radius}`,
        "method": "GET",
        success: function (response) {

            let apartmentArray = [];
            let apartmentArrayPromo = [];

            response.forEach((apartment, i) => {
                let inPromo = false;
                apartment['inPromo'] = inPromo;
                if (apartment.promo.length > 0) {
                    apartment.promo.forEach((promozione, i) => {
                        let start = promozione.started_at;
                        let end = promozione.ended_at;
                        if (moment().isBetween(start, end)) {
                            inPromo = true;
                            apartmentArrayPromo.push(apartment);
                        };
                    });
                    apartment['inPromo'] = inPromo;
                } else {
                    apartmentArray.push(apartment);
                }
            });

            apartmentArray.sort(function (a, b) {
                return a.distance - b.distance
            })
            // sort dell'array per distanza crescente
            apartmentArrayPromo.sort(function (a, b) {
                return a.distance - b.distance
            })

            const newArr = apartmentArrayPromo.concat(apartmentArray);
            /* verifico se array appartamenti è vuoto */
            if (newArr.length == 0) {
                $('#apartment-view').text('Non ci sono appartamenti in questa località');
                $('#search').val('');
            } else {
                var source = $("#entry-template").html();
                var template = Handlebars.compile(source);

                /* creazione array valori checked */
                let arrCheckService = [];
                $('.service_n').each(function (index, element) {
                    if (element.checked) {
                        arrCheckService.push(parseInt(element.value));
                    }
                })

                for (let i = 0; i < newArr.length; i++) {
                    let context = newArr[i];

                    /* acquisizione parametri appartamento */
                    let servicesApartment = [];
                    context.services.forEach(element => {
                        servicesApartment.push(element.id);
                    });

                    let result = [true];
                    for (let i = 0; i < arrCheckService.length; i++) {
                        result.push(servicesApartment.includes(arrCheckService[i]));
                    }

                    let results = result.reduce(function (acc, val) {
                        return acc * val;
                    });
                    /* fine acquisizione parametri */

                    /* verifica parametri, se true stampa nel DOM */
                    if (context.bed_number >= $('#val_beds').text() &&
                        context.room_number >= $('#val_rooms').text() &&
                        context.bath_number >= $('#val_baths').text() &&
                        results) {
                        context['image'] = newArr[i].images[getRandomInt(0, newArr[i].images.length)]['img'];
                        var html = template(context);
                        $('#apartment-view').append(html);
                    }
                }

                //  CREAZIONE MAPPA, ADD MARKER
                mapMarker([long, lat], true);
            }

        },
        'error': function (richiesta, stato, errori) {
            console.log("errore");
        }
    });
}

function searchCall() {
    $('#apartment-view').empty();
    const url = "https://api.tomtom.com/search/2/geocode/";
    const query = encodeURI($('#search').val());
    $.ajax({
        "url": url + query + ".json?countrySet=IT&lat=37.337&lon=-121.89&topLeft=37.553%2C-122.453&btmRight=37.4%2C-122.55&key=5Z8I7aJ1jQ9uAE4iFQcNHybukpBS3Lz2",
        "method": "GET",
        success: function (data) {
            if (!data.results[0]) {
                $('#apartment-view').text('Località non valida');
                $('#search').val('');
            } else {
                const city = data.results[0].address.municipality;
                $('.info-apartment-src').append('<h2>' + city + ': alloggi</h2>');
                var address = data.results[0].address.freeformAddress;
                $('#search').val(address);
                var long = data.results[0].position.lon;
                var lat = data.results[0].position.lat;
                let radius = $('#range').val();
                searchApiDBfilter(lat, long, radius);
            }
        },
        'error': function (richiesta, stato, errori) {
            console.log("errore");
        }
    });
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}



// FILTRAGGIO FRONTEND
function searchApiDB(lat, long, radius = 20) {
    $.ajax({
        "url": 'http://127.0.0.1:8000/api/search',
        "method": "GET",
        success: function (response) {
            let apartmentArray = [];
            let apartmentArrayPromo = [];
            response.data.forEach((item, i) => {
                if (getDistance(lat, long, item.latitude, item.longitude) <= radius) {
                    // aggiunge l'attributo distance ad ogni elemento
                    item.distance = getDistance(lat, long, item.latitude, item.longitude);
                    if (item.promo != true) {
                        apartmentArray.push(item);
                    } else {
                        apartmentArrayPromo.push(item);
                    }
                }
            });
            // sort dell'array per distanza crescente
            apartmentArray.sort(function (a, b) {
                return a.distance - b.distance
            })
            // sort dell'array per distanza crescente
            apartmentArrayPromo.sort(function (a, b) {
                return a.distance - b.distance
            })
            const newArr = apartmentArrayPromo.concat(apartmentArray);
            /* verifico se array appartamenti è vuoto */
            if (newArr.length == 0) {
                $('#apartment-view').text('Non ci sono appartamenti in questa località');
                $('#search').val('');
            } else {
                var source = $("#entry-template").html();
                var template = Handlebars.compile(source);
                /* creazione array valori checked */
                let arrCheckService = [];
                $('.service_n').each(function (index, element) {
                    if (element.checked) {
                        arrCheckService.push(parseInt(element.value));
                    }
                })
                /* ************** */
                for (let i = 0; i < newArr.length; i++) {
                    let context = newArr[i];
                    /* acquisizione parametri appartamento */
                    let servicesApartment = [];
                    context.services.forEach(element => {
                        servicesApartment.push(element.id);
                    });
                    let result = [true];
                    for (let i = 0; i < arrCheckService.length; i++) {
                        result.push(servicesApartment.includes(arrCheckService[i]));
                    }
                    let results = result.reduce(function (acc, val) {
                        return acc * val;
                    });
                    /* fine acquisizione parametri */
                    /* verifica parametri, se true stampa nel DOM */
                    if (context.bed_number >= $('#val_beds').text() &&
                        context.room_number >= $('#val_rooms').text() &&
                        context.bath_number >= $('#val_baths').text() &&
                        results) {
                        context['image'] = newArr[i].images[getRandomInt(0, newArr[i].images.length)]['img'];
                        var html = template(context);
                        $('#apartment-view').append(html);
                    }
                }
                //  CREAZIONE MAPPA, ADD MARKER
                mapMarker([long, lat], true);
            }
        },
        'error': function (richiesta, stato, errori) {
            console.log("errore");
        }
    });
}
function getDistance(latitude1, longitude1, latitude2, longitude2) {

    const earthRadius = 6371;
    const dLat = Math.radians(latitude2 - latitude1);
    const dLon = Math.radians(longitude2 - longitude1);
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(Math.radians(latitude1)) * Math.cos(Math.radians(latitude2)) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.asin(Math.sqrt(a));
    const distance = earthRadius * c;

    return distance;
}
