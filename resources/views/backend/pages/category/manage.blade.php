@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
		<div class="row">
			<div class="col-lg-12">
				<!--Start content -->
				<div class="card radius-10 w-100">
				    <div class="card-body" style="position: relative;">
				        <div class="d-flex align-items-center">
			                <h6 class="mb-0">Manage All Brand</h6>
			            </div>

			            <div class="table-responsive mt-3">
		                    <table class="table align-middle">
		                       <thead class="table-secondary">
		                         	<tr>
			                          	<th>#Sl.</th>
			                          	<th>Image</th>
			                          	<th>Category Name</th>
			                          	<th>Parent / Child</th>
			                          	<th>Slug [ URL ]</th>
			                          	<th>Status</th>
			                          	<th>Action</th>
		                         	</tr>
		                       	</thead>

		                       <tbody>

		                       	@php $s = 1; @endphp

		                       	@foreach( $categories as $category )
		                       		<tr>
		                         		<td>{{ $s }}</td>
		                         		<td>
		                         			@if( !is_null( $category->image ) )
		                         				<img src="{{ asset('backend/assets/images/categories/' . $category->image ) }}" class="br-img">
		                         			@else
		                         				Not Uploaded
		                         			@endif
		                         		</td>
		                         		<td>{{ $category->name }}</td>
		                         		<td>
		                         			@if ( $category->is_parent == 0 )
		                         				<span class="badge bg-light-primary text-success w-100">Parent Category</span>
		                         			@endif
		                         		</td>
		                         		<td>{{ $category->slug }}</td>
		                         		<td>
		                         			@if ( $category->status == 0 )
		                         				<span class="badge bg-light-warning text-warning w-100">Inactive</span>
		                         			@elseif ( $category->status == 1 )
		                         				<span class="badge bg-light-success text-success w-100">Active</span>
		                         			@endif
		                         		</td>
		                          		<td>
				                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
				                              <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views">
				                              	<i class="bi bi-eye-fill"></i>
				                              </a>
				                              <a href="{{ route('category.edit', $category->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit">
				                              	<i class="bi bi-pencil-fill"></i>
				                              </a>
				                              <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
				                              	<i class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#deleteCategory{{ $category->id }}"></i>
				                              </a>
				                            </div>
				                        </td>

										<div class="modal fade" id="deleteCategory{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Category?</h5>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
											       	<div class="modal-action">
											       		<ul>
											       			<li>
											       				<form action="{{ route('category.destroy', $category->id ) }}" method="POST">
											       					@csrf
											       					<input type="hidden" name="status" value="0">
											       					<input type="submit" name="category" value="Confirm" class="btn btn-danger">
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


		                         		@foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $category->id )->get() as $childCat )


				                         	<tr>
				                         		<td>{{ $s }}</td>
				                         		<td>
				                         			@if( !is_null( $childCat->image ) )
				                         				<img src="{{ asset('backend/assets/images/categories/' . $childCat->image ) }}" class="br-img">
				                         			@else
				                         				Not Uploaded
				                         			@endif
				                         		</td>
				                         		<td>-- {{ $childCat->name }}</td>
				                         		<td>
				                         			{{ $childCat->category->name }}
				                         		</td>
				                         		<td>{{ $childCat->slug }}</td>
				                         		<td>
				                         			@if ( $childCat->status == 0 )
				                         				<span class="badge bg-light-warning text-warning w-100">Inactive</span>
				                         			@elseif ( $childCat->status == 1 )
				                         				<span class="badge bg-light-success text-success w-100">Active</span>
				                         			@endif
				                         		</td>
				                          		<td>
						                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
						                              <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views">
						                              	<i class="bi bi-eye-fill"></i>
						                              </a>
						                              <a href="{{ route('category.edit', $childCat->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit">
						                              	<i class="bi bi-pencil-fill"></i>
						                              </a>
						                              <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
						                              	<i class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#deleteCategory{{ $childCat->id }}"></i>
						                              </a>
						                            </div>
						                        </td>
				                         	</tr>
		                         	
				                         	@php $s++; @endphp
	                         			@endforeach


		                         	
		                         	
		                       	@endforeach
		                         	
		                       </tbody>
		                    </table>
                   		</div>

                   		@if ( $categories->count() == 0 )
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