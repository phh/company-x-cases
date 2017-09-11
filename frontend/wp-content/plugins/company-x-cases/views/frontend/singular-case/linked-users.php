<div class="linked-users">
    <?php foreach ( $linked_users as $user ) : ?>

    <div class="linked-user">
        <a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>">
            <?php echo esc_html( $user->display_name ); ?>
        </a>

        <?php echo get_avatar( $user->ID ); ?>

        <?php do_action( 'company_x_cases_after_linked_user', $user->ID ); ?>
    </div>

    <?php endforeach; ?>
</div>
