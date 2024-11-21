<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div
                        class="p-6 mb-5 bg-white border border-gray-200 dark:border-gray-900 dark:bg-gray-900 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-400">Categories</h2>
                        <div class="w-16 pb-2 mb-6 border-b-2 border-blue-500 dark:border-gray-400"></div>
                        <ul>
                            @foreach ($categories as $category)
                                <li class="mb-4" wire:key="{{ $category->id }}">
                                    <label for="{{ $category->slug }}"
                                        class="flex items-center cursor-pointer dark:text-gray-400 hover:text-blue-500 transition-colors duration-300">
                                        <input type="checkbox" wire:model.live="selected_categories"
                                            id="{{ $category->slug }}" value="{{ $category->id }}"
                                            class="w-5 h-5 mr-2 accent-blue-500">
                                        <span class="text-lg">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div
                        class="p-6 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-400">Brand</h2>
                        <div class="w-16 pb-2 mb-6 border-b-2 border-blue-500 dark:border-gray-400"></div>
                        <ul>
                            @foreach ($brands as $brand)
                                <li class="mb-4" wire:key="{{ $brand->id }}">
                                    <label for="{{ $brand->slug }}"
                                        class="flex items-center cursor-pointer dark:text-gray-300 hover:text-blue-500 transition-colors duration-300">
                                        <input type="checkbox" wire:model.live="selected_brands"
                                            id="{{ $brand->slug }}" value="{{ $brand->id }}"
                                            class="w-5 h-5 mr-2 accent-blue-500">
                                        <span class="text-lg dark:text-gray-400">{{ $brand->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div
                        class="p-6 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-400">Product Status</h2>
                        <div class="w-16 pb-2 mb-6 border-b-2 border-blue-500 dark:border-gray-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label
                                    class="flex items-center cursor-pointer dark:text-gray-300 hover:text-blue-500 transition-colors duration-300">
                                    <input type="checkbox" wire:model.live="featured"
                                        class="w-5 h-5 mr-2 accent-blue-500">
                                    <span class="text-lg dark:text-gray-400">Featured Products</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label
                                    class="flex items-center cursor-pointer dark:text-gray-300 hover:text-blue-500 transition-colors duration-300">
                                    <input type="checkbox" wire:model.live="sale" class="w-5 h-5 mr-2 accent-blue-500">
                                    <span class="text-lg dark:text-gray-400">On Sale</span>
                                </label>
                            </li>
                        </ul>
                    </div>


                    <div
                        class="p-6 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-400">Price</h2>
                        <div class="w-16 pb-2 mb-6 border-b-2 border-blue-500 dark:border-gray-400"></div>
                        <div>
                            <div class="font-semibold">{{ Number::currency($price_range, 'IDR') }}</div>
                            <input type="range" wire:model.live="price_range"
                                class="w-full h-2 mb-4 bg-blue-200 rounded-lg appearance-none cursor-pointer accent-blue-500 hover:bg-blue-300 transition duration-300"
                                max="50000000" value="30000000" step="1000000">
                            <div class="flex justify-between items-center overflow-hidden p-4">
                                <span class="text-sm font-medium text-blue-500 dark:text-blue-300 mr-4 truncate">
                                    {{ Number::currency(1000000, 'IDR') }}
                                </span>
                                <span class="text-sm font-medium text-blue-500 dark:text-blue-300 ml-4 truncate">
                                    {{ Number::currency(50000000, 'IDR') }}
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div
                            class="items-center justify-between hidden px-4 py-3 bg-gray-100 border border-gray-200 rounded-lg shadow-sm md:flex dark:bg-gray-900 dark:border-gray-800">
                            <div class="flex items-center space-x-2">
                                <label for="sort"
                                    class="text-base font-semibold text-gray-700 dark:text-gray-300">Sort by:</label>
                                <div class="relative">
                                    <select wire:model.live="sort"
                                        class="block w-44 px-3 py-2 pr-10 text-base text-gray-700 bg-gray-100 border border-gray-300 rounded-lg cursor-pointer appearance-none dark:text-gray-300 dark:bg-gray-800 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                                        <option value="latest">Latest</option>
                                        <option value="price">Price</option>
                                    </select>
                                    <!-- Menggunakan komponen x-eva-arrow-down untuk ikon panah -->
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <x-eva-arrow-down class="w-4 h-4 text-gray-500 dark:text-gray-400" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex flex-wrap items-center ">

                        @foreach ($products as $product)
                            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                                <div
                                    class="border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg overflow-hidden">
                                    <div class="relative bg-gray-200">
                                        <a href="/products/{{ $product->slug }}" class="block overflow-hidden">
                                            <img src="{{ url('storage', $product->images[0]) }}"
                                                alt="{{ $product->name }}"
                                                class="object-cover w-full h-56 mx-auto transform transition duration-300 hover:scale-105">
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h3 class="text-xl font-semibold dark:text-gray-400">
                                                {{ $product->name }}
                                            </h3>
                                        </div>
                                        <p class="text-lg font-bold">
                                            <span
                                                class="text-green-600 dark:text-green-500">{{ Number::currency($product->price, 'IDR') }}</span>
                                        </p>
                                    </div>
                                    <div
                                        class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800">
                                        <a wire:click.prevent="addToCart({{ $product->id }})" href="#"
                                            class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300 transition-colors duration-300">

                                            <!-- Ikon Cart -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="w-5 h-5 bi bi-cart3" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg>

                                            <!-- Teks dan Ikon Loading -->
                                            <span class="text-sm font-semibold flex items-center space-x-2">
                                                <span wire:loading.remove
                                                    wire:target='addToCart({{ $product->id }})'>Add to Cart</span>
                                                <span wire:loading.delay wire:target='addToCart({{ $product->id }})'
                                                    class="flex items-center space-x-1">
                                                    <i class="fas fa-spinner fa-spin"></i>
                                                    <span>Adding...</span>
                                                </span>
                                            </span>

                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>

</div>
