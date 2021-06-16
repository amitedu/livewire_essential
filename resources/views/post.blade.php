@extends('layout.main-layout')

@section('content')
    <div class="flex justify-center mt-32">
        <div class="w-96 border-gray-400 shadow-md p-6 rounded-md"> <!-- THIS DIV WILL BE CENTERED -->
            <div class="py-2 px-4 border rounded shadow mt-4">
                <p>
                    {{ $post->content }}
                </p>
            </div>


            <livewire:comments-section :post="$post" />
        </div>

        <div class="py-2 px-4 border rounded shadow mt-4">
            <livewire:poll-example />
        </div>
    </div>
@endsection
