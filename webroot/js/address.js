var xhr;

function removeChilds(element) {
    while (element.firstChild) {
      element.removeChild(element.firstChild);
    }
}

function newElement(type, text, value, name) {
    obj = document.createElement(type);

    obj.name =  name;

    text = document.createTextNode(text);
    obj.appendChild(text);
    obj.value = value;

    return obj;
}

function zip(zip, call) {

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: webroot + "address/addresses/zip/" + zip,
        dataType: "json"
    })
    .done(function(data) {
        call(data);
    });
}

function state(country, call) {

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: webroot + "address/states/byCountry/" + country,
        dataType: "json"
    })
    .done(function(data) {
        call(data);
    });
}

function city(state, call) {

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: webroot + "address/cities/byState/" + state,
        dataType: "json"
    })
    .done(function(data) {
        call(data);
    });
}

function neighbourhood(city, call) {

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: webroot + "address/neighbourhoods/byCity/" + city,
        dataType: "json"
    })
    .done(function(data) {
        call(data);
    });
}
