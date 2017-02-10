@extends('layouts_frontend.master_frontend')
@section('title','Register')
@section('content')
        <!-- Right section -->
    <div class="col-md-9 right">
        {!! $page->content !!}
        <br>
        @foreach($posts as $post)
            {!! $post->content !!}<br>
        @endforeach
    </div>
@stop

@section('page_script')
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
        });
    </script>
@stop