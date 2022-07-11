function getParameterByName(name) {
    url = location.href;
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function getUrl() {
    url = location.href;
    if (!url) url = window.location.href;
    url = url.split('?')[0];
    return url;
}

function getId(){
    url = getUrl();
    array = url.split("/");
    return array[array.length - 1];
}