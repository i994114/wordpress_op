<script src="pan.js"></script>
        <header>
            <div class="header-left">
                <a class="header-logo" href="<?php echo home_url(); ?>">
                    <img src="<?php header_image(); ?>" alt="<?php bloginfo('name');?>">
                </a>
            </div>

            <?php wp_nav_menu(array(
                'theme_location' => 'mainmenu',
                'menu_class' => 'gloval_navi_ul',   //グローバルメニューのul
                'items_trap' => '<ul>%3$s</ul>'
            )); ?>
        </header>