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
  /*
  <div id="Beijing Municipality" style="display:none;"><br/>
          Select City<span class="req">*</span>
          <select name="city" onchange="displayChinaCity(this.value)">
            <option selected= "--">--</option>
            <option value= "Beijing">Beijing</option>
            <option value= "Dongcheng">Dongcheng</option>
          </select>
        </div>
        */