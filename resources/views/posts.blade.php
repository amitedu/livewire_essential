@extends('layout.main-layout')

@section('content')
    <div class="flex justify-center mt-32">
        <div class="w-96 border-gray-400 shadow-md p-6 rounded-md"> <!-- THIS DIV WILL BE CENTERED -->
            @foreach ($posts as $post)
                <div class="py-2 px-4 border rounded shadow mt-4"><a href="/post/{{ $post->id }}">{{ $post->content }}</a></div>
            @endforeach
        </div>
    </div>
@endsection
