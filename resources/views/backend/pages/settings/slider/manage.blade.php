@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
		<div class="row">
			<div class="col-lg-12">
				<!--Start content -->
				<div class="card radius-10 w-100">
				    <div class="card-body" style="position: relative;">
				        <div class="d-flex align-items-center">
			                <h6 class="mb-0">Manage All Sliders</h6>
			            </div>
                        <a href="{{ route('settings.slider.create') }}" class="btn btn-primary my-3">Add A New</a>
			            <table class="table table-responsive my-4 text-center">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Slider Head</th>
                                    <th>Slider Sub Head</th>
                                    <th>Slider Banner</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $sl }}</td>
                                    <td>{{ $slider->head }}</td>
                                    <td>{{ $slider->subHead }}</td>
                                    <td>
                                        <img src="{{ asset('frontend/assets/settings/slider/'.$slider->image) }}" class="img-thumbnail" style="max-width: 100px;" alt="slider">
                                    </td>
                                    <td>
                                     @if($slider->status == 1)
                                        <span class="badge bg-light-success text-warning w-100">Active</span>
                                    @else
                                        <span class="badge bg-light-danger text-danger w-100">Inactive</span>
                                    @endif
                                    </td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>
                                        <a href="{{ route('settings.slider.edit',$slider->id)}}" class="text-warning me-2"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="{{ route('settings.slider.delete',$slider->id)}}" class="text-danger me-2" onclick="return confirm('Are you sure you want to delete this?')"><i class="bi bi-trash-fill" ></i>
                                        </a>
                                    </td>
                                </tr>
                                @php $sl++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                            @if($sliders->count() == 0)
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