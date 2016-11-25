$(document).ready(function() {

//initialize age;
var age = Document.getElementbyId("age");

if(age == 0){
  alert("Invalid age");
}else if(age < 6){
  alert("You are not allowed to watch Deadpool after 6.00pm");
}else if(age <= 17 && age > 6){
  alert( "You must be accompanied by a guardian who is 21 or older");
}else if(age <= 25 && age > 17){
 alert("You are allowed to watch Deadpool, right after you show some ID.");
}else{
 alert("Yay! You can watch Deadpool with no strings attached!");
}
});