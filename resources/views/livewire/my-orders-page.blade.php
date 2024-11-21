<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">📦 My Orders</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <div class="-mx-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase">
                            Order
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase">
                            Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase">
                            Payment
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-bold text-gray-700 dark:text-gray-200 uppercase">
                            Amount
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-bold text-gray-700 dark:text-gray-200 uppercase">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($orders as $order)
                        @php
                            $statusLabels = [
                                'new' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-blue-500 rounded-full shadow">New</span>',
                                'processing' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-yellow-500 rounded-full shadow">Processing</span>',
                                'shipped' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-green-500 rounded-full shadow">Shipped</span>',
                                'delivered' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-green-700 rounded-full shadow">Delivered</span>',
                                'cancelled' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-red-500 rounded-full shadow">Cancelled</span>',
                            ];

                            $paymentStatusLabels = [
                                'pending' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-blue-500 rounded-full shadow">Pending</span>',
                                'paid' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-green-500 rounded-full shadow">Paid</span>',
                                'failed' =>
                                    '<span class="px-3 py-2 text-sm font-semibold text-white bg-red-500 rounded-full shadow">Failed</span>',
                            ];

                            // Menentukan status
                            $status =
                                $statusLabels[$order->status] ??
                                '<span class="px-3 py-2 text-sm font-semibold text-white bg-gray-500 rounded-full shadow">Unknown</span>';

                            // Menentukan status pembayaran
                            $payment_status =
                                $paymentStatusLabels[$order->payment_status] ??
                                '<span class="px-3 py-2 text-sm font-semibold text-white bg-gray-500 rounded-full shadow">Unknown</span>';
                        @endphp
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td
                                class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-200 whitespace-nowrap">
                                {{ $order->id }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                {{ $order->created_at->format('m-d-Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">
                                {!! $status !!}
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap">
                                {!! $payment_status !!}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 whitespace-nowrap">
                                {{ Number::currency($order->grand_total, 'IDR') }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm whitespace-nowrap">
                                <a href="/my-orders/{{ $order->id }}"
                                    class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 rounded-2xl hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</div>
