<div>
    <div class="flex justify-center mt-32">
        <div class="md:w-1/2 lg:w-1/3 p-2 rounded flex justify-between items-center">
            <span class="">{{ $counter }}</span>
            <button wire:click="decrement"
                    class="bg-green-500 text-white border border-white py-1 px-5 rounded"
            >-</button>
            <button wire:click="increment"
                    class="bg-green-500 text-white border border-white py-1 px-5 rounded"
            >+</button>
        </div>
    </div>
</div>
