@extends('dashboard.layouts.app')

@section('title', __('dashboard.slug_redirects'))

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-auto ms-auto">
                <a href="{{ route('dashboard.slug-redirects.create') }}"><button class="btn btn-success"><i class="ri-add-fill me-1 align-bottom"></i> @lang('dashboard.add')</button></a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="dataTables">
            <thead>
                <tr class="table-dark">
                    <th>@lang('dashboard.id')</th>
                    <th>@lang('dashboard.redirect_from')</th>
                    <th>@lang('dashboard.redirect_to')</th>
                    <th>@lang('dashboard.redirect_type')</th>
                    <th>@lang('dashboard.action')</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('custom-js')
    <script src="{{ asset('back/js/slug-redirect-module.js') }}" type="module"></script>
    <script>
        var table
        $(document).ready( function () {
            table = $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.slug-redirects.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'from_slug', name: 'from_slug' },
                    { data: 'to_slug', name: 'to_slug' },
                    { data: 'type', name: 'type' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
@endsection
