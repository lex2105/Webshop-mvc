<div class="userProfile-background">
    <form class="main__registrierung-form" action="<?php echo BASE_URL . '/products/create/do' ?>" method="post">
        <h1 class="admin-title">Add a new product</h1>
        <div class="main__registrierung-form__input">
            <label for=" name">Name</label>
            <input type="text" id="name" name="name" class="input">
        </div>

        <div class="main__registrierung-form__input">
            <label for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="input"></textarea>
        </div>

        <div class="main__registrierung-form__input">
            <label for="name">Category</label>
            <select name="category" id="category" class="input">
                <option value="face">Face</option>
                <option value="eyes">Eyes</option>
                <option value="lips">Lips</option>
                <option value="christmasCollection">Christmas collection</option>
            </select>
        </div>

        <div class="main__registrierung-form__input">
            <label for="price">Price</label>
            <input type="text" id="name" name="price" class="input">
        </div>

        <div class="main__registrierung-form__input">
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit" class="register-bttn">Upload</button>
    </form>

    <div class="admin-links">
        <a href="<?php echo BASE_URL . '/admin/allUsers' ?>" class="admin-link">All Users</a>
        <a href="<?php echo BASE_URL . '/admin/allOrders' ?>" class="admin-link">All Orders</a>
    </div>
</div>