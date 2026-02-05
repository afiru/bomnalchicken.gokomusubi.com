<?php
$terms = get_terms([
    'taxonomy'   => 'menu_category',
    'hide_empty' => false,
]);
?>
<nav class="menuAllListNavs">
    <ul class="d_flex j_start ali_center nowap ulMenuAllListNavs">
        <?php foreach ($terms as $term): ?>
            <li class="liMenuAllListNavs">
                <a class="undernone bg_EF1A79 cl_fff fw_700 btnMenuAllListNavs" href="#limenuAllListBx<?php echo esc_attr($term->term_id); ?>">
                    <?php echo esc_html($term->name); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>