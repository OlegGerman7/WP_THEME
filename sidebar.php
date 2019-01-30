<?php
/**
 * The sidebar containing the main widget area
 */

if( !is_date() ){
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        return;
    } ?>
    <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>
<?php } else { ?>
    <?php if ( ! is_active_sidebar( 'sidebar-4' ) ) {
        return;
    } ?>
    <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Data Sidebar', 'twentyseventeen' ); ?>">
        <?php dynamic_sidebar( 'sidebar-4' ); ?>
    </aside>
<?php } ?>