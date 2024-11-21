<x-mail::message>
    # 🎉 Order Placed Successfully!

    Hello, **{{ $order->user->name }}** 👋

    Thank you for shopping with us! Your order has been placed successfully. Below are your order details:

    ---

    ### 🛒 **Order Summary**
    - **Order Number:** {{ $order->id }}
    - **Total Amount:** {{ number_format($order->grand_total, 2) }} {{ strtoupper($order->currency) }}
    - **Order Date:** {{ $order->created_at->format('F d, Y') }}

    ---

    <x-mail::button :url="$url" color="success">
        📄 View Your Order Details
    </x-mail::button>

    If you have any questions about your order, feel free to contact our support team.

    Thanks for choosing **{{ config('app.name') }}**!
    We hope to see you again soon! 😊

    Best regards,
    The **{{ config('app.name') }}** Team
</x-mail::message>
