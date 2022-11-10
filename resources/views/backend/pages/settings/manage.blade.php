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
		        <li class="breadcrumb-item active" aria-current="page">All Settings</li>
		      </ol>
		    </nav>
		  </div>
		</div>
		<!--end breadcrumb-->

		<div class="row">
			<div class="col-lg-12 mx-auto">
				<form class="row g-3" action="{{ route('settings.logo') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Change Logo</h5>
						    </div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
                                    <img src="" class="img-thumbnail my-2" alt="">
									<div class="card shadow-none bg-light border">
							          <div class="card-body">
								            <div class="col-12">
								                <label class="form-label">Logo Image</label>
								                <input class="form-control" type="file" name="logo">
								            </div>
                                            <div class="col-3">
								                <input class="form-control btn btn-primary my-2" type="submit" value="Change">
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

            <div class="col-lg-12 mx-auto">
				<form class="row g-3" action="" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Change Favicon</h5>
						  	</div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
                                    <img src="" class="img-thumbnail my-2" alt="">
							        <div class="card shadow-none bg-light border">
							          <div class="card-body">
								            <div class="col-12">
								                <label class="form-label">Favicon Image</label>
								                <input class="form-control" type="file" name="favicon">
								            </div>
                                            <div class="col-3">
								                <input class="form-control btn btn-primary my-2" type="submit" value="Change">
								            </div>
							          </div>
							        </div>
						     	</div>
						    </div>
					   </div><!--end row-->
					 </div>
					</div>
				</form>

				<div class="col-lg-12 mx-auto">
				<form class="row g-3" action="" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Sliders</h5>
						  	</div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
                                    <img src="" class="img-thumbnail mx-4 my-3" alt="">
									<div class="card shadow-none bg-light border">
							          <div class="card-body">

											<div class="col-12">
								                <label class="form-label">Slider 1 Head</label>
								                <input class="form-control" type="text" name="slider1-head">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider 1 Sub Head</label>
								                <input class="form-control" type="text" name="slider1-s-head">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider 1 Image</label>
								                <input class="form-control" type="file" name="slider1-image">
								            </div>

											<div class="col-12">
								                <label class="form-label">Slider 2 Head</label>
								                <input class="form-control" type="text" name="slider2-head">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider 2 Sub Head</label>
								                <input class="form-control" type="text" name="slider2-s-head">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider 2 Image</label>
								                <input class="form-control" type="file" name="slider2-image">
								            </div>

											<div class="col-12">
								                <label class="form-label">Slider 3 Head</label>
								                <input class="form-control" type="text" name="slider3-head">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider 3 Sub Head</label>
								                <input class="form-control" type="text" name="slider3-s-head">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider 3 Image</label>
								                <input class="form-control" type="file" name="slider3-image">
								            </div>
                                            <div class="col-3">
								                <input class="form-control btn btn-primary my-2" type="submit" value="Change">
								            </div>
							          
										</div>
							        </div>
						     	</div>
						    </div>
					   </div><!--end row-->
					 </div>
					</div>
				</form>

				<div class="row">
					<div class="col-lg-12 mx-auto">
						<form class="row g-3" action="" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="card">
								<div class="card-header py-3 bg-transparent"> 
								<div class="d-sm-flex align-items-center">
									<h5 class="mb-2 mb-sm-0">Address And Contacts</h5>
									</div>
								</div>
								<div class="card-body">
									<div class="row g-3">
										<div class="col-12 col-lg-12">
											<div class="card shadow-none bg-light border">
											<div class="card-body">
													<div class="col-12">
														<label class="form-label">Email</label>
														<input class="form-control" type="email" name="email">
													</div>
													<div class="col-12">
														<label class="form-label">Address</label>
														<input class="form-control" type="text" name="address">
													</div>
													<div class="col-12">
														<label class="form-label">Fax</label>
														<input class="form-control" type="text" name="fax">
													</div>
													<div class="col-12">
														<label class="form-label">Business Hours</label>
														<input class="form-control" type="text" name="b-hours">
													</div>
													<div class="col-3">
														<input class="form-control btn btn-primary my-2" type="submit" value="Change">
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

					<div class="row">
					<div class="col-lg-12 mx-auto">
						<form class="row g-3" action="" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="card">
								<div class="card-header py-3 bg-transparent"> 
								<div class="d-sm-flex align-items-center">
									<h5 class="mb-2 mb-sm-0">Notice Board</h5>
									</div>
								</div>
								<div class="card-body">
									<div class="row g-3">
										<div class="col-12 col-lg-12">
											<div class="card shadow-none bg-light border">
											<div class="card-body">
													<div class="col-12">
														<label class="form-label">Published Notice</label>
														<textarea name="" id="" cols="30" rows="5" class="form-control" disabled></textarea>
													</div>
													<div class="col-12">
														<label class="form-label">Edit Notice <span class="badge bg-danger text-black">Separate each line with | this sign</span></label>
														<input class="form-control" type="text" name="notice" placeholder="Notice 1 | Notice 2 | Notice 3.....">
													</div>
													<div class="col-3">
														<input class="form-control btn btn-primary my-2" type="submit" value="Change">
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

			</div>  
			
			

		</div><!--end row-->    
	</main>
	<!--end page main-->
@endsection