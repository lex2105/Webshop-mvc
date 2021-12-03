<header class="header">
        <div class="header__one">
            <h1 class="logo">Lunar beauty</h1>
            <div class="header__one__search">
                <form action="<?php echo BASE_URL; ?>/search">
                <input type="text" placeholder="Nach Produkten suchen..." name="search" class="search">
                <button type="submit">
                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="25px" height="25px"><path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"/></svg>
                </button>
                </form>
            </div>

            <div class="header__one__right">
                <div class="header__one__link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
                    <a href="<?php echo BASE_URL; ?>/login">
                    <?php
                    /**
                     * Ist ein*e User*in eingeloggt, so zeigen wir den Username an und einen Logout Button. Andernfalls einen
                     * Login Button.
                     */
                    if (\App\Models\User::isLoggedIn()):?>
                            <?php echo \App\Models\User::getLoggedIn()->username; ?>
                            (<a href="<?php echo BASE_URL ?>/logout">Logout</a>)
                    <?php else: ?>
                        <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/login">Login</a>
                    <?php endif; ?>
                
                </a>

                </div>
                
                <div class="header__one__link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4.558 7l4.701-4.702c.199-.198.46-.298.721-.298.613 0 1.02.505 1.02 1.029 0 .25-.092.504-.299.711l-3.26 3.26h-2.883zm12.001 0h2.883l-4.701-4.702c-.199-.198-.46-.298-.721-.298-.613 0-1.02.505-1.02 1.029 0 .25.092.504.299.711l3.26 3.26zm-16.559 2v2h.643c.534 0 1.021.304 1.256.784l4.101 10.216h12l4.102-10.214c.233-.481.722-.786 1.256-.786h.642v-2h-24z"/></svg>
                    <a href="<?php echo BASE_URL; ?>/cart">Cart (<?php echo \App\Services\CartService::getCount(); ?>)</a>
                </div>
            </div>  
        </div>
        
        <hr style="width:100%", size="3", color="#fff">

        <nav>
            <a href="<?php echo BASE_URL; ?>/home">Home</a>
            <a href="<?php echo BASE_URL; ?>/products/face">Face</a>
            <a href="<?php echo BASE_URL; ?>/products/eyes">Eyes</a>
            <a href="<?php echo BASE_URL; ?>/products/lips">Lips</a>
            <a href="<?php echo BASE_URL; ?>/products/christmas">Christmas collection</a>
        </nav>
    </header>