document.addEventListener("DOMContentLoaded", function geodisplay() {
    if (document.cookie.includes("ctry=BE") !== false) { //default country of your website
    } else if (document.cookie.includes("ctry=FR") !== false ) {
      const geoFR = document.querySelectorAll("#geodisplay_fr");
        geoFR.forEach((element) => {
          element.classList.remove("hide");
        });
        const geoBE = document.querySelectorAll("#geodisplay_be");
        geoBE.forEach((element) => {
          element.classList.add("hide");
        });
    } else if (document.cookie.includes("ctry=LU") !== false ) {
      const geoLU = document.querySelectorAll("#geodisplay_lu");
        geoLU.forEach((element) => {
          element.classList.remove("hide");
        });
        const geoBE = document.querySelectorAll("#geodisplay_be");
        geoBE.forEach((element) => {
          element.classList.add("hide");
        });
    }
  });