@extends('backend.layouts.master')

@section('title')
    @include('service::backend.services.partials.title')
@endsection

@section('admin-content')
    @include('service::backend.services.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Service Title <span class="text-warning">(En)</span></label>
                                    <br>
                                    {{ $service->service_title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Service Title <span class="text-warning">(Fi)</span></label>
                                    <br>
                                    {{ $service->service_title_fi }}
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="service_type">Service Type</label>
                                    <br>
                                    {{ $service->service_type === 'primary' ? 'Primary' : 'Secondary' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Service Price</label>
                                    <br>
                                    {{ $service->service_price }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $service->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Short URL</label>
                                    <br>
                                    {{ $service->slug }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Service Description <span class="text-warning">(En)</span></label>
                                    <br>
                                    {!! $service->service_description !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Service Description <span class="text-warning">(Fi)</span></label>
                                    <br>
                                    {!! $service->service_description_fi !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Service Meta Description <span class="text-warning">(En)</span></label>
                                    <br>
                                    {!! $service->meta_description !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Service Meta Description <span class="text-warning">(Fi)</span></label>
                                    <br>
                                    {!! $service->meta_description_fi !!}
                                </div>
                            </div>
                        </div>

                        
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.services.edit', $service->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.services.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection