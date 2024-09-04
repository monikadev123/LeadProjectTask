@extends('layout/common')
@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
					
						<h2>Manage <b>Leads</b></h2>
					</div>
					
                </div>
            </div>
			 <table class="table table-striped table-hover" id="example">
                <thead>
                    <tr>
						<th>Name</th>
                        <th>Email</th>
						<th>Phone Number</th>
                        <th>Description</th>
						<th>Source</th>
						<th>Status</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($data as $pdata)
                    <tr>
						<td>{{ $pdata['name'] }} </td>
                        <td>{{ $pdata['email'] }} </td>
						<td>{{ $pdata['mobile'] }} </td>
                        <td>{{ $pdata['description'] }} </td>
						<td>{{ $pdata['source'] }} </td>
						<td>{{ $pdata['status'] }} </td>

						
                        <td>
                        
							<a href="#" class="edit btn-edit"
                   					data-id="{{ $pdata['id'] }}"
                  					data-name="{{ $pdata['name'] }}"
									data-email="{{ $pdata['email'] }}"
                   					data-mobile="{{ $pdata['mobile'] }}"
                   					data-description="{{ $pdata['description'] }}"
									data-source="{{ $pdata['source'] }}"
				     				data-status="{{ $pdata['status'] }}"
                   					data-toggle="modal"
                   					data-target="#editLeadModal">
									<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
							</a>

							<a href="#addPostModal" class="update btn-update"data-toggle="modal">
									<i class="material-icons" data-toggle="tooltip" title="Update Post">&#xE147;</i>
							</a>
  
							
					<!-- <a href="#" class="delete btn-delete"
								data-id="{{ $pdata['id'] }}" 
								data-toggle="modal"
								data-target="#deleteEmployeeModal">
								<i class="material-icons" data-toggle="tooltip" title="View Post">&#xe8f4;</i></a> -->

					<!-- <a href="#viewPostModal" class="delete " data-toggle="modal">
								<i class="material-icons" data-toggle="tooltip" title="View Post">&#xe8f4;</i></a> -->

					<a href="" class="delete btn-view">
								<i class="material-icons" data-toggle="tooltip" title="View Post">&#xe8f4;</i></a>

                           
						</td>
                    </tr>
                   
					@endforeach
                   				
					
                </tbody>
            </table>

			<!-- paginate -->

			<div class="form-group">
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="5000">Show ALL Rows</option>
						 <option value="5">5</option>
						 <option value="10">10</option>
						 <option value="15">15</option>
						 <option value="20">20</option>
						 <option value="50">50</option>
						 <option value="70">70</option>
						 <option value="100">100</option>
						</select>
			 		
			  	</div>


			<!-- end paginate -->

        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addPostModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Post Update</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Message</label>
							<input type="text" class="form-control" id="message" required>
							
						</div>
						<input type="hidden" class="form-control" id="user_name" required>
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Update Post"  id="update-post">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editLeadModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
				@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Edit Lead</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<input type="hidden" class="form-control"  id="uid" name="id">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="uname" name="name"  required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" id="uemail" name="email" required>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" class="form-control" id="umobile" name="mobile" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control"  id="udescription" name="description" required></textarea>
						</div>
						<div class="form-group">
							<label>Source</label>
							<input type="text" class="form-control"  id="usource" name = "source" required>
						</div>
						<div class="form-group">
							<label>Status</label>
							<input type="text" class="form-control"  id="ustatus" name = "status" required>
						</div>
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save" id="edit-lead">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="viewPostModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
				<div class="modal-header">						
						<h4 class="modal-title">View Post</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
				<div class="modal-body">					
					<table class="table table-striped table-hover">
						<thead>
                    		<tr>
								<th>Message</th>
                        		<th>User Name</th>
								<th>Created Timestamp</th>
                      
                    		</tr>
                		</thead>
                		<tbody id="modalTableBody">
					
                    	
						</tbody>
            		</table>

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- </body>
</html> -->


<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





<script>

		// paginate
	getPagination('#example');

	function getPagination(table) {
  		var lastPage = 1;

  		$('#maxRows')
    	.on('change', function(evt) {
      		//$('.paginationprev').html('');						// reset pagination

     	lastPage = 1;
      	$('.pagination')
			.find('li')
       		.slice(1, -1)
       	 .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //	numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
								  <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
								</li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');					// add active class to the clicked
	  	limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
	  limitPagging();
    })
    .val(20)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging(){
	// alert($('.pagination li').length)

	if($('.pagination li').length > 7 ){
			if( $('.pagination li.active').attr('data-page') <= 3 ){
			$('.pagination li:gt(5)').hide();
			$('.pagination li:lt(5)').show();
			$('.pagination [data-page="next"]').show();
		}if ($('.pagination li.active').attr('data-page') > 3){
			$('.pagination li:gt(0)').hide();
			$('.pagination [data-page="next"]').show();
			for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
				$('.pagination [data-page="'+i+'"]').show();

			}

		}
	}
}

$(function() {
  // Just to append id number for each row
  $('table tr:eq(0)').prepend('<th> ID </th>');

  var id = 0;

  $('table tr:gt(0)').each(function() {
    id++;
    $(this).prepend('<td>' + id + '</td>');
  });
});


// end paginate








// Update Post AJAX
    $(document).ready(function() {
      $("#update-post").click(function(e) {
       
        e.preventDefault();
       
        var message = $('#message').val();
		var user_name = "Alvin";

        $.ajax({
          type: "POST",
          url: "api/post",
          dataType: 'json',
          data: { 
            lead_message:message,
            user:user_name
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
       
					   window.location.href = '/signin-lead'; 
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


// EDIT Lead AJAX
$(document).ready(function() {
	// Click on edit button

        $('.btn-edit').on('click', function() {
            // Extract data from the button
            var id = $(this).data('id');
			var name = $(this).data('name');
			var email = $(this).data('email');
			var mobile = $(this).data('mobile');
			var description = $(this).data('description');
            var source = $(this).data('source');
			var status = $(this).data('status');
			            

            // Populate modal fields
            $('#uid').val(id);
            $('#uname').val(name);
			$('#uemail').val(email);
            $('#umobile').val(mobile);
			$('#udescription').val(description);
            $('#usource').val(source);
			$('#ustatus').val(status);

        });
   

	// Click on edit modal submit button
      $("#edit-lead").click(function(e) {
       
        e.preventDefault();

		var name = $('#uname').val();
		var email = $('#uemail').val();
		var mobile = $('#umobile').val();
		var description = $('#udescription').val();
		var source = $('#usource').val();
		var status = $('#ustatus').val();
		var lead_id = $('#uid').val();
		var api_url =  "api/lead/"+lead_id;

        $.ajax({
          type: "POST",
          url: api_url,
          dataType: 'json',
          data: { 
            name:name,
			email:email,
			mobile:mobile,
            description:description,
			source:source,
			status:status
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
       
					   window.location.href = '/signin-lead'; 
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


// View Post Modal


$(document).ready(function() {


  $(".btn-view").click(function(e) {

	e.preventDefault();

	api_url =  "api/post",


	$.ajax({
	  type: "GET",
	  url: api_url,
	  dataType: 'json',
	  success: function(result) {

		if (result.success) {
			
			// Clear existing data
			$('#modalTableBody').empty();

			$.each(result.data, function(index, item) {
                    $('#modalTableBody').append('<tr><td>' +item.id + '</td><td>' + item.lead_message + '</td><td>' + item.user + '</td><td>' + item.created_at + '</td></tr>');
                });

            // Show the modal
			$('#viewPostModal').modal('show');
				 
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