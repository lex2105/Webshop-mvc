<div class="main__checkout-wrapper">
    <?php $total=0; ?>
    <h2 class="main__checkout__title">Your cart</h2>
    <table class="cart-table">
        <thead>
            <th>#</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price p.u.</th>
            <th>Price sum</th>
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
                <td>
                    <a href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>" class="add-bttn">+</a>
                    <?php echo $product->count; ?>
                    <a href="<?php echo BASE_URL . "/products/$product->id/remove-from-cart"; ?>" class="remove-bttn">-</a>
                    <a href="<?php echo BASE_URL . "/products/$product->id/remove-all-from-cart"; ?>" class="remove-all-bttn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z"/></svg>
                    </a>
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
            <td colspan = 4><b>Total:</b></td>
            <td><b><?php echo $total; ?> €</b></td>
            
        </tr>
    </table>
    
    <?php if (\App\Models\User::isLoggedIn()): ?>
    <a href="<?php echo BASE_URL; ?>/checkout" class="checkout-bttn">Checkout</a>
    <?php else: ?>
    <a href="<?php echo BASE_URL; ?>/login" class="checkout-bttn">Login</a>
    <?php endif; ?>
</div>