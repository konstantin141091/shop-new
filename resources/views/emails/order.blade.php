# Оформлен новый заказ.

<div class="email-order">
    <p>Номер заказа: {{ $order->id }}</p>
    <p>Имя заказчика: {{ $order->name }}</p>
    <p>Телефон: {{ $order->phone }}</p>
    <p>Сумма заказа: {{ $order->total_price }}</p>
</div>

С уважением,<br>
Башкирские колбасы.
