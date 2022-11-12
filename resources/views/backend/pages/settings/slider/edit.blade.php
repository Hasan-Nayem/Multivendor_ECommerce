@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
    <div class="col-lg-12 mx-auto">
					<div class="card">
						<div class="card-header py-3 bg-transparent"> 
						  <div class="d-sm-flex align-items-center">
						    <h5 class="mb-2 mb-sm-0">Create A New Slider</h5>
						  	</div>
						</div>
						<div class="card-body">
						   	<div class="row g-3">
						     	<div class="col-12 col-lg-12">
									<div class="card shadow-none bg-light border">
							          <div class="card-body">
                                        <form action="{{ route('settings.slider.update',$slider->id) }}" method="post" enctype="multipart/form-data" class="form-control">
                                            @csrf
											<div class="col-12">
								                <label class="form-label">Slider Head</label>
								                <input class="form-control" type="text" name="head" value="{{ $slider->head }}">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider Sub Head</label>
								                <input class="form-control" type="text" name="subHead" value="{{ $slider->subHead }}">
								            </div>
											<div class="col-12">
								                <label class="form-label">Slider Image</label>
								                <input class="form-control" type="file" name="image">
								            </div>
                                            <div class="form-group my-2">
                                                <label for="status">Slider Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">select Status</option>
                                                    <option value="1"@if($slider->status == 1  ) SELECTED @endif>Active</option>
                                                    <option value="0"@if($slider->status == 0  ) SELECTED @endif>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
												<input type="submit" value="Update" class="btn btn-primary form-control">
								            </div>
                                        </form>
										</div>
							        </div>
						     	</div>
						    </div>
					   </div><!--end row-->
					 </div>
					</div>
		
	</main>
@endsection