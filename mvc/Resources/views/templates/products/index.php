<main class="main__products-overview">
        <h1><?php echo $category; ?></h1>
        <div class="main__cards">
            <table>
                <tr>
            <?php $counter=0 ?>
            <?php foreach ($products as $product): ?>
                <?php $counter++ ?>
                <td>
            <div class="card">
                <img src="<?php echo IMAGES_URL . $product->image; ?>" alt="<?php echo $product->name; ?>" width="250px" height="250px" class="img-border"> 
                <div class="card_name">
                    <p><?php echo $product->name; ?></p>
                    <p><?php echo $product->price; ?> €</p>
                </div>
                <a href="<?php
                    echo BASE_URL . "/products/$product->id/add-to-cart"; ?>" class="basket-bttn blue">In den Warenkorb</a>
            </div>
            </td>
            <?php if($counter % 6 == 0) echo "</tr><tr>" ?>  
            <?php endforeach; ?>
            </tr>
            </table>
    </main>