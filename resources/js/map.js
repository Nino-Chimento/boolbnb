$(document).ready(function () {
  // Definisco una variabile con le cordinate di longitudine e latitudine dell'appartamento
  var lat = $(".lat").text();
  var lon = $(".log").text();
  var address = $(".address").text();
  var cordinateAppartamento = {
    'lat': lat,
    'lon': lon
  };
  var map = tt.map({
    container: "map",
    key: "jmSHc4P5sMLTeiGeWWoRL81YcCxYxqGp",
    style: "tomtom://vector/1/basic-main",
    center: cordinateAppartamento,
    zoom: 15
  });
  //Aggiungo un punto d'interesse all'interno della mappa
  var marker = new tt.Marker()
    .setLngLat(cordinateAppartamento)
    .addTo(map);


  //Aggiungo un pop up all'interno della mappa
  // var popupOffsets = {
  //   top: [0, 0],
  //   bottom: [0, -70],
  //   "bottom-right": [0, -70],
  //   "bottom-left": [0, -70],
  //   left: [25, -35],
  //   right: [-25, -35]
  // };

  // //Aggiungo le informazioni del nostro appartamento
  // var popup = new tt.Popup({
  //   offset: popupOffsets
  // }).setHTML(
  //   address
  // );
});
