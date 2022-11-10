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
		        <li class="breadcrumb-item active" aria-current="page">Update Vendor Information</li>
		      </ol>
		    </nav>
		  </div>
		</div>
		<!--end breadcrumb-->

		<div class="row">
			<div class="col-lg-12 mx-auto">
				<form class="row g-3" action="{{ route('vendor.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Add New Vendor</h5>
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
							            
							          	<div class="row">
							          		<div class="col-lg-4">
							          			<div class="col-12">
									                <label class="form-label">Proprietor Name</label>
									                <input type="text" class="form-control" placeholder="Proprietor Name" name="name" value="{{ old('name') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">Email Address</label>
									                <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
								              	</div>

								              	<div class="col-12">
									                <label class="form-label">Password</label>
									                <input type="password" class="form-control" placeholder="Account Password" name="password" value="{{ old('password') }}">
								              	</div>

								              	<div class="col-12">
									                <label class="form-label">Re-Type Password</label>
									                <input type="password" class="form-control" placeholder="Re-Type Password" name="password_confirmation" value="{{ old('re_password') }}">
								              	</div>

								              	<div class="col-12">
									                <label class="form-label">Store Logo</label>
									                <input class="form-control" type="file" name="image">
									            </div>

									            <div class="col-12">
									                <label class="form-label">Status</label>
									                <select class="form-control" name="status">
									                	<option>Please Select the Status</option>
									                	<option value="1">Active</option>
									                	<option value="0">Inactive</option>
									                </select>
									            </div>
							          		</div>

							          		<div class="col-lg-4">
							          			<div class="col-12">
									                <label class="form-label">Store Phone No</label>
									                <input type="text" class="form-control" placeholder="Phone No" name="phone" value="{{ old('phone') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">Primary Contact Address</label>
									                <input type="text" class="form-control" placeholder="Primary Contact Address" name="address" value="{{ old('address') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">Division</label>
									                <select class="form-control" name="division">
									                	<option>Please Select the Division</option>
									                </select>
									            </div>

									            <div class="col-12">
									                <label class="form-label">District</label>
									                <select class="form-control" name="district">
									                	<option>Please Select the District</option>
									                </select>
									            </div>

									            <div class="col-12">
									                <label class="form-label">Zip Code</label>
									                <input type="text" class="form-control" placeholder="Area / Zip Code" name="zcode" value="{{ old('zcode') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">User Role</label>
									                <select class="form-control" name="role">
									                	<option>Please Select the User Role</option>
									                	<option value="2">Vendor</option>
									                	<option value="3">Customer</option>
									                </select>
									            </div>
							          		</div>

							          		<div class="col-lg-4">
							          			<div class="col-12">
									                <label class="form-label">Store Name</label>
									                <input type="text" class="form-control" placeholder="Store Name" name="store_name" value="{{ old('store_name') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">Store Address</label>
									                <input type="text" class="form-control" placeholder="Store Address" name="store_address" value="{{ old('store_address') }}">
									            </div>

							          			<div class="col-12">
									                <label class="form-label">NID No.</label>
									                <input type="text" class="form-control" placeholder="NID Number" name="nid" value="{{ old('nid') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">E-Tin No.</label>
									                <input type="text" class="form-control" placeholder="E-Tin No." name="etin" value="{{ old('etin') }}">
									            </div>

									            <div class="col-12">
									                <label class="form-label">Trade Licene No.</label>
									                <input type="text" class="form-control" placeholder="Trade Licene No." name="trade_licence" value="{{ old('trade_licence') }}">
									            </div>

							          		</div>
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