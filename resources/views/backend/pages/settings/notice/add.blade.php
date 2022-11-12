@extends('backend.layout.template')

@section('body-content')
	<main class="page-content">
		<div class="row">
			<div class="col-lg-12">
				<!--Start content -->
				<div class="card radius-10 w-100">
				    <div class="card-body" style="position: relative;">
				        <div class="d-flex align-items-center">
			                <h6 class="mb-0">Add a new notice</h6>
			            </div>
                        <form action="{{ route('settings.notice.store') }}" method="post" class="form-control">
                            @csrf
                            <div class="row">
                                <div class="form-group my-2">
                                    <label for="notice">Add a new notice</label>
                                    <input type="text" name="notice" id="" class="form-control">
                                </div>
                                <div class="form-group my-2">
                                    <label for="status">Notice Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group my-2">
                                    <input type="submit" name="" id="" class="form-control btn btn-primary" value="Save">
                                </div>
                            </div>
                        </form>
			        </div>
			    </div>
				<!--End content -->
			</div>			
		</div>
		
	</main>
@endsection