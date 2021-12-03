<div>
    <div>
    <?php $total=0; ?>
    <table class="">
        <thead>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        </thead>
        <?php
        /**
         * Alle Products durchgehen und eine List ausgeben.
         */
        foreach ($products as $product): ?>

            <tr>
                <td>
                    <a href="<?php
                    echo BASE_URL; ?>/products/<?php
                    echo $product->id; ?>/show"><?php
                        echo $product->name; ?>
                    </a>
                </td>
                <td><?php
                    echo $product->count; ?>
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
    </div>

    <div>
    <form action="<?php echo BASE_URL; ?>/validateOrder" method="post" class="">

            <div>
                <h2>Delivery info</h2>
                <label for="address">Address:</label>
                <input type="text" name="address">

 

                <label for="number">Number:</label>
                <input type="text" name="number">

                <label for="postal_code">Postal code:</label>
                <input type="text" name="postal_code">

                <label for="city">City:</label>
                <input type="text" name="city">

                <label for="state">State:</label>
                <input type="text" name="state">
            </div>

            <div>
                <h2>Payment info</h2>
                <label for="card_type">Card type:</label>
                <select name="card_type" id="card_type">
                    <option value="_default" selected disabled>Prease choose</option>
                    <option value="visa">Visa</option>
                    <option value="diners">Diners</option>
                    <option value="mastercard">Mastercard</option>
                </select>

                <label for="card_holder">Card holder:</label>
                <input type="text" name="card_holder" maxLength="30">

                <label for="card_number">Card number:</label>
                <input type="text" name="card_number" id="card_number" inputmode="numeric">

                <label for="expire_date">Expire date:</label>
                <input type="date" name="expire_date">

                <label for="cvv">CVV:</label>
                <input type="text" name="cvv" inputmode="numeric" maxLength="3">
            </div>
            <input type="hidden" name="price" value="<?php echo $total; ?>" />
            <input type="hidden" name="user_id" value ="<?php $user_id = Session::get(self::LOGGED_IN_USER_ID, null); ?>"/>
            <button type="submit">Save info</button>
        </form>
    </div>
</div>