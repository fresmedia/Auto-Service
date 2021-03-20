@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sentences.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sentences.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.sentences.update', $sentence->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="en">Sentence <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="en" name="en" value="{{ $sentence->en }}" placeholder="Enter Sentence in English" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ $sentence->status === 1 ? 'selected' : null }}>Published</option>
                                        <option value="0" {{ $sentence->status === 0 ? 'selected' : null }}>Draft</option>
                                    </select>
                                    <p class="text-warning">
                                        <i class="fa fa-info-circle"></i> Please make status Published, to add it now on live !
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="category_id">Sentence Category  <i class="fa fa-chevron-right"></i>  Chapter <span
                                        class="required">*</span></label>
                                    <br>
                                    <select class="categories_select form-control custom-select " id="categories" name="category_id" style="width: 100%;">
                                        {!! $categories !!}
                                    </select>
                                    <p class="text-warning">
                                        <i class="fa fa-info-circle"></i> Please select a chapter !
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                            Save</button>
                                        <a href="{{ route('admin.sentences.index') }}" class="btn btn-dark">Cancel</a>
                                    </div>
                                </div>
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
    <script>
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
    </script>
@endsection
