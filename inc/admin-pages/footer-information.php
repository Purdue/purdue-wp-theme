<?php settings_errors();?>
<form method="post" action="options.php" class="purdueBrand-general-form">
    <?php settings_fields('footer-information-groups');?>
    <?php do_settings_sections('footer_information');?>
    <?php submit_button('Save Changes', 'primary','btnSubmit');?>
</form>