<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-black">Order Details</h1>

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
        <!-- Card -->
        <div
            class="flex flex-col bg-white border shadow-md rounded-lg dark:bg-slate-900 dark:border-gray-800">
            <div class="p-5 flex items-center gap-4">
                <!-- Ikon -->
                <div
                    class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full dark:bg-gray-800">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>

                <!-- Informasi -->
                <div class="grow">
                    <p class="text-sm uppercase font-semibold text-gray-500 dark:text-gray-400">
                        Customer
                    </p>
                    <h3 class="mt-1 text-lg font-medium text-gray-800 dark:text-gray-200">
                        {{ $address->full_name }}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div
            class="flex flex-col bg-white border shadow-md rounded-lg dark:bg-slate-900 dark:border-gray-800">
            <div class="p-5 flex items-center gap-4">
                <!-- Ikon -->
                <div
                    class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full dark:bg-gray-800">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 22h14" />
                        <path d="M5 2h14" />
                        <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                        <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                    </svg>
                </div>

                <!-- Informasi -->
                <div class="grow">
                    <p class="text-sm uppercase font-semibold text-gray-500 dark:text-gray-400">
                        Order Date
                    </p>
                    <h3 class="mt-1 text-lg font-medium text-gray-800 dark:text-gray-200">
                        {{ $order_items[0]->created_at->format('d-m-Y') }}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div
            class="flex flex-col bg-white border shadow-md rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="p-5 flex items-center gap-4">
                <!-- Ikon -->
                <div
                    class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full dark:bg-gray-800">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
                        <path d="m12 12 4 10 1.7-4.3L22 16Z" />
                    </svg>
                </div>

                <!-- Informasi -->
                <div class="grow">
                    <p class="text-xs uppercase font-semibold tracking-wide text-gray-500 dark:text-gray-400">
                        Order Status
                    </p>

                    <!-- Status Dinamis -->
                    <div class="mt-1 flex items-center gap-x-2">
                        @php
                            $statusLabels = [
                                'new' => '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow-md">New</span>',
                                'processing' =>
                                    '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow-md">Processing</span>',
                                'shipped' =>
                                    '<span class="bg-green-500 py-1 px-3 rounded text-white shadow-md">Shipped</span>',
                                'delivered' =>
                                    '<span class="bg-green-700 py-1 px-3 rounded text-white shadow-md">Delivered</span>',
                                'cancelled' =>
                                    '<span class="bg-red-500 py-1 px-3 rounded text-white shadow-md">Cancelled</span>',
                            ];

                            // Menentukan status
                            $status =
                                $statusLabels[$order->status] ??
                                '<span class="bg-gray-500 py-1 px-3 rounded text-white shadow-md">Unknown</span>';

                            $paymentStatusLabels = [
                                'pending' =>
                                    '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow-md">Pending</span>',
                                'paid' =>
                                    '<span class="bg-green-500 py-1 px-3 rounded text-white shadow-md">Paid</span>',
                                'failed' =>
                                    '<span class="bg-red-500 py-1 px-3 rounded text-white shadow-md">Failed</span>',
                            ];

                            // Menentukan status pembayaran
                            $payment_status =
                                $paymentStatusLabels[$order->payment_status] ??
                                '<span class="bg-gray-500 py-1 px-3 rounded text-white shadow-md">Unknown</span>';
                        @endphp

                        {!! $status !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div
            class="flex flex-col bg-white border shadow-md rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="p-5 flex items-center gap-4">
                <!-- Ikon -->
                <div
                    class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-full dark:bg-gray-800">
                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
                        <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
                        <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
                    </svg>
                </div>

                <!-- Informasi -->
                <div class="grow">
                    <p class="text-xs uppercase font-semibold tracking-wide text-gray-500 dark:text-gray-400">
                        Payment Status
                    </p>

                    <!-- Status Dinamis -->
                    <div class="mt-1 flex items-center gap-x-2">
                        {!! $payment_status !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->

    <div class="flex flex-col md:flex-row gap-6 mt-6">
        <!-- Bagian Kiri -->
        <div class="md:w-3/4">
            <!-- Tabel Order Items -->
            <div class="bg-white overflow-x-auto rounded-lg shadow-lg p-6 mb-6">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Product</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Price</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Quantity</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_items as $item)
                            <tr wire:key="{{ $item->id }}" class="border-b hover:bg-gray-50">
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-4">
                                        <img class="h-16 w-16 object-cover rounded-lg"
                                            src="{{ url('storage', $item->product->images[0]) }}"
                                            alt="{{ $item->product->name }}">

                                        <span class="font-medium text-gray-800">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-gray-700">{{ Number::currency($item->unit_amount, 'IDR') }}
                                </td>
                                <td class="py-4 px-4 text-center">{{ $item->quantity }}</td>
                                <td class="py-4 px-4 text-gray-700">{{ Number::currency($item->total_amount, 'IDR') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Alamat Pengiriman -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h1 class="text-2xl font-semibold text-slate-600 mb-4">Shipping Address</h1>
                <div class="flex justify-between items-center">
                    <div class="text-gray-700">
                        <p>{{ $address->street_address }}, {{ $address->city }}, {{ $address->state }},
                            {{ $address->zip_code }}</p>
                    </div>
                    <div class="text-gray-700">
                        <p class="font-semibold">Phone:</p>
                        <p>{{ $address->phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="md:w-1/4">
            <!-- Ringkasan Pembayaran -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Summary</h2>
                <div class="flex justify-between mb-4">
                    <span class="text-gray-600">Subtotal</span>
                    <span
                        class="font-semibold text-gray-800">{{ Number::currency($item->order->grand_total, 'IDR') }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="text-gray-600">Taxes</span>
                    <span class="text-gray-800">{{ Number::currency(0, 'IDR') }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="text-gray-600">Shipping</span>
                    <span class="text-gray-800">{{ Number::currency(0, 'IDR') }}</span>
                </div>
                <hr class="my-4 border-gray-200">
                <div class="flex justify-between mb-4">
                    <span class="font-semibold text-gray-700">Grand Total</span>
                    <span
                        class="font-semibold text-gray-800">{{ Number::currency($item->order->grand_total, 'IDR') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
