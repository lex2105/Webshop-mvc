<table>
    <thead>
        <th>Date ordered</th>
        <th>Products</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Delivery address</th>
    </thead>
</table>
<?php foreach ($orders as $order) : ?>
    <tr>
        <td>
            <p><?php echo $order->created_at ?></p>
        </td>
        <td>
            <p><?php echo $order->product_id ?></p>
        </td>
        <td>
            <p><?php echo $order->quantity ?></p>
        </td>
        <td>
            <p><?php echo $order->price ?></p>
        </td>
        <td>
            <p><?php echo $order->address ?> <?php echo $order->number ?>, <?php echo $order->postal_code ?> <?php echo $order->city ?>, <?php echo $order->state ?></p>
        </td>
    </tr>
<?php endforeach; ?>