 // my javascript library
$(document).ready(function() {

var counter = $("#Count").html();

 $(".cart").click(function(){ 
 		counter++;  
 	  	var id= $("#bookid").val();

     $.ajax({
				url: "add_to_cart.php",
				type:"POST",
				data:'id='+ id + '&counter='+ counter,
				beforeSend: function(){
					//$('.cart').html('Please wait..<i class="fa fa-spin fa-spinner"></i>');	
				},
				success: function(data){
					if(data == 100 ){
						//window.location = "login.html";
						$('.modal').show();
						
					}else{
						if(data == 200){
							window.location.href = "error_modal.php";	
						    
						    }
						
				    }
					 console.log(data);
				},
				
				timeout: 10000,
				complete:function(){
					//	$('#cart').removeClass('btn-default').addClass('btn-primary').html('cart');
					},
				})
				
         });

//...................livesearch............................................


	
/*	$("#searchit").keydown(function(){	
		var searchit = $("#searchit").val();
			$.post("search.php", {searchit:searchit}, 
		function(data){
			$("#option").html(data);
			console.log(data);
			});

})*/
$("#searchit").change(function(){	
		var searchit = $("#searchit").val();
	
	$.ajax({ 
		url: "search.php",
		type: "POST",
		data:"searchit="+ searchit,		
		success:function(data){
			$(".opto#option").html(data).show;
			console.log(data);
			},
		})
	})
//...................login.................................................

  $('#login').click(function() {
				
		var username = $("#username").val();	
		var password = $("#password").val();		
				
				if(username == ""){
					$("#username").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#usernameerror').html('').hide();
				}				
				
				if(password == ""){
					$("#password").focus();
					$('.error2').html('* Enter Password').show();
					return false;
				}else {

					$('#passworderror').html('').hide;
		
	$.ajax({
					url: "lib/login.php",
					type:"POST",
					data:'username='+ username + '&password='+ password,
					beforeSend: function(){
						$('#login').html('Please wait..<i class="fa fa-spin fa-spinner"></i>');	
					},
					success: function(data){
						if(data == 100 || data == 200){
							//window.location = "login.html";
							$('.modal').show();
							
						}else{
							if(data == 300){
								window.location.href = "lib/newbook.php";	
							    
							    }
							else if(data == 400){
								window.location.href = "lib/booklist.php";	
							    }
					    }
						 console.log(data);
					},
					
					timeout: 10000,
					complete:function(){
							$('#login').removeClass('btn-default').addClass('btn-primary').html('Log In');
						},
					})
					
	         };			
  })
  

//...................SAVE NEWBOOK.................................................

/*  $('#save').click(function() {
				
		var booktitle = $("#booktitle").val();	
		var price = $("#price").val();	
		var author = $("#author").val();	
		var language = $("#language").val();
		var publisher = $("#publisher").val();
		var date = $("#date").val();
		var filesize = $("#filesize").val();
		var isbn = $("#isbn").val();
		var category = $("#category").val();
		var details = $("#details").val();



				if(booktitle == ""){
					$("#booktitle").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#booktitleerror').html('').hide;
				}	


				if(price == ""){
					$("#price").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#usernameerror').html('').hide;
				}	
				if(author == ""){
					$("#author").focus();
					$('.error2').html('* Please fill in this field').show;
					return false;
				}else {

					$('#authorerror').html('').hide;

					if(language == ""){
					$("#language").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#languageerror').html('').hide;
				}	


				if(publisher == ""){
					$("#publisher").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#publishererror').html('').hide;
				}	
		
				if(filesize == ""){
							$("#filesize").focus();
							$('.error').html('* Please fill in this field').show;
							return false;
						}	  
						else {
							$('.error#filesizeerror').html('').hide;
						}	

				if(isbn == ""){
					$("#isbn").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#isbnerror').html('').hide;
				}	

				if(category == ""){
					$("#category").focus();
					}

				if(details == ""){
					$("#details").focus();
					$('.error').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#detailserror').html('').hide;
				}	
	$.ajax({
					url: "lib/login.php",
					type:"POST",
					data:'booktitle='+ booktitle + '&price='+ price + '&author='+ author + '&language='+ language + '&publisher='+ publisher + '&date='+ date,+ '&filesize='+ filesize + '&isbn='+ isbn+ '&category='+ category+ '&details='+ details,
					beforeSend: function(){
						$('#save').html('Please wait..<i class="fa fa-spin fa-spinner"></i>');	
					},
					success: function(data){
						if(data == 100 || data == 200){
							window.location = "login.html";
							
						}else{
							if(data == 300){
								window.location.href = "lib/newbook.php";	
							    
							    }
							else if(data == 400){
								window.location.href = "lib/booklist.php";	
							    }
					    }
						 console.log(data);
					},
					
					timeout: 10000,
					complete:function(){
							$('#login').removeClass('btn-default').addClass('btn-primary').html('Log In');
						},
					})
					
	         };			
  })
  */

//................... sign up form Validation.........................................
    $("#signup").click(function() {
    
	

	var firstname =$("#firstname").val();
	var lastname = $("#lastname").val();
	var address =$("#address").val();
	var phoneno =$("#phoneno").val();
	var email =$("#email").val();
	var password =$("#password").val();
	var password2 =$("#password2").val();
        var page=$("#page").val();
		

	//......firstname.....

				
			 if(firstname == ""){
			     $('#firstname').focus();
				 $('.error#firstname_err').html('* Field cannot be empty').show();
				 return false;
			}else{
				 if(!validate_string(firstname)){
					$("#firstname").focus();
					$('.error#firstname_err').html('* Not less than two Alphabets are allowed!').show();
					 return false;
			     }else {
				      $('.error#firstname_err').html('').hide();
				 }
				 }
		    
//.............lastname ..........


			
		
             if(lastname == ""){
				 $('#lastname').focus();
				 $('.error#lastname_err').html('* Field cannot be empty').show();
				 return false;
			}else{
				 if(!validate_string(lastname)){
					$("#lastname").focus();
					$('.error#lastname_err').html('* Not less than two Alphabets are allowed!').show();
					 return false;
			     }else {
				      $('.error#lastname_err').html('').hide();
					 } 
					
			}
					 
			
									
			
//.......Address.......				
	   
				if(address == ""){
					$("#address").focus();
					$('.error#address-err').html('* Please enter your address').show();
					return false;
				    }else {
				      $('.error#address-err').html('').hide();
					 } 
					
												
//......Phone_No......				
				
				if(phoneno == ""){					
					$("#phoneno").focus();
					$('.error#phoneno_err').html('* Please enter your Phone Number').show();
					return false;
				}else{
					if(!$.isNumeric(phoneno)){
						$("#phoneno").focus();
						$('.error#phoneno_err').html('* Invalid Phone number').show();
						return false; //why are we returning false???
					} else{
						$('.error#phoneno_err').html('').hide();
					}
				
				}

					
				
//......Validate Email.....	
		
				
				if(email != ""){
					if(!validateEmail(email)){
						$("#email").focus();
						$('.error#email-err').html('* Invalid email format').show();
						return false; 
					} else{
						$('.error#email-err').html('').hide();
					} 
					if(checkEmail(email) == 100){
						$("#email").focus();
						$('.error#email-err').html('* Email has been registered').show();
						return false;
					} else{
						$('.error#email-err').html('').hide();
					} 
				} else{
					$("#email").focus();
					$('.error#email-err').html('* Please enter your email').show();
					return false;
				}
				
				


//......Password.......				
			
				if(password == ""){
					$("#password").focus();
					$('.error#password_err').html('*Please enter your Password').show();
				}else{
						$('.error#password_err').html('').hide();
				}
					
//...confirm_password...				
				
				if(password2 !== password ){
				$("#password2").focus();
					return false;
				} else{
					$.ajax({
					url: "new.php",
					type:"POST",	
					data:"page=" + page +  "&lastname=" + lastname + "&firstname=" + firstname + "&sex=" + sex + "&email=" + email + "&address=" + address + "&phoneno=" + phoneno + "&username=" + username + "&password=" + password ,
					beforeSend: function(){
						$('#signup').removeClass('btn-primary').addClass('btn-default').html('<i class="fa fa-spin fa-spinner"  style="font-size:30px" ></i>');	
					},
					success:function(response){
						if(response == 200){
                        window.location.href = "booklist.php";
						}else if(response == 100){
                        window.location.href = "newbook.php";
						}
						 console.log(response);
					},
					
					timeout: 10000,
					error: function(){},
					complete:function(){
							$('#signup').removeClass('btn-default').addClass('btn-primary').html('Sign Up');
							 
  
						},
						
					});
				
					}		
					
					});

	});
 
	
