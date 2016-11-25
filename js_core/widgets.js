//MY MODAL DISPLAY
	//this triggers the modal class
	function callModal(){
		var myModal = document.querySelector(".modal");
			myModal.style.display = "block";
		var alertHeader = document.getElementById("alertHeader");
            alertHeader.innerHTML="DONE!";
        var alertMain = document.getElementById("alertMain");
            alertMain.innerHTML="SUCCESSFULLY ADDED!";
	};
	//this closes the modal class
	function closeModal(){
		var modal = document.getElementById('myModal');
		var close = modal.style.display = "none";
			}

	//When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		var modal = document.getElementById('myModal');
		if (event.target == modal) {
			modal.style.display = "none";
		}
	};
