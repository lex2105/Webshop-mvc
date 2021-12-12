<div class="userProfile-background">
    <h1 class="userProfile-title">List of all orders</h1>
    <table id="users">
        <thead>
            <th>Date ordered</th>
            <th>Order ID</th>
            <th>Price</th>
            <th>Delivery address</th>
        </thead>
        <?php

        use App\Models\OrderItem;
        use App\Models\Product;

        foreach ($orders as $order) : ?>
            <tr>
                <td>
                    <p><?php echo $order->created_at ?></p>
                </td>
                <td>
                    <p><?php echo $order->id ?></p>
                </td>
                <td>
                    <p><?php echo $order->price ?> €</p>
                </td>
                <td>
                    <p><?php echo $order->address ?> <?php echo $order->number ?>, <?php echo $order->postal_code ?> <?php echo $order->city ?>, <?php echo $order->state ?></p>
                </td>
            </tr>
            <?php $orderItems = OrderItem::getOrderItems($order->id); ?>
            <tr>
                <td colspan=4>
                    <table>
                        <tr>
                            <td></td>
                            <td>product name</td>
                            <td>price</td>
                            <td>quantity</td>
                        </tr>
                        <?php
                        foreach ($orderItems as $orderItem) : ?>
                            <?php $product = Product::findOrFail($orderItem->product_id, true); ?>
                            <tr>
                                <td></td>
                                <td>
                                    <p><?php echo $product->name ?></p>
                                </td>
                                <td>
                                    <p><?php echo $orderItem->price ?> €</p>
                                </td>
                                <td>
                                    <p><?php echo $orderItem->quantity ?></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>