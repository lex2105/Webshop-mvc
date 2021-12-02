<main class="main__products-overview">
        <h1><?php echo $category; ?></h1>
        <div class="main__cards">
            <?php foreach ($products as $product): ?>
            <div class="card">
                <img src="images/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" width="250px" height="250px" class="img-border">
                <div class="card_name">
                    <p><?php echo $product->name; ?></p>
                    <p><?php echo $product->description; ?></p>
                    <p><?php echo $product->price; ?> €</p>
                </div>
                <button class="basket-bttn blue">In den Warenkorb</button>
            </div>
            <?php endforeach; ?>

        <!--div class="main__cards top">
            <div class="card">
                <img src="images/puder.jpg" alt="puder" width="250px" height="250px" class="img-border">
                <div class="card_name">
                    <p>Produkt</p>
                    <p><?php echo $product->price; ?></p>
                </div>
                <button class="basket-bttn blue">In den Warenkorb</button>
            </div>

            <div class="card">
                <img src="images/puder.jpg" alt="puder" width="250px" height="250px" class="img-border">
                <div class="card_name">
                    <p>Produkt</p>
                    <p><?php echo $product->price; ?></p>
                </div>
                <button class="basket-bttn blue">In den Warenkorb</button>
            </div>

            <div class="card">
                <img src="images/puder.jpg" alt="Puder" width="250px" height="250px" class="img-border">
                <div class="card_name">
                    <p>Produkt</p>
                    <p><?php echo $product->price; ?></p>
                </div>
                <button class="basket-bttn blue">In den Warenkorb</button>
            </div>

            <div class="card">
                <img src="images/puder.jpg" alt="puder" width="250px" height="250px" class="img-border">
                <div class="card_name">
                    <p>Produkt</p>
                    <p><?php echo $product->price; ?></p>
                </div>
                <button class="basket-bttn blue">In den Warenkorb</button>
            </div>
        </div-->
    </main>