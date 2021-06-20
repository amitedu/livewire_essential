<div>
    <!-- component -->
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div class="flex justify-between">
            <div
                class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
                @if(session()->has('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Contact Updated successfully',
                            {{--html: '<b>Deleted </b>, <a class="text-white bg-green-500 p-1 rounded" href="http://127.0.0.1:8000/contact/{{session()->get('success')}}/edit">Undo</a>',--}}
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 2500,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                    </script>
                @endif
                @php
                    session()->forget('success')
                @endphp

                @if(session()->has('error'))
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: '{{session()->get('error')}}',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    </script>
                @endif
                <div class="flex justify-between">
                    <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                        <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                            <div class="flex">
                                        <span
                                            class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                            <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                                    stroke="#455A64" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                            </div>
                            <input
                                wire:model="search"
                                type="text"
                                class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                                placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <label class="inline-flex items-center mt-3 px-12 mr-16">
                <input wire:model="active" type="checkbox" class="form-checkbox h-5 w-5 text-red-600" checked><span
                    class="ml-2 text-gray-700">active?</span>
            </label>
        </div>
        <div
            class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                        ID
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <button
                                wire:click="sortBy('name')"
                                class="font-bold focus:outline-none"
                            >
                                Fullname
                            </button>
{{--                            <x-sort-icon--}}
{{--                                feild = "name"--}}
{{--                                :sortFeild="$sortFeild"--}}
{{--                                :sortAsc="$sortAsc"--}}
{{--                            />--}}
                            @if($sortFeild !== 'name')
                                <span></span>
                            @elseif($sortAsc)
                                <svg class="ml-3 h-3" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            @else
                                <svg class="ml-3 h-3" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        <div class="flex items-center">
                            <button
                                wire:click="sortBy('email')"
                                class="font-bold focus:outline-none"
                            >
                                Email
                            </button>
{{--                            <x-sort-icon--}}
{{--                                feild = "email"--}}
{{--                                :sortFeild="$sortFeild"--}}
{{--                                :sortAsc="$sortAsc"--}}
{{--                            />--}}
                            @if($sortFeild !== 'email')
                                <span></span>
                            @elseif($sortAsc)
                                <svg class="ml-3 h-3" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            @else
                                <svg class="ml-3 h-3" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Image
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @forelse ($contacts as $contact)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">#{{ $loop->index + 1 }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ $contact->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $contact->email }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $contact->photo }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                  class="absolute inset-0 opacity-50 rounded-full {{ $contact->active ? 'bg-green-200' : 'bg-red-200' }}"></span>
                                            <span
                                                class="relative text-xs">{{ $contact->active ? 'active' : 'not active' }}</span>
                                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <a class="text-blue-500"
                                href="/contact/{{ $contact->id }}/edit"
                            >
                                Edit
                            </a> |
                            <a class="text-red-400"
                                href="/contact/{{ $contact->id }}/delete"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    No data available.
                @endforelse
                </tbody>
            </table>
            <div class="my-8">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
