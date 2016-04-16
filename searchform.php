<form role="search" method="get" class="search-form col col-xs-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Ny søgning?', 'placeholder' ) ?>"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <span class="search-submit-wrap">
        <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
    </span>
</form>