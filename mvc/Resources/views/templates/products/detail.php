<div class="main__product">
    <div class="main__product__img">
        <img src="<?php echo IMAGES_URL . $product->image; ?>" alt="<?php echo $product->name; ?>" class="img-border img-size">
    </div>
    <div class="main__product__info">
        <h1 class="product-name"><?php echo $product->name; ?></h1>
        <p class="price"><?php echo $product->price; ?> €</p>
        <p class="description"><?php echo $product->description; ?></p>
        <a href="<?php echo BASE_URL . "/products/$product->id/add-to-cart"; ?>" class="cart-bttn-wide">Add to cart</a>
    </div>
</div>