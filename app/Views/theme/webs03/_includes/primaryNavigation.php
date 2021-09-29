<ul class="nav primary-nav">

    <?php foreach($menu_info as $menu_item): ?>

        <?php $has_sub_item = isset($menu_item['sub']) && !empty($menu_item['sub']); ?>

        <li class="nav-item">

            <?php if ($has_sub_item): ?>
                <div class="nav-link-toggler">
            <?php endif; ?>

                <a href="<?php echo $menu_item['mnu_url']; ?>" class="nav-link " target="_self"><?php echo $menu_item['mnu_title']; ?></a>

                    <?php if ($has_sub_item): ?>
                        <button type="button" class="btn btn-icon link-toggler js__item-toggler" data-parent=".nav-item">
                            <span class="icon icon-toggle"></span>
                            <span class="sr-only">하위메뉴보기</span>
                        </button>
                    <?php endif; ?>

            <?php if ($has_sub_item): ?>
                </div>
            <?php endif; ?>

            <?php if ($has_sub_item): ?>
                <ul class="nav-sub nav-sub0">

                    <?php foreach($menu_item['sub'] as $menu_sub_item): ?>
                        <li class="nav-item">
                            <a href="<?php echo $menu_sub_item['mnu_url']; ?>" class="nav-link " target="_self"><?php echo $menu_sub_item['mnu_title']; ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            <?php endif; ?>

        </li>
    <?php endforeach; ?>

</ul>