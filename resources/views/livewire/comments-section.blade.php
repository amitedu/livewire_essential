<div>
    <form wire:submit.prevent="storeComment" action="#" method="post">
        @csrf

        <div class="mb-6 mt-12">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="comment">
                Message:
            </label>

            <textarea
                wire:model.defer="comment"
                class="border border-gray-400 p-2 w-full rounded-md focus:outline-none @error('comment') border-red-500 @enderror"
                name="comment"
                id="comment"
                rows="3"
                cols="50"
                required
            ></textarea>

            @error('comment')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                type="submit"
        >
            Submit
        </button>
    </form>

    <!-- All the comments -->
    @foreach ($comments as $comment)
        <div class="py-2 px-4 border rounded shadow mt-4">{{ $comment->content }}</div>
    @endforeach
</div>
