@extends('backend.layouts.master')

@section('title')
    @include('service::backend.locations.partials.title')
@endsection

@section('admin-content')
    @include('service::backend.locations.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('service::backend.locations.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="locations_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Location Name</th>
                        <th>Status</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            const ajaxURL = "<?php echo Route::is('admin.locations.trashed' ? 'locations/trashed/view' : 'locations') ?>";
            $('table#locations_table').DataTable({
                dom: 'Blfrtip',
                language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
                processing: true,
                serverSide: true,
                ajax: {url: ajaxURL},
                aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
                buttons: ['excel', 'pdf', 'print'],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'location_name', name: 'location_name'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'}
                ]
            });
        });
    </script>
@endsection
