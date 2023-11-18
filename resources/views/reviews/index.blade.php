
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
            <div class="card-footer">
                                                            <a href="{{url('reviews/create')}}" class="btn btn-fill btn-success"  >Add Review</a>
                                                        </div>
             <div class="table-responsive">
                                <table class="table tablesorter " id="">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
