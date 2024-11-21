<div class="w-full max-w-7xl py-12 px-6 sm:px-8 lg:px-10 mx-auto bg-gray-50 dark:bg-gray-900">
    <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white text-center mb-10">
        Checkout
    </h1>
    <form wire:submit.prevent="placeOrder">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Shipping Address and Payment -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Shipping Address -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">
                        Shipping Address
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="first_name">First Name</label>
                            <input wire:model="first_name"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 px-4 py-3 @error('first_name')
                                    border-red-500
                                @enderror"
                                id="first_name" type="text" placeholder="Your First Name">
                            @error('first_name')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="last_name">Last Name</label>
                            <input wire:model="last_name"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 px-4 py-3 @error('last_name')
                                    border-red-500
                                @enderror"
                                id="last_name" type="text" placeholder="Your Last Name">
                            @error('last_name')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="phone">Phone</label>
                        <div
                            class="flex rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus-within:ring-blue-500 focus-within:border-blue-500">
                            <!-- Kode Negara -->
                            <span
                                class="flex items-center px-4 bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-l-lg">
                                +62
                            </span>
                            <!-- Input Nomor Telepon -->
                            <input wire:model="phone"
                                class="block w-full rounded-r-lg border-none dark:bg-gray-700 dark:text-white focus:ring-0 focus:outline-none px-4 py-3 @error('phone') border-red-500 @enderror"
                                id="phone" type="text" placeholder="8123456789" maxlength="11">
                        </div>
                        @error('phone')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="address">Address</label>
                        <input wire:model="street_address"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 px-4 py-3 @error('street_address')
                                    border-red-500
                                @enderror"
                            id="address" type="text" placeholder="Your Street Address">
                        @error('street_address')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
                        <!-- City -->
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="city">City</label>
                            <input wire:model="city"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 px-4 py-3 @error('city')
                                    border-red-500
                                @enderror"
                                id="city" type="text" placeholder="City">
                            @error('city')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <!-- State -->
                        <div>
                            <label class="block text-gray-700 dark:text-gray-300 mb-2" for="state">State</label>
                            <input wire:model="state"
                                class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 px-4 py-3 @error('state')
                                    border-red-500
                                @enderror"
                                id="state" type="text" placeholder="State">
                            @error('state')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block text-gray-700 dark:text-gray-300 mb-2" for="zip">ZIP Code</label>
                        <input wire:model="zip_code"
                            class="block w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 px-4 py-3 @error('zip_code')
                                    border-red-500
                                @enderror"
                            id="zip" type="text" placeholder="ZIP Code">
                        @error('zip_code')
                            <p class="text-sm text-red-500 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 transition-all duration-300">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                        Choose Your Payment Method
                    </h2>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Payment: COD -->
                        <li>
                            <input wire:model="payment_method" id="payment-cod" name="payment" type="radio"
                                value="cod" class="hidden peer">
                            <label for="payment-cod"
                                class="flex flex-col items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-6 py-6 cursor-pointer transition-all duration-200 transform hover:scale-105 hover:shadow-lg peer-checked:border-blue-500 peer-checked:bg-blue-100 dark:peer-checked:bg-blue-900 peer-checked:ring-4 peer-checked:ring-blue-300">
                                <span class="text-lg font-medium text-gray-700 dark:text-gray-200">
                                    Cash on Delivery
                                </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Pay when your order arrives
                                </span>
                            </label>
                        </li>
                        <!-- Payment: Stripe -->
                        <li>
                            <input wire:model="payment_method" id="payment-stripe" name="payment" type="radio"
                                value="stripe" class="hidden peer">
                            <label for="payment-stripe"
                                class="flex flex-col items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-6 py-6 cursor-pointer transition-all duration-200 transform hover:scale-105 hover:shadow-lg peer-checked:border-blue-500 peer-checked:bg-blue-100 dark:peer-checked:bg-blue-900 peer-checked:ring-4 peer-checked:ring-blue-300">
                                <span class="text-lg font-medium text-gray-700 dark:text-gray-200">
                                    Stripe
                                </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Pay securely using your credit card
                                </span>
                            </label>
                        </li>
                    </ul>
                    @error('payment_method')
                        <p class="text-sm text-red-500 mt-4 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            <!-- Order Summary -->
            <div class="space-y-8">
                <!-- Summary -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">
                        Order Summary
                    </h2>
                    <div class="space-y-4 text-gray-600 dark:text-gray-400">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>{{ Number::currency($grand_total, 'IDR') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Taxes</span>
                            <span>{{ Number::currency(0, 'IDR') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span>{{ Number::currency(0, 'IDR') }}</span>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between text-lg font-bold text-gray-800 dark:text-white">
                        <span>Total</span>
                        <span>{{ Number::currency($grand_total, 'IDR') }}</span>
                    </div>
                    <hr class="my-4">
                    <button type="submit"
                        class="mt-4 w-full bg-blue-600 text-white text-lg font-medium py-3 rounded-lg hover:bg-blue-700 transition">
                        <span wire:loading.remove>Place Order</span>
                        <span wire:loading>Processing...</span>
                    </button>
                </div>


                <!-- Basket -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">
                        Bucket Summary
                    </h2>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($cart_items as $item)
                            <li class="flex items-center space-x-6 py-4">
                                <img class="w-16 h-16 object-cover rounded-lg"
                                    src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                <div class="flex-1">
                                    <h3 class="font-medium text-gray-800 dark:text-white">{{ $item['name'] }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Qty: {{ $item['quantity'] }}
                                    </p>
                                </div>
                                <span class="font-bold text-gray-800 dark:text-white">
                                    {{ Number::currency($item['total_amount'], 'IDR') }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
