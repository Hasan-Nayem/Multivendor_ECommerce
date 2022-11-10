@extends('backend.layout.template')

@section('body-content')
	<!--start content-->
	<main class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		  <div class="breadcrumb-title pe-3">eCommerce</div>
		  	<div class="ps-3">
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Update Brand Information</li>
				</ol>
				</nav>
		  	</div>
		</div>
		<!--end breadcrumb-->

		<div class="row">
			<div class="col-lg-12 mx-auto">
				<form class="row g-3" action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">AUpdate Brand</h5>
							    <div class="ms-auto">
							      <button type="button" class="btn btn-secondary">Save to Draft</button>
							      <button type="submit" class="btn btn-primary">Save Changes</button>
							    </div>
						  	</div>
						</div>

						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
							        <div class="card shadow-none bg-light border">
							          <div class="card-body">
							            
								            <div class="col-12">
								                <label class="form-label">Brand Name</label>
								                <input type="text" class="form-control" placeholder="Brand Name" name="name" value="{{ $brand->name }}">
								            </div>

								            <div class="col-12">
								                <label class="form-label">Description</label>
								                <textarea class="form-control" placeholder="Full description" rows="4" cols="4" name="description">{{ $brand->description }}</textarea>
							              	</div>

							              	<div class="col-12">
								                <label class="form-label">Images</label>
								                <input class="form-control" type="file" name="image">
								            </div>

								            <div class="col-12 col-lg-4">
								                <label class="form-label">Status</label>
								                <select class="form-control" name="status">
								                	<option>Please Select the Status</option>
													<option value="1" @if ( $brand->status == 1 ) selected @endif >Active</option>
													<option value="0" @if ( $brand->status == 0 ) selected @endif >Inactive</option>
								                </select>
								            </div>						              
							              
							            
							          </div>
							        </div>
						     	</div>
						    </div>
					   </div><!--end row-->
					 </div>
					</div>
				</form>
			</div>
		</div><!--end row-->

	</main>
	<!--end page main-->
@endsection