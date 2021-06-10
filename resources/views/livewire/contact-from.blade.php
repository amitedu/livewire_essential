<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="flex h-screen justify-center items-center">
        <div class="w-96 border-gray-400 shadow-md p-6 rounded-md"> <!-- THIS DIV WILL BE CENTERED -->

            <!-- Alert -->
            @if (session('contact_success'))
                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
    {{--                <span class="text-xl inline-block mr-5 align-middle">--}}
    {{--                    <ion-icon name="checkmark-outline"></ion-icon>--}}
    {{--                </span>--}}
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Contact</b> successfully saved!
                    </span>
                    <button
                        wire:click="dismissAlert"
                        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                    >
                        <span>×</span>
                    </button>
                </div>
            @endif

            <form wire:submit.prevent="submitForm" action="/contact" method="post">
            @csrf

            <!-- Name Form Input -->
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="name"
                    >
                        Name:
                    </label>

                    <input
                        wire:model.defer="name"
                        class="border border-gray-400 p-2 w-full rounded-md @error('name') border-red-500 @enderror"
                        type="text"
                        name="name"
                        id="name"
                        required
                    >

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Form Input -->
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email"
                    >
                        Email:
                    </label>

                    <input
                        wire:model.defer="email"
                        class="border border-gray-400 p-2 w-full rounded-md @error('name') border-red-500 @enderror"
                        type="email"
                        name="email"
                        id="email"
                        required
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Form Input -->
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="phone"
                    >
                        Phone:
                    </label>

                    <input
                        wire:model.defer="phone"
                        class="border border-gray-400 p-2 w-full rounded-md @error('name') border-red-500 @enderror"
                        type="text"
                        name="phone"
                        id="phone"
                        required
                    >

                    @error('phone')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message Form Input -->
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="message"
                    >
                        Message:
                    </label>

                    <textarea
                        wire:model.defer="message"
                        class="border border-gray-400 p-2 w-full rounded-md @error('name') border-red-500 @enderror"
                        name="message"
                        id="message"
                        rows="4"
                        cols="50"
                        required
                    ></textarea>

                    @error('message')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a
                        href="#"
                        class="bg-gray-400 text-white rounded py-2 px-4 hover:bg-gray-500"
                    >Cancel</a>
                    <button
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        type="submit"
                    >
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
