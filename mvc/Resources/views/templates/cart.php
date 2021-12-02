<div>
    <?php $total=0; ?>
    <h2>Your cart</h2>
    <table class="table table-striped">
        <thead>
        <th>#</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Actions</th>
        <th>Price</th>
        <th>Sum</th>
        </thead>
        <?php
        /**
         * Alle Products durchgehen und eine List ausgeben.
         */
        foreach ($products as $product): ?>

            <tr>
                <td><?php
                    echo $product->id; ?></td>
                <td>
                    <a href="<?php
                    echo BASE_URL; ?>/products/<?php
                    echo $product->id; ?>/show"><?php
                        echo $product->name; ?>
                    </a>
                </td>
                <td><?php
                    echo $product->count; ?></td>
                <td>
                    <a href="<?php
                    echo BASE_URL . "/products/$product->id/add-to-cart"; ?>" class="btn btn-primary">+</a>
                    <a href="<?php
                    echo BASE_URL . "/products/$product->id/remove-from-cart"; ?>" class="btn btn-primary">-</a>
                    <a href="<?php
                    echo BASE_URL . "/products/$product->id/remove-all-from-cart"; ?>" class="btn btn-danger">Remove from cart</a>
                </td>
                <td>
                   <?php echo $product->price; ?> €                  
                </td>
                <td> <?php echo $product->price * $product->count; ?> €</td>
            </tr>
        <?php $total += $product->price * $product->count; ?>
        <?php
        endforeach; ?>
        <tr>
            <td colspan = 5>Total: </td>
            <td><?php echo $total; ?> €</td>
        </tr>
    </table>

    <a href="<?php echo BASE_URL; ?>/checkout" class="basket-bttn">Checkout</a>
</div>