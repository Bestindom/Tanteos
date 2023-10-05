function calculateTip(people, totalBill ,satisfaction) {
    return (((parseInt(people) * 0.5) + parseInt(totalBill * satisfaction)) / people);
}



function validateForm() {
  let ansBill = false;
  let ansSatisfaction = false;
  let info=document.getElementById("answer");
  info.innerHTML = "";

  let people = document.getElementById("people").value;
  if (people == "") {
    people = 1;
  }

  let totalBill = document.getElementById("totalBill").value;
  if (totalBill == "") {
    document.getElementById("error").innerHTML =
    "Missing infomration in Total Bill";
  } else {
    ansBill = true;
  }

  let satisfaction = document.getElementById("multiplier").value;
  if (satisfaction == "") {
    document.getElementById("error").innerHTML =
    "Missing infomration in how was attention";
  } else {
    ansSatisfaction = true;
  }

  let tip = calculateTip(people, totalBill, satisfaction);

  console.log(tip);

  if (ansBill == true && ansSatisfaction == true) {
    info.innerHTML =  "The tip will be " + tip.toFixed(2) + "$ per person";
    document.getElementById("error").innerHTML = 
    "";
  }
}
