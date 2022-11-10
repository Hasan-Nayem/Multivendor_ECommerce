@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
		<div class="row">
			<div class="col-lg-12">
				<!--Start content -->
				<div class="card radius-10 w-100">
				    <div class="card-body" style="position: relative;">
				        <div class="d-flex align-items-center">
			                <h6 class="mb-0">Manage All Vendor</h6>
			            </div>

			            <div class="table-responsive mt-3">
		                    <table class="table align-middle">
		                       <thead class="table-secondary">
		                         	<tr>
			                          	<th>#Sl.</th>
			                          	<th>Image</th>
			                          	<th>Store Name</th>
			                          	<th>Store Slug [ URL ]</th>
			                          	<th>Proprietor Full Name</th>
			                          	<th>Phone No.</th>
			                          	<th>Status</th>
			                          	<th>Action</th>
		                         	</tr>
		                       	</thead>

		                       <tbody>

		                       	@php $s = 1; @endphp

		                       	@foreach( $vendors as $vendor )
		                       		<tr>
		                         		<td>{{ $s }}</td>
		                         		<td>
		                         			@if( !is_null( $vendor->image ) )
		                         				<img src="{{ asset('backend/assets/images/vendor/' . $vendor->image ) }}" class="br-img">
		                         			@else
		                         				Not Uploaded
		                         			@endif
		                         		</td>		                         		
		                         		<td>{{ $vendor->store_name }}</td>
		                         		<td>{{ $vendor->store_slug }}</td>
		                         		<td>{{ $vendor->name }}</td>
		                         		<td>{{ $vendor->phone }}</td>
		                         		<td>
		                         			@if ( $vendor->status == 0 )
		                         				<span class="badge bg-light-warning text-warning w-100">Inactive</span>
		                         			@elseif ( $vendor->status == 1 )
		                         				<span class="badge bg-light-success text-success w-100">Active</span>
		                         			@endif
		                         		</td>
		                          		<td>
				                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
				                              <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views">
				                              	<i class="bi bi-eye-fill" data-bs-toggle="modal" data-bs-target="#readData{{ $vendor->id }}"></i>
				                              </a>

				                              <a href="{{ route('vendor.edit', $vendor->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit">
				                              	<i class="bi bi-pencil-fill"></i>
				                              </a>
				                              <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
				                              	<i class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#deleteVendor{{ $vendor->id }}"></i>
				                              </a>
				                            </div>
				                        </td>

				                        	<!-- For Read the Details Modal -->
											<div class="modal fade" id="readData{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Vendor Details</h5>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
											        
											      </div>										      
											    </div>
											  </div>
											</div>

											<div class="modal fade" id="deleteVendor{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  	<div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Vendor?</h5>
												        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												      </div>
												      <div class="modal-body">
												       	<div class="modal-action">
												       		<ul>
												       			<li>
												       				<form action="{{ route('vendor.destroy', $vendor->id ) }}" method="POST">
												       					@csrf
												       					<input type="hidden" name="status" value="0">
												       					<input type="submit" name="vendor" value="Confirm" class="btn btn-danger">
												       				</form>
												       			</li>

												       			<li>
												       				<button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
												       			</li>
												       		</ul>
												       	</div>
												      </div>
												    </div>
											  	</div>
											</div>
													                         	</tr>



		                         	@php $s++; @endphp
		                       	@endforeach
		                         	
		                       </tbody>
		                    </table>
                   		</div>

                   		@if ( $vendors->count() == 0 )
                   			<div class="alert alert-warning">
                   				Opps!!! No Data found in the Database for the Vendors...
                   			</div>
                   		@endif

				        
			        </div>
			    </div>
				<!--End content -->
			</div>			
		</div>
		
	</main>
@endsection