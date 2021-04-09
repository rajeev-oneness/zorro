@extends('ui.master')

@section('title')
    Edit area
@endsection

@section('content')

        <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h5>Add Areas</h5>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="post" name="" action="{{route('admin.add_areas')}}" enctype="multipart/form-data" novalidate>
                                {{csrf_field()}}
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Area Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Latitude</label>
                                            <input type="text" class="form-control" name="lat" id="lat" value="{{old('lat')}}" required>
                                            @error('lat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Longitude</label>
                                            <input type="text" class="form-control" name="lon" id="lon" value="{{old('lon')}}" required>
                                            @error('lon')
					                            <span class="text-danger">{{ $message }}</span>
					                        @enderror
                                        </div>
                                     
                                    </div>
                                
                                    <div class="mb-3">
                                        <div class="form-check">
                                          
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </form>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        <!-- Container-fluid Ends -->

@endsection