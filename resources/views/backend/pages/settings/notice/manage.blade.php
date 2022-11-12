@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
		<div class="row">
			<div class="col-lg-12">
				<!--Start content -->
				<div class="card radius-10 w-100">
				    <div class="card-body" style="position: relative;">
				        <div class="d-flex align-items-center">
			                <h6 class="mb-0">Manage All Notices</h6>
			            </div>
                        <a href="{{ route('settings.notice.create') }}" class="btn btn-primary my-3">Add A New</a>
			            <table class="table table-responsive my-4 text-center">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Notice</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1; @endphp
                                @foreach($notices as $notice)
                                <tr>
                                    <td>{{ $sl }}</td>
                                    <td>{{ $notice->notice }}</td>
                                    <td>
                                        @if($notice->status == 1)
                                        <span class="badge bg-light-success text-warning w-100">Active</span>
                                        @else 
                                        <span class="badge bg-light-danger text-danger w-100">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $notice->created_at }}</td>
                                    <td>
                                        <a href="{{ route('settings.notice.edit',$notice->id) }}" class="text-warning me-2"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="{{ route('settings.notice.delete',$notice->id) }}" class="text-danger me-2" onclick="return confirm('Are you sure you want to delete this?')"><i class="bi bi-trash-fill" ></i>
                                        </a>
                                    </td>
                                </tr>
                                @php $sl++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                            @if($notices->count() == 0)
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