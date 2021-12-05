<main class="main__products-overview">
    <h1><?php echo $category; ?></h1>
    <div class="main__cards">
        <?php foreach ($products as $product): ?>
        <div class="card">
            <a href="<?php echo BASE_URL; ?>/products/<?php echo $product->id; ?>/showProduct">
                <img src="<?php echo IMAGES_URL . $product->image; ?>" alt="<?php echo $product->name; ?>" width="250px" height="250px" class="img-border img-window">
            </a> 
            <div class="card_name">
                <a class="link" href="<?php echo BASE_URL; ?>/products/<?php echo $product->id; ?>/showProduct">
                    <p><?php echo $product->name; ?></p>
                </a>
                <p><?php echo $product->price; ?> €</p>
            </div>
            <a href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>" class="basket-bttn blue">Add to cart</a>
        </div>
        <?php endforeach; ?>
    </div>  
</main>