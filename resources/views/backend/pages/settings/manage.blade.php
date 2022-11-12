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
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Ecommerce Logo</h5>
						    </div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
									<div class="card shadow-none bg-light border">
							          <div class="card-body">
								            <div class="col-12">
								                <label class="form-label">Current Logo</label>
												<img src="{{ asset('frontend/assets/settings/logo/') }}" class="img-thumbnail my-2" alt="ecommerce logo">
								            </div>
                                            <div class="col-3">
								                <a href="{{ route('settings.logo.manage') }}" class="btn btn-primary">Change</a>
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
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Ecommerce Favicon</h5>
						  	</div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
							        <div class="card shadow-none bg-light border">
							          <div class="card-body">
								            <div class="col-12">
								                <label class="form-label">Current Favicon Image</label>
												<img src="{{ asset('frontend/assets/settings/logo/') }}" class="img-thumbnail my-2" alt="favicon.ico">
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
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Active Sliders</h5>
						  	</div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
									@foreach($sliders as $slider)
                                    <img src="{{ asset('frontend/assets/settings/slider/'. $slider->image)}}" style="max-width: 300px;" class="img-thumbnail mx-4 my-3" alt="">
									@endforeach
									<div class="card shadow-none bg-light border">
							          <div class="card-body">
											@php $sl = 1; @endphp
									 	 	@foreach($sliders as $slider)
											<div class="col-12">
								                <label class="form-label">Slider {{ $sl }} Head</label>
								                <input class="form-control" type="text" name="" value="{{ $slider->head }}" disabled>
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider {{ $sl }} Sub Head</label>
								                <input class="form-control" type="text" name="" value="{{ $slider->subHead }}" disabled>
								            </div>
											@php $sl++; @endphp
											@endforeach
                                            <div class="col-3">
												<a href="{{ route('settings.slider.manage') }}" class="btn btn-primary my-3">View All Slider</a>
								            </div>
							          
										</div>
							        </div>
						     	</div>
						    </div>
					   </div><!--end row-->
					 </div>
					</div>

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
														<a href="{{ route('settings.slider.manage') }}" class="btn btn-primary">View All Address</a>
													</div>
											</div>
											</div>
										</div>
									</div>
							</div><!--end row-->
							</div>
							</div>
					</div>

					<div class="row">
					<div class="col-lg-12 mx-auto">
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
														<label class="form-label">Active Published Notice</label>
														@foreach($notices = \App\Models\Notice::get()->where('status',1) as $notice)
														<input type="text" value="{{ $notice->notice }}" class="form-control my-2" disabled>
														@endforeach
														
													</div>
													<div class="col-3">
														<a href="{{ route('settings.notice.manage') }}" class="btn btn-primary">View all notice</a>
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