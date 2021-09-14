<div class="wrap">
    <h1>HBB Plugin</h1>
    <?php settings_errors(); ?>
    
    <form method ="post" action="option.php">
        <?php 
            settings_fields('hbb_options-group' );
            do_settings_sections('hbb_plugin');
            submit_button();
            ?>
    </form>
</div>
