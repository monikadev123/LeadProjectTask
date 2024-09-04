<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Project</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="script.js"></script>
  <body> -->

<!-- <;?php

echo "<pre>"; print_r($data); die;
?> -->
 

<!-- </?php

?> -->


@extends('layout/common')
@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
					
						<h2>Manage <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						
						<a href="login" class="btn btn-danger" ><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a>			
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>			
					</div>
					
                </div>
            </div>
			 <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Name</th>
                        <th>Company Name</th>
						<th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($data as $pdata)
                    <tr>
						<td>{{ $pdata['name'] }} </td>
                        <td>{{ $pdata['company_name'] }} </td>
						<td>{{ $pdata['description'] }} </td>
                        <td>{{ $pdata['price'] }} </td>
                        <td>
                            <!-- <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->

							<!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->


							<a href="#" class="edit btn-edit"
                   					data-id="{{ $pdata['id'] }}"
                  					data-name="{{ $pdata['name'] }}"
                   					data-company_name="{{ $pdata['company_name'] }}"
                   					data-description="{{ $pdata['description'] }}"
				     				data-price="{{ $pdata['price'] }}"
                   					data-toggle="modal"
                   					data-target="#editEmployeeModal">
									<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							</a>
  
							
					<a href="#" class="delete btn-delete"
								data-id="{{ $pdata['id'] }}" 
								data-toggle="modal"
								data-target="#deleteEmployeeModal">
								<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                           
						</td>
                    </tr>
                   
					@endforeach
                   				
					
                </tbody>
            </table>

			


        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="name" required>
						</div>
						<div class="form-group">
							<label>Company name</label>
							<input type="text" class="form-control" id="company_name" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" id="description" required></textarea>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" class="form-control" id="price" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add"  id="add-product">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
				@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<input type="hidden" class="form-control"  id="uid" name="id">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="uname" name="name"  required>
						</div>
						<div class="form-group">
							<label>Company name</label>
							<input type="text" class="form-control" id="ucompany_name" name="company_name" id="ucompany_name" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control"  id="udescription" name="description" required></textarea>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" class="form-control"  id="uprice" name = "price" required>
						</div>	
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save" id="edit-product">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
				<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
						<input type="hidden" id="did">

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" id= "delete-product" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- </body>
</html> -->


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>

	// ADD PRODUCT AJAX
    $(document).ready(function() {
      $("#add-product").click(function(e) {
       
        e.preventDefault();
       
        name = $('#name').val();
        company_name = $('#company_name').val();
		description = $('#description').val();
		price = $('#price').val();
	
        $.ajax({
          type: "POST",
          url: "api/product",
          dataType: 'json',
          data: { 
            name:name,
            company_name:company_name,
			description:description,
			price:price
          },
          success: function(result) {
     
            if (result.success) {
				
					Swal.fire({
   							title: 'Success!',
   							text: 'Your data has been saved successfully.',
							icon: 'success',
 							confirmButtonText: 'OK'
						}).then((result) => {
    				if (result.isConfirmed) {
       
       				//  window.location.href ='/product'; 

					   window.location.href = '/signin-product'; 
					}
				});
                     
            } else {
                       
                alert('An error occurred.');
            }
		
          },
          error: function(result) {
           
            alert('An error occurred. Please try again.');
          }
      });
  });
});


// EDIT PRODUCT AJAX
$(document).ready(function() {
	// Click on edit button

        $('.btn-edit').on('click', function() {
            // Extract data from the button
            var id = $(this).data('id');
			var name = $(this).data('name');
			var company_name = $(this).data('company_name');
			var description = $(this).data('description');
            var price = $(this).data('price');

            // Populate modal fields
            $('#uid').val(id);
            $('#uname').val(name);
            $('#ucompany_name').val(company_name);
			$('#udescription').val(description);
            $('#uprice').val(price);

        });
   

	// Click on edit modal submit button
      $("#edit-product").click(function(e) {
       
        e.preventDefault();

		var name = $('#uname').val();
		var company_name = $('#ucompany_name').val();
		var description = $('#udescription').val();
		var price = $('#uprice').val();
		var product_id = $('#uid').val();
		var api_url =  "api/product/"+product_id;


        $.ajax({
          type: "POST",
          url: api_url,
          dataType: 'json',
          data: { 
            name:name,
            company_name:company_name,
			description:description,
			price:price
          },
          success: function(result) {
			
            if (result.success) {
				
					Swal.fire({
   							title: 'Success!',
   							text: 'Your data has been updated successfully.',
							icon: 'success',
 							confirmButtonText: 'OK'
						}).then((result) => {
    				if (result.isConfirmed) {
       
       				//  window.location.href ='/product'; 
					   window.location.href = '/signin-product'; 
					}
				});
                     
            } else {
                       
                alert('An error occurred.');
            }
		
          },
          error: function(result) {
           
            alert('An error occurred. Please try again.');
          }
      });
  });
});

// DELETE PRODUCT AJAX

$(document).ready(function() {

	$('.btn-delete').on('click', function() {
            // Extract data from the button
            var id = $(this).data('id');

            // Populate modal fields
            $('#did').val(id);
          
        });


      $("#delete-product").click(function(e) {
       
        e.preventDefault();

		product_id = $('#did').val();
       
		api_url =  "api/product/"+product_id,
	
        $.ajax({
          type: "DELETE",
          url: api_url,
          dataType: 'json',
          success: function(result) {
			
            if (result.success) {
				
					Swal.fire({
   							title: 'Success!',
   							text: 'Your data has been deleted successfully.',
							icon: 'success',
 							confirmButtonText: 'OK'
						}).then((result) => {
    				if (result.isConfirmed) {
       
       				//  window.location.href ='/product'; 

					   window.location.href = '/signin-product'; 
					}
				});
                     
            } else {
                       
                alert('An error occurred.');
            }
		
          },
          error: function(result) {
           
            alert('An error occurred. Please try again.');
          }
      });
  });
});

  </script>

@endsection