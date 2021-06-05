@extends('backend.layouts.master')

@section('title')
    @include('service::backend.locations.partials.title')
@endsection

@section('admin-content')
    @include('service::backend.locations.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Location Name <span class="text-warning">(En)</span></label>
                                    <br>
                                    {{ $location->location_name }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Location Name <span class="text-warning">(Fi)</span></label>
                                    <br>
                                    {{ $location->location_name_fi }}
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $location->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                        </div>

                        
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.locations.edit', $location->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.locations.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection