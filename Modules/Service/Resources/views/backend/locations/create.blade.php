@extends('backend.layouts.master')

@section('title')
    @include('service::backend.locations.partials.title')
@endsection

@section('styles')

@endsection

@section('admin-content')
    @include('service::backend.locations.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.locations.store') }}" method="POST" data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="location_name">Location Name <span class="text-warning">(En)</span><span class="required">*</span></label>
                                    <input type="text" class="form-control" id="location_name" name="location_name" value="{{ old('location_name') }}" placeholder="Enter Location Name" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="location_name_fi">Location Name <span class="text-warning">(Fi)</span><span class="required">*</span></label>
                                    <input type="text" class="form-control" id="location_name_fi" name="location_name_fi" value="{{ old('location_name_fi') }}" placeholder="Enter Location Name" required=""/>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ old('status') == "1" ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ old('status') == "0" ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ route('admin.locations.index') }}" class="btn btn-dark">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@include('service::backend.locations.partials.scripts')
@endsection
