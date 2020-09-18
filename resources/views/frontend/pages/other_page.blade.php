@extends('layouts.app')

@section('title', '')

@section('content')

<h2 class="text-center">{{ $otherPageDetails->meta_title }}</h2><br><br>
<div class="container">
    <div class="row">
        {!! $otherPageDetails->page_content !!}
    </div>
</div>


@include('layouts.front-inc.footer')

@endsection

@push('scripts')

@endpush