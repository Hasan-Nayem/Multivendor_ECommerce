@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
		<div class="row">
			<div class="col-lg-12">
				<!--Start content -->
				<div class="card radius-10 w-100">
				    <div class="card-body" style="position: relative;">
				        <div class="d-flex align-items-center">
			                <h6 class="mb-0">Manage All Brand</h6><br>
			            </div>
                        <a href="{{ route('settings.logo.create') }}" class="btn btn-primary my-3">Add New</a>
			            <div class="table-responsive mt-3">
		                    <table class="table align-middle text-center">
		                       <thead class="table-secondary">
		                         	<tr>
			                          	<th>#Sl.</th>
			                          	<th>Image</th>
			                          	<th>Type</th>
			                          	<th>Status</th>
			                          	<th>Created at</th>
			                          	<th>Action</th>
		                         	</tr>
		                       	</thead>

		                       <tbody>
		                       	@php $s = 1; @endphp
								@foreach($images as $image)
		                       		<tr>
		                         		<td>{{ $s }}</td>
		                         		<td>
											@if($image->type == 1)
												<img src="{{ asset('frontend/assets/settings/favicon/'.$image->image) }}" class="br-img">
											@elseif($image->type == 2)
												<img src="{{ asset('frontend/assets/settings/logo/'.$image->image) }}" class="br-img">
											@elseif($image->type == 3)
												<img src="{{ asset('frontend/assets/settings/footer/'.$image->image) }}" class="br-img">
											@endif
										</td>
										<td>
											@if($image->type == 1)
												<span class="badge bg-primary">Favicon</span>
											@elseif($image->type == 2)
												<span class="badge bg-info">Logo</span>
											@elseif($image->type == 3)
												<span class="badge bg-warning">Footer Logo</span>
											@endif
										</td>
		                         		<td>
											@if($image->status == 0)
											<span class="badge bg-light-warning text-warning w-100">Inactive</span>
											@else
											<span class="badge bg-light-success text-success w-100">Active</span>  
											@endif                                      
										</td>
                                        <td>{{ $image->created_at }}</td>
		                          		<td>
				                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
				                              <a href="{{ route('settings.logo.edit',$image->id) }}" class="text-warning">
				                              	<i class="bi bi-pencil-fill"></i>
				                              </a>
				                              <a href="{{ route('settings.logo.delete',$image->id) }}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?')">
				                              	<i class="bi bi-trash-fill" ></i>
				                              </a>
				                            </div>
				                        </td>
									</tr>
                                    @php $s++; @endphp
									@endforeach
		                       </tbody>
		                    </table>
                   		</div>
							@if($images->count() == 0)
                   			<div class="alert alert-warning">
                   				Opps!!! No Data found in the Database...
                   			</div>
				        	@endif
			        </div>
			    </div>
				<!--End content -->
			</div>			
		</div>
		
	</main>
@endsection