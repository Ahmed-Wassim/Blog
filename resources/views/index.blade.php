@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <x-post :post="$post" />
    @endforeach
    {{ $posts->links('pagination::bootstrap-5') }}
@endsection
