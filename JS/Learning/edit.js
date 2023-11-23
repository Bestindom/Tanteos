document.getElementById("title").innerHTML = "hello";
   
function myFunction() {
  let person = prompt("Please enter your name", "Write Here");
  if (person != null) {
    document.getElementById("answer").innerHTML =
    "Hello " + person + "! How are you today?";
  }
}

console.log("testing console.log");

let x = 5;
let y = 5;
console.assert(x + y == 15, " returned 'false'");



   