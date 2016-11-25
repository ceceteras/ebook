// JavaScript Document
$(document).ready(function(){
	
	$("body").on("click", "#submit", function(){
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var gender = $('#sex').val();
		var email = $('#email').val();
		var address = $('#address').val();
		var username = $('#username').val();
		var password = $('#inputPassword3').val();
		var dataString = 'firstname=' + firstname + '&lastname=' + lastname + '&username=' + username + '&password=' + password;
		
		
 var frmvalidator = new Validator("myform");
 frmvalidator.addValidation("firstname","req","Please enter your First Name");
 frmvalidator.addValidation("firstname","maxlen=20",
		"Max length for FirstName is 20");

 frmvalidator.addValidation("lastname","req");
 frmvalidator.addValidation("lastname","maxlen=20");

 frmvalidator.addValidation("email","maxlen=50");
 frmvalidator.addValidation("email","req");
 frmvalidator.addValidation("email","email");

 frmvalidator.addValidation("phone","maxlen=50");
 frmvalidator.addValidation("phone","numeric");

 frmvalidator.addValidation("address","maxlen=50");
 frmvalidator.addValidation("country","dontselect=000");


		
		
		
		
		if(lastname == ''){
			$('#lastname').focus();
				return false;
		}
		if(firstname == ''){
			$('#firstname').focus();
			return false;	
		}
		
		if(username == ''){
			$('#username').focus();
					return false;
		}
		if(password == ''){
			$('#inputPassword3').focus();
			return false;	
		} else{
			$.ajax({
				url: 'index.php',
				type: 'POST',
				data: dataString,
				beforeSend: function(){
					
				},
				success:function(){
					window.location = "booklist.php";	
				},	
				complete:function(){},
				timeout: 30000,	
				error:function(){},	
			});	
		}
		
	});
});


/*//................... sign up form Validation.........................................

   $("#signup").click(function() {
	
	var lastname = $("#lastname").val();
	var firstname =$("#firstname").val();
	var email =$("#email").val();
	var address =$("#staffid").val();
	var password =$("#password").val();
	var password2 =$("#password2").val();
        

//.....STRING VALIDATION......			
		
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
		    
	
				
//......Validate Email.....	
		
				if(email !== ""){
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
				
			
//.......staff id.......				
	   
				if(staffid == ""){
					$("#staffid").focus();
					$('.error#staffid_err').html('* Please enter your staff ID').show();
					return false;
				    }else {
				      $('.error#staff_err').html('').hide();
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
					return false;}
				
    $.ajax({
					url: "new.php",
					type:"POST",	
					data: "lastname=" + lastname + "&firstname=" + firstname + "&email=" + email + "&staffid=" + staffid + "&password=" + password ,
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
						
						}
						
					})				
   })
   })
					
			*/