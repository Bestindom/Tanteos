function validateForm() {
    let x = document.forms["myForm"]["name"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }

    let y = document.forms["myForm"]["age"].value;
    if (y < 18) {
        alert("The minimum age is 18");
        return false;
    } else if (y > 99) {
        alert("Introduce a valid age");
        return false;
    }

    let mail = document.forms["myForm"]["mail"].value;
    const check = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!check.test(mail)) {
        alert("Introduce a valid mail");
        return false;
    }

    
    let isCustomerSure = window.confirm("Are you sure you want to send the document?");

    if (isCustomerSure) {
    alert("Form sent!");
    } else {
    alert("From not sent.");
    return false;
    }
}