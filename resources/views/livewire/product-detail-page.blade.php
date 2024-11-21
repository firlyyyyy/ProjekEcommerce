<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="overflow-hidden bg-white rounded-lg shadow-lg py-11 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4">
                <!-- Bagian Gambar Utama -->
                <div class="w-full mb-8 md:w-1/2 md:mb-0" x-data="{ mainImage: '{{ url('storage', $products->images[0]) }}', opacity: 1 }">
                    <div class="sticky top-0 overflow-hidden">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4">
                            <!-- Gambar utama dengan ukuran tetap dan efek transisi -->
                            <img :src="mainImage" alt="Product Image"
                                class="object-contain w-full h-80 lg:h-96 rounded-md shadow-md transition-opacity duration-300"
                                :class="{ 'opacity-0': opacity === 0, 'opacity-100': opacity === 1 }"
                                @load="opacity = 1" />
                        </div>

                        <!-- Thumbnail Gambar -->
                        <div class="flex-wrap hidden md:flex space-x-2">
                            @foreach ($products->images as $image)
                                <div class="w-1/4 p-1 cursor-pointer"
                                    x-on:click="opacity = 0; setTimeout(() => mainImage='{{ url('storage/' . $image) }}', 300)">
                                    <img src="{{ url('storage/' . $image) }}" alt="{{ $products->name }}"
                                        class="object-contain w-full h-24 rounded-md hover:border-blue-500 hover:shadow-md transition duration-200">
                                </div>
                            @endforeach
                        </div>

                        <div class="px-6 pb-6 mt-6 border-t border-gray-300 dark:border-gray-400">
                            <div class="flex items-center mt-6 space-x-2">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="w-4 h-4 text-gray-700 dark:text-gray-400 bi bi-truck"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481
                                                  1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5
                                                  1.5 0 0 1 0 10.5v-7zM1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5
                                                  0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5
                                                  0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                        </path>
                                    </svg>
                                </span>
                                <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">Free Shipping</h2>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- Bagian Detail Produk -->
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20">
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-400 mb-2">{{ $products->name }}
                            </h2>
                            <p class="text-4xl font-semibold text-gray-700 dark:text-gray-400">
                                Rp. {{ number_format($products->price, 0, ',', '.') }}
                                {{-- <span
                                    class="text-base font-normal text-gray-500 line-through dark:text-gray-400 ml-2">$1800.99</span> --}}
                            </p>
                            <p class="max-w-md text-gray-700 dark:text-gray-400 mt-4 leading-relaxed">
                                {{ $products->description }}
                            </p>
                        </div>

                        <!-- Bagian Quantity -->
                        <div class="mb-4 w-24">
                            <label
                                class="block text-lg font-semibold text-gray-700 dark:text-gray-400 mb-1">Quantity</label>
                            <div class="flex items-center rounded-md bg-gray-300 dark:bg-gray-900">
                                <!-- Tombol Kurangi Quantity -->
                                <button wire:click='decreaseQty'
                                    class="w-8 h-8 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-gray-400 dark:hover:bg-gray-700 rounded-l-md transition-all">
                                    <span class="text-lg">-</span>
                                </button>

                                <!-- Input Quantity -->
                                <input type="text" wire:model='quantity' readonly
                                    class="w-12 text-center bg-gray-300 dark:bg-gray-900 text-gray-700 dark:text-gray-400 font-medium focus:outline-none" />

                                <!-- Tombol Tambah Quantity -->
                                <button wire:click='increaseQty'
                                    class="w-8 h-8 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-gray-400 dark:hover:bg-gray-700 rounded-r-md transition-all">
                                    <span class="text-lg">+</span>
                                </button>
                            </div>
                        </div>


                        <!-- Tombol Tambah ke Keranjang -->
                        <div class="flex gap-4">
                            <button wire:click='addToCart({{ $products->id }})'
                                class="w-full lg:w-2/5 p-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-700 transition-all relative flex items-center justify-center">

                                <!-- Teks 'Add to Cart' saat tidak loading -->
                                <span wire:loading.remove wire:target='addToCart({{ $products->id }})'
                                    class="flex items-center">
                                    Add to Cart
                                </span>

                                <!-- Efek loading yang muncul saat loading -->
                                <span wire:loading wire:target='addToCart({{ $products->id }})'
                                    class="flex items-center justify-center">
                                    <i class="fas fa-spinner fa-spin text-white mr-2"></i>
                                    <span class="text-sm">Adding...</span>
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
