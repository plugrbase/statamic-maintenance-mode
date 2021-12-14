@extends('statamic::layout')
@section('title', 'Maintenance mode settings')

@section('content')
    <publish-form
        title="Maintenance mode settings"
        action="{{ cp_route('plugrbase.maintenance.settings.update') }}"
        method="put"
        :blueprint='@json($blueprint)'
        :meta='@json($meta)'
        :values='@json($values)'
    ></publish-form>
@endsection