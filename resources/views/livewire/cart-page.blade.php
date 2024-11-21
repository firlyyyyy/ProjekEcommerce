<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6 mb-6">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold text-gray-600">Product</th>
                                <th class="text-left font-semibold text-gray-600">Price</th>
                                <th class="text-left font-semibold text-gray-600">Quantity</th>
                                <th class="text-left font-semibold text-gray-600">Total</th>
                                <th class="text-left font-semibold text-gray-600">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart_items as $item)
                                <tr wire:key='{{ $item['product_id'] }}' class="border-b border-gray-200">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4 rounded-lg object-cover"
                                                    src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                                <span class="font-medium text-gray-800">{{ $item['name'] }}</span>
                                            </div>
                                        </td>
                                    <td class="py-4 text-gray-700">{{ Number::currency($item['unit_amount'], 'IDR') }}
                                    </td>
                                    <td class="py-4">
                                        <div class="flex items-center space-x-2">
                                            <button wire:click='decreaseQty({{ $item['product_id'] }})'
                                                class="border rounded-lg py-2 px-4 bg-gray-100 hover:bg-gray-200 transition">
                                                -
                                            </button>
                                            <span class="text-center w-8 text-gray-800">{{ $item['quantity'] }}</span>
                                            <button wire:click='increaseQty({{ $item['product_id'] }})'
                                                class="border rounded-lg py-2 px-4 bg-gray-100 hover:bg-gray-200 transition">
                                                +
                                            </button>
                                        </div>
                                    </td>
                                    <td class="py-4 text-gray-700">{{ Number::currency($item['total_amount'], 'IDR') }}
                                    </td>
                                    <td class="py-4">
                                        <button wire:click='removeItem({{ $item['product_id'] }})'
                                            class="px-4 py-2 text-white bg-red-600 hover:text-white border rounded-lg hover:bg-red-700 transition font-semibold">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-2xl font-semibold text-gray-500">No
                                        items in cart</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">Order Summary</h2>
                    <div class="space-y-3 text-gray-700">
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
                        <hr class="my-4">
                        <div class="flex justify-between text-lg font-semibold text-gray-800">
                            <span>Grand Total</span>
                            <span>{{ Number::currency($grand_total, 'IDR') }}</span>
                        </div>
                    </div>
                    @if ($cart_items)
                        <a href="/checkout">
                            <button
                                class="mt-6 w-full py-3 bg-blue-600 text-white rounded-lg text-lg font-semibold hover:bg-blue-700 transition">Checkout</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
