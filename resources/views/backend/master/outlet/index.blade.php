@extends('layouts.backend.app')
@section('content')
    @component('components.card.card-primary')
        @slot('title', __('text.data_category'))
        @slot('action')
            <a href="{{ route('master.category.create') }}" class="btn btn-primary">{{ __('button.add') }}</a>
        @endslot
        @slot('body')
            {!! $dataTable->table(['class' => 'table table-striped']) !!}
        @endslot
    @endcomponent
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
