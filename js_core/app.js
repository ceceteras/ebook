

//this increments the value of the shopping cart
function addToCartButton(){
	var x = document.getElementById('count'), counter = x.innerHTML;

		counter++;
		x.innerHTML = counter;	
				
	var http = new XMLHttpRequest();

	var book =document.getElementById('bookid').value;
	console.log(book);
	var count =document.getElementById('count').innerHTML;

	var url = "add_to_cart.php";
	var params = "counter="+count+"&id="+book;
	
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", params.length);
	//http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) {
			console.log(http.responseText);
			if(data = 100 ){
				
					var myModal = document.querySelector(".modal");
						myModal.style.display = "block";
					var alertHeader = document.getElementById("alertHeader");
            			alertHeader.innerHTML="DONE!";
            			var alertMain = document.getElementById("alertMain");
            			alertMain.innerHTML="SUCCESSFULLY ADDED!";
				

					} else{
				alert("error");
					console.log("error!!!")};
							
		};	
	
	};
	http.send(params);



};


