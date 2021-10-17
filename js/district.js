function displayCountry(answer) {
    document.getElementById(answer).style.display = "block";
    if (answer == "Karnataka") {
      document.getElementById("Kerala").style.display = "none";
      document.getElementById("Delhi").style.display = "none";
    } else if (answer == "Kerala") {
      document.getElementById("Karnataka").style.display = "none";
      document.getElementById("Delhi").style.display = "none";
    } else if (answer == "Delhi") {
      document.getElementById("Karnataka").style.display = "none";
      document.getElementById("Kerala").style.display = "none";
    }
  }