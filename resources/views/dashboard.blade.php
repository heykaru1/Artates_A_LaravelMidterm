<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- Add Product Form -->
            <div class="mb-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">{{ session('success') }}</strong>
                        <span class="block sm:inline">The product has been added successfully.</span>
                    </div>
                @endif

                @if(session('deleted'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">{{ session('deleted') }}</strong>
                        <span class="block sm:inline">The product has been deleted successfully.</span>
                    </div>
                @endif

                <div class="mb-6">
                    <h3 class="text-lg font-medium mb-4">Add New Product</h3>
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        @method('POST')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-gray-700">Product Name</label>
                                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter product name">
                            </div>
                            <div>
                                <label for="category" class="block text-gray-700">Category</label>
                                <input type="text" id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter category">
                            </div>
                            <div>
                                <label for="price" class="block text-gray-700">Price</label>
                                <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter price">
                            </div>
                            <div>
                                <label for="quantity" class="block text-gray-700">Stock Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter stock quantity">
                            </div>
                            <div>
                                <label for="description" class="block text-gray-700">Description</label>
                                <input type="text" id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter product description">
                            </div>
                            <div>
                                <label for="manufacturer" class="block text-gray-700">Manufacturer</label>
                                <input type="text" id="manufacturer" name="manufacturer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter manufacturer">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Product List Table -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium mb-4">Product List</h3>
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 border-b">#</th>
                                <th class="py-2 border-b">Name</th>
                                <th class="py-2 border-b">Category</th>
                                <th class="py-2 border-b">Price</th>
                                <th class="py-2 border-b">Stock Quantity</th>
                                <th class="py-2 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table">
                            @foreach($product as $key => $product)
                                <tr>
                                    <td class="py-2 border-b px-4 text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->name }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->category }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->price }}</td>
                                    <td class="py-2 border-b px-4 text-center">{{ $product->quantity }}</td>
                                    <td class="py-2 border-b px-4 text-center">
                                        <a href="{{ route('product.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                        <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
