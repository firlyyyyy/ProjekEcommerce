<section class="flex items-center justify-center font-poppins dark:bg-gray-900 py-12 px-4">
    <div
        class="max-w-5xl w-full bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-800 rounded-lg shadow-md p-8 md:p-12">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-gray-100 mb-8">
            🎉 Thank You! Your Order is Confirmed.
        </h1>
        <p class="text-center text-gray-600 dark:text-gray-400 mb-12">
            Your order has been successfully received and is being processed. Below are the details:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Order Number</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $order->id }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Order Date</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $order->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Amount</p>
                <p class="text-lg font-semibold text-blue-600 dark:text-blue-400">
                    {{ Number::currency($order->grand_total, 'IDR') }}
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Payment Method</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $order->payment_method == 'cod' ? 'Cash on Delivery' : 'Card' }}
                </p>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Shipping Address</h2>
            <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg border border-gray-200 dark:border-gray-600">
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $order->address->full_name }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $order->address->street_address }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $order->address->city }}, {{ $order->address->state }}, {{ $order->address->zip_code }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Phone: {{ $order->address->phone }}</p>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Order Summary</h2>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                    <span
                        class="text-gray-800 dark:text-gray-200">{{ Number::currency($order->grand_total, 'IDR') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-400">Discount</span>
                    <span class="text-gray-800 dark:text-gray-200">{{ Number::currency(0, 'IDR') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600 dark:text-gray-400">Shipping</span>
                    <span class="text-gray-800 dark:text-gray-200">{{ Number::currency(0, 'IDR') }}</span>
                </div>
                <div class="border-t border-gray-200 dark:border-gray-700 mt-4 pt-4 flex justify-between">
                    <span class="text-lg font-bold text-gray-800 dark:text-gray-100">Total</span>
                    <span class="text-lg font-bold text-blue-600 dark:text-blue-400">
                        {{ Number::currency($order->grand_total, 'IDR') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="flex justify-center gap-4">
            <a href="/products"
                class="px-6 py-3 bg-blue-500 text-white rounded-lg font-semibold shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                Continue Shopping
            </a>
            <a href="/my-orders"
                class="px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
                View My Orders
            </a>
        </div>
    </div>
</section>
