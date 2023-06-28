<div class="max-w-6xl mx-auto">
    
    <div class="flex justify-end m-2 p-2">
        <x-button wire:click="showPostModal">Create</x-button>
    </div>

    <div class="m-2 p-2">

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

    </div>

    <div>
        <x-dialog-modal wire:model="showingPostModal">
            <x-slot name="title">Create Post</x-slot>
            <x-slot name="content">
                <form novalidate="" class="flex flex-col py-6 space-y-6 md:py-0 md:px-6">
                <label class="block">
                    <span class="mb-1">Post title</span>
                    <input type="text" placeholder="" name="title" id="title" wire:model.lazy="title" class="block w-full rounded-md shadow-sm focus:ring focus:ri focus:ri focus:ring-indigo-800">
                </label>
                <label class="block">
                    <span class="mb-1">Post image</span>
                    <input type="file" name="image" id="image" wire:model="newImage" class="block w-full appearance-none bg-white border border-gray-400 py-6 space-y-6 md:py-0 md:px-6">
                </label>
                <label class="block">
                    <span class="mb-1">Body</span>
                    <textarea rows="3" name="body" id="body" wire:model.lazy="body" class="block w-full rounded-md focus:ring focus:ri focus:ri focus:ring-indigo-800"></textarea>
                </label>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-button wire:click="storePost">Store</x-button>
            </x-slot>
        </x-dialog-modal>
    </div>

</div>

