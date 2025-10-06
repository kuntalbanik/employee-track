
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function success(position) {
    const lat = position.coords.latitude;
    const long = position.coords.longitude;
    const longLat = {
        lat,
        long,
    };
    // console.log(longLat);
    document.getElementById('loc').value = lat+","+long;
}

function error() {
    alert("Sorry, no position available.");
}
