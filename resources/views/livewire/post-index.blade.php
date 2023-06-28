<div class="max-w-6xl mx-auto">

    <div class="flex justify-end m-2 p-2">
        <x-button wire:click="showPostModal">Create</x-button>
    </div>

    <div class="m-2 p-2">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Titles
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4">
                            <img class="w-8 h-8 rounded-full" src="{{ Storage::url($post->image) }}" alt="">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <x-button class="bg-gray-600 hover:bg-gray-900" wire:click="showPost({{ $post->id }})">
                                    Show
                                </x-button>
                                <x-button class="bg-blue-600 hover:bg-blue-900"
                                    wire:click="showEditPostModal({{ $post->id }})">
                                    Edit
                                </x-button>
                                <x-button class="bg-red-400 hover:bg-red-600" wire:click="deletePost({{ $post->id }})">
                                    Delete
                                </x-button>
                            </div>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    <div>
        <x-dialog-modal wire:model="showingPostModal">

                        @if ($isEditMode)
                        <x-slot name="title">Update Post</x-slot>
                        @else
                        <x-slot name="title">Create Post</x-slot>
                        @endif
                        <x-slot name="content">
                            <form novalidate="" class="flex flex-col py-6 space-y-6 md:py-0 md:px-6">
                                <label class="block">
                                    <span class="mb-1">Post title</span>
                                    <input type="text" placeholder="" name="title" id="title" wire:model.lazy="title"
                                        class="block w-full rounded-md shadow-sm focus:ring focus:ri focus:ri focus:ring-indigo-800">
                                    @error('title') <span class="text-red-400">{{ $message }}</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="mb-1">Post image</span>
                                    @if ($oldImage)
                                    Old image Preview:
                                    <img src="{{ Storage::url($oldImage) }}">
                                    @endif
                                    @if ($newImage)
                                    Photo Preview:
                                    <img src="{{ $newImage->temporaryUrl() }}">
                                    @endif
                                    <input type="file" name="image" id="image" wire:model="newImage"
                                        class="block w-full appearance-none bg-white border border-gray-400 py-6 space-y-6 md:py-0 md:px-6">
                                    @error('newImage') <span class="text-red-400">{{ $message }}</span> @enderror

                                </label>
                                <label class="block">
                                    <span class="mb-1">Body</span>
                                    <textarea rows="3" name="body" id="body" wire:model.lazy="body"
                                        class="block w-full rounded-md focus:ring focus:ri focus:ri focus:ring-indigo-800"></textarea>
                                    @error('body') <span class="text-red-400">{{ $message }}</span> @enderror

                                </label>
                            </form>
                        </x-slot>
                        <x-slot name="footer">
                            @if ($isEditMode)
                            <x-button wire:click="updatePost">Update</x-button>
                            @else
                            <x-button wire:click="storePost">Store</x-button>
                            @endif
                        </x-slot>

        </x-dialog-modal>

        <x-dialog-modal wire:model="showingPostModal2">

            <x-slot name="title">Detail</x-slot>
            <x-slot name="content">
                <form novalidate="" class="flex flex-col py-6 space-y-6 md:py-0 md:px-6">
                    <label class="block">
                        <span class="mb-1">Title</span>
                        <h3>{{ $post->title }}</h3>
                    </label>
                    <label class="block">
                        <span class="mb-1">Image</span>
                        @if ($oldImage)
                        Old image Preview:
                        <img src="{{ Storage::url($oldImage) }}">
                        @endif
                        @if ($newImage)
                        Photo Preview:
                        <img src="{{ $newImage->temporaryUrl() }}">
                        @endif
                    </label>
                    <label class="block">
                        <span class="mb-1">Body</span>
                        <h3>{{ $post->body }}</h3>

                    </label>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-button data-modal-hide="small-modal" type="button" wire:click="closeShowPost"
                        class="text-blue-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer
                </x-button>
            </x-slot>

</x-dialog-modal>
    </div>

</div>

{{-- <div> --}}
    <!-- Small Modal -->
    <div id="small-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white" wire:>
                        Small modal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="small-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy
                        laws for
                        its citizens, companies around the world are updating their terms of service
                        agreements to
                        comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect
                        on May
                        25 and is meant to ensure a common set of data rights in the European Union. It
                        requires
                        organizations to notify users as soon as possible of high-risk data breaches that
                        could
                        personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="small-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="small-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>
    </div>