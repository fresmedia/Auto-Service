@extends('backend.layouts.master')

@section('title')
    @include('service::backend.services.partials.title')
@endsection

@section('styles')

@endsection

@section('admin-content')
    @include('service::backend.services.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="service_title">Service Title <span class="text-warning">(En)</span><span class="required">*</span></label>
                                    <input type="text" class="form-control" id="service_title" name="service_title" value="{{ $service->service_title }}" placeholder="Enter Service Title" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="service_title_fi">Service Title <span class="text-warning">(Fi)</span><span class="required">*</span></label>
                                    <input type="text" class="form-control" id="service_title_fi" name="service_title_fi" value="{{ $service->service_title_fi }}" placeholder="Enter Service Title" required=""/>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="service_type">Service Type <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="service_type" name="service_type" required>
                                        <option value="primary" {{ $service->service_type == "primary" ? 'selected' : null }}>Primary</option>
                                        <option value="secondary" {{ $service->service_type == "secondary" ? 'selected' : null }}>Secondary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="service_price">Service Price <span class="required">*</span></label>
                                    <input type="number" class="form-control" id="service_price" name="service_price" min="0" step=".01"
                                        value="{{ $service->service_price }}"
                                        placeholder="Service Price" required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $service->status == "1" ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ $service->status == "0" ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span
                                            class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $service->slug }}"
                                        placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="service_description">Service Description <span class="text-warning">(En)</span><span
                                            class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="service_description"
                                        name="service_description" >{!! $service->service_description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="service_description_fi">Service Description <span class="text-warning">(Fi)</span><span
                                            class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="service_description_fi"
                                        name="service_description_fi" >{!! $service->service_description_fi !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Service Meta Description <span class="text-warning">(En)</span><span
                                            class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                        placeholder="Meta description for SEO">{!! $service->meta_description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description_fi">Service Meta Description <span class="text-warning">(Fi)</span><span
                                            class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control" id="meta_description_fi" name="meta_description_fi"
                                        placeholder="Meta description for SEO">{!! $service->meta_description_fi !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-dark">Cancel</a>
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
@include('service::backend.services.partials.scripts')
@endsection
