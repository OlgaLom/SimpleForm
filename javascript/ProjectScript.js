$(document).ready(function()
{	 
	init();	

	$("#submit").on("click",function()
	{
		var FirstName = document.getElementById("FirstName").value;
		var LastName = document.getElementById("LastName").value;
		var Email = document.getElementById("Email").value;
		var Phone = document.getElementById("Phone").value;
		var sel = document.getElementById("sel").value;
		var comment = document.getElementById("comment").value;

			if(document.Myform.FirstName.value == "" || document.Myform.LastName.value == "" || document.Myform.Email.value == "" || document.Myform.Phone.value == "" )
			{
				//check if the form fields are empty and inform the user that are necessary
				bootbox.alert( {message: "Please fill the necessary fields"});
				$('.necessary').each(function()
				{
					if($(this).val()== "" )
					{
						$(this).closest(".form-control").addClass("error");
					}
					else
					{
						$(this).closest(".form-control").removeClass("error");
					}
   				  
   				});
			}
			else if( !validateEmail(document.Myform.Email.value )  )//Call the validateEmail function.
			{
				//Remove the error class from the other fields 
   				$('.necessary').each(function()
				{
					$(this).closest(".form-control").removeClass("error");
   				});
   				//if the email is not validate then inform the user 
   				bootbox.alert( {message: "Please check again the email"} );
   				$('#Email').closest(".form-control").addClass("error");	
			}
			else if( !validatePhone(document.Myform.Phone.value )  )//Call the validatePhone function.
			{
				//Remove the error class from the other fields
   				$('.necessary').each(function()
				{
					$(this).closest(".form-control").removeClass("error");
   				});
				//if the email is not validate then inform the user 
   				bootbox.alert( {message: "Please check again the phone"});
   				$('#Phone').closest(".form-control").addClass("error");	
			}
			else
			{
				//remove the error class from the fields
				$('.necessary').each(function()
				{					 
   				  $(this).closest(".form-control").removeClass("error");
   				});
   				//make the string with the values for the ajax request
				var dataString = 'FirstName=' + FirstName + '&LastName=' + LastName + '&Email=' + Email + '&Phone=' + Phone+ '&sel=' + sel+ '&comment=' + comment;	
				$.ajax({
				  type: 'POST',
				  url: "ProjectConn.php",
				  data: dataString, 
				  success: function(data) {
				  	$("#insertData").html(data);
				  	$('#Myform')[0].reset();
				  	$("#submit").blur();
		          },
		        error: function( ) {
		             
		            alert("Submit Error");
		        }
				   
				});

			}
		
 	});
  	
	$(document).on('click', '.edit', function()
	{
		//get the data of the selected row 
		var $row = $(this).closest("tr");     
		var $text = $row.find(".Num").text(); 
    	var ID = $text;

   		var $text = $row.find(".FirstName").text(); 
    	var FirstName = $text;

    	$text = $row.find(".LastName").text(); 
    	var LastName = $text;

    	$text = $row.find(".Email").text(); 
    	var Email = $text;

    	$text = $row.find(".Phone").text(); 
    	var Phone = $text;

    	$text = $row.find(".Bridge").text(); 
    	var Bridge = $text;

    	$text = $row.find(".Comments").text(); 
    	var Comments = $text;
	     
	   
	   //create a modal with the row's data 
		$('.modal').modal('show');
		var Data="<form class='Modalform' method='post'> <p id='ModalRowID' class='hidden' >"+ID+"</p><p id='message'></p>"+
					"FirsName <input class='form-control Modalnecessary' id='ModalFirstName' value="+ FirstName+"></input>"+
					"LastName <input class='form-control Modalnecessary' id='ModalLastName' value="+ LastName+"></input>"+
					"Email <input class='form-control Modalnecessary' id='ModalEmail' value="+ Email+"></input>"+
					"Phone <input class='form-control Modalnecessary' id='ModalPhone' value="+ Phone+"></input>"+
					"Bridge <select class='form-control'id='ModalBridge'>"+
						"<option value='None'>None</option>"+
					    "<option value='eAgent'>eAgent</option>"+
					    "<option value='iArts'>iArts</option>"+
					    "<option value='Orbit'>Orbit</option>"+
					    "<option value='GG'>G&G</option>"+
					    "<option value='EstateWeb'>EstateWeb</option>"+
					    "<option value='Globalc'>Globalc</option>"+
					"</select>"+
					"Comments <textarea class='form-control'id='ModalComments'>"+ Comments+"</textarea> </form>";
		$('.modal-body').html(Data);
		$("#ModalBridge").val(Bridge);
	});

	$("#ModalSubmit").on("click",function()
	{		 
		//get the data from the modal 
		var ID = document.getElementById("ModalRowID").innerHTML;
		var ModalFirstName = document.getElementById("ModalFirstName").value;
		var ModalLastName = document.getElementById("ModalLastName").value;
		var ModalEmail = document.getElementById("ModalEmail").value;
		var ModalPhone = document.getElementById("ModalPhone").value;
		var ModalBridge = document.getElementById("ModalBridge").value;
		var ModalComments = document.getElementById("ModalComments").value;

		//check the validation and if everthing is fine do the ajax request 
			if( ModalFirstName == "" || ModalLastName == "" || ModalEmail == "" || ModalPhone == "" )
			{
				document.getElementById("message").innerHTML="Please fill the necessary fields";
				$('.Modalnecessary').each(function()
				{
					if($(this).val()== "" )
					{
						$(this).closest(".form-control").addClass("error");
					}
					else
					{
						$(this).closest(".form-control").removeClass("error");
					}
   				});
			}
			else if( !validateEmail(document.getElementById("ModalEmail").value) )
			{
				
				$('.Modalnecessary').each(function()
				{
					$(this).closest(".form-control").removeClass("error");		 
   				});
   				 $("#ModalEmail").addClass("error");
				document.getElementById("message").innerHTML="Please check the email";

			}
			else if( !validatePhone(document.getElementById("ModalPhone").value ) )
			{
				$('.Modalnecessary').each(function()
				{
					$(this).closest(".form-control").removeClass("error");		 
   				});
				$("#ModalPhone").addClass("error");
				document.getElementById("message").innerHTML="Please check the phone";
			}
			else
			{
				document.getElementById("message").innerHTML="";
				var dataString = 'ID='+ID+'&FirstName=' + ModalFirstName + '&LastName=' + ModalLastName + '&Email=' + ModalEmail + '&Phone=' + ModalPhone+ '&sel=' + ModalBridge+ '&comment=' + ModalComments;
		
				$.ajax({
				  type: 'POST',
				  url: "UpdateData.php",
				  data: dataString, 
				  success: function(data) {
				  	$("#insertData").html(data);
				  	$('#Myform')[0].reset();
				  	$('.modal').modal('hide');
					},
		        	error: function( ) {
		                alert("Submit Error");
		        	}
				});
			} 	
	});
  	 
   
}); //document Ready END

 
//the init function is for the initialize the table below the form.
function  init()
{
	var dataString = 'FirstName=&LastName=&Email=&Phone=&sel=&comment=';
	$.ajax({
			  type: 'POST',
			  url: "ProjectConn.php",
			  data: dataString, 
			  success: function(data) 
			  {
			  	$("#insertData").html(data);

	          },
	        error: function() {
	             
	            alert("Submit Error");
	        }
	    });
}

function validateEmail(email) 
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePhone(phone) 
{
    var re =/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return re.test(String(phone).toLowerCase());
}