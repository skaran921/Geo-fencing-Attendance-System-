function findDistance(lat1, lng1, lat2, lng2, unit) {
   {
    let radlat1 = (Math.PI * lat1) / 180;
    let radlat2 = (Math.PI * lat2) / 180;
    let lngDiff = lng1 - lng2;
    let radLngDiff = (Math.PI * lngDiff) / 180;
    let dist =
      Math.sin(radlat1) * Math.sin(radlat2) +
      Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radLngDiff);
    if (dist > 1) {
      dist = 1;
    }

    dist = Math.acos(dist);
    dist = (dist * 180) / Math.PI;
    dist = dist * 60 * 1.1515;

    if (unit == "M") {
      dist = dist * 1.609344 * 1000;
      //   alert("Distance is: " + dist.toFixed(2) + " Meter");
      return dist.toFixed(2);
    }

    if (unit == "K") {
      dist = dist * 1.609344;
      //   alert("Distance is: " + dist.toFixed(2) + " Km");
      return dist.toFixed(2);
    }

    if (unit == "N") {
      //   alert("Distance is: " + dist.toFixed(2) + " Miles");
      return dist.toFixed(2);
    }
  }
}
