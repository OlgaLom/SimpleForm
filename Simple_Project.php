<!DOCTYPE html>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Project</title>



</head>
<body>
	<div class="MainDiv">
		<div class="FormDiv">	
			<form id="Myform" name="Myform" method="post" >
				<h3>Simple Form</h3><hr>
			  <div class="form-group">
			    <input type="text" class="form-control necessary" id="FirstName" name="FirstName" size="20" placeholder="First Name*">			    
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control necessary" id="LastName" name="LastName" size="20" placeholder="Last Name*">			    
			  </div>
			  <div class="form-group">
			    <input type="email" class="form-control necessary" id="Email" name="Email" size="20" placeholder="Email*">			    
			  </div>
			   <div class="form-group">
			    <input type="text" class="form-control necessary" id="Phone" name="Phone" size="20"placeholder="Phone*">			    
			  </div>

			  <div class="form-group">
				  <label for="sel">Bridge</label>
				  <select class="form-control" name="Select" id="sel">
				    <option value="None">None</option>
				    <option value="eAgent">eAgent</option>
				    <option value="iArts">iArts</option>
				    <option value="Orbit">Orbit</option>
				    <option value="G&G">G&G</option>
				    <option value="EstateWeb">EstateWeb</option>
				    <option value="Globalc">Globalc</option>
				  </select> 
				</div>  

				<div class="form-group">
				  <label for="comment">Comment:</label>
				  <textarea class="form-control" rows="5" name="Comments" id="comment"></textarea>
				</div> 

			  <button id="submit" type="button" class="btn btn-primary">Submit</button>
			</form>
		</div> <!-- FormDiv -->
		 
		<div class="DisplayDiv">
		 	 
		 		 <table class="table" id="myTable">
		 		 	 <thead>
			            <tr>
			            	<th  scope="col">No.</th>
			                <th  scope="col">Name</th>
			                <th  scope="col">Last Name</th>
			                <th  scope="col">Email</th>
			                <th  scope="col">Phone</th>
			                <th scope="col">Bridge</th>
			                <th scope="col">Comments</th>
			                <th scope="col">Edit</th>
			            </tr>
			        </thead>
			        <tbody id="insertData">
			        	
			        </tbody>
			        <tbody>
			        	
			        </tbody>

		 		 </table>
		 	 
		</div>
	</div> <!-- MainDiv END -->

<div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Row</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" id="ModalSubmit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript" src="javascript/bootbox.min.js" ></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="javascript/ProjectScript.js" ></script>
</body>
</html>