<div class="main__checkout-wrapper">
    <h1 class="main__checkout__title">Checkout</h1>
    <div class="main__checkout__field">
        <?php $total=0; ?>
        <table class="cart-table">
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

    <div class="main__checkout__field">
        <form action="<?php echo BASE_URL; ?>/validateOrder" method="post" >
            <div class="checkout-form">
                <div class="main__checkout__field__part">
                    <h2 class="checkout__field__part__title">Delivery info</h2>
                    <div class="main__checkout__input">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="number">Number:</label>
                        <input type="text" name="number" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="postal_code">Postal code:</label>
                        <input type="text" name="postal_code" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="city">City:</label>
                        <input type="text" name="city" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="state">State:</label>
                        <input type="text" name="state" class="input">
                    </div>
                </div>

                <div class="main__checkout__field__part">
                    <h2 class="checkout__field__part__title">Payment info</h2>

                    <div class="main__checkout__input">
                        <label for="card_type">Card type:</label>
                        <select name="card_type" id="card_type" class="input">
                            <option value="_default" selected disabled>Please choose</option>
                            <option value="visa">Visa</option>
                            <option value="diners">Diners</option>
                            <option value="mastercard">Mastercard</option>
                        </select>
                    </div>

                    <div class="main__checkout__input">
                        <label for="card_holder">Card holder:</label>
                        <input type="text" name="card_holder" maxLength="30" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="card_number">Card number:</label>
                        <input type="text" name="card_number" id="card_number" inputmode="numeric" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="expire_date">Expire date:</label>
                        <input type="date" name="expire_date" class="input">
                    </div>

                    <div class="main__checkout__input">
                        <label for="cvv">CVV:</label>
                        <input type="text" name="cvv" inputmode="numeric" maxLength="3" class="input">
                    </div>
                </div>
                <input type="hidden" name="price" value="<?php echo $total; ?>" />
                <input type="hidden" name="user_id" value ="<?php $user_id = Session::get(self::LOGGED_IN_USER_ID, null); ?>"/>
                
            </div>
            <button type="submit" class="main__checkout__finish-bttn">Finish order</button>
        </form>
    </div>
</div>