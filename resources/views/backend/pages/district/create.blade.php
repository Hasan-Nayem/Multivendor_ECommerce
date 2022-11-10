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
		        <li class="breadcrumb-item active" aria-current="page">Add New District</li>
		      </ol>
		    </nav>
		  </div>
		</div>
		<!--end breadcrumb-->

		<div class="row">
			<div class="col-lg-12 mx-auto">
				<form class="row g-3" action="{{ route('district.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Add New District</h5>
							    <div class="ms-auto">
							      <button type="button" class="btn btn-secondary">Save to Draft</button>
							      <button type="submit" class="btn btn-primary">Publish Now</button>
							    </div>
						  	</div>
						</div>

						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
							        <div class="card shadow-none bg-light border">
							          <div class="card-body">
							            
								            <div class="col-12">
								                <label class="form-label">District Name</label>
								                <input type="text" class="form-control" placeholder="District Name" name="name" value="{{ old('name') }}">
								            </div>	

								            <div class="col-12">
								                <label class="form-label">Division Name</label>
								                <select class="form-control" name="division_id">
								                	<option>Please Select the Division Name</option>
								                	@foreach ( $divisions as $div )
								                		<option value="{{ $div->id }}">{{ $div->name }}</option>
								                	@endforeach
								                </select>
								            </div>							              	

								            <div class="col-12 col-lg-4">
								                <label class="form-label">Status</label>
								                <select class="form-control" name="status">
								                	<option>Please Select the Status</option>
								                	<option value="1" selected>Active</option>
								                	<option value="0">Inactive</option>
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