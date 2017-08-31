<?php
//Настройки панели администрирования
//Регистрация функции настроек
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}
// Добавление настроек в меню страницы
function add_settings_page() {
    add_menu_page( __( 'Контактні дані у підвалі сайту' ), __( 'Контактні дані у підвалі сайту' ), 'manage_options', 'settings', 'theme_settings_page');
}
//Добавление действий
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );
//Сохранение настроек
function theme_settings_page() {
    global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
    ?>
    <div>
        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
            <div id="message" class="updated">
                <p><strong>Налаштування збережені</strong></p>
            </div>
        <?php endif; ?>
        <form method="post" action="options.php">
            <fieldset>

                <legend>Контактні дані у підвалі сайту</legend>
                <?php settings_fields( 'theme_settings' ); ?>
                <?php $options = get_option( 'theme_settings' ); ?>
                <ul>
                    <li>
                        <input id="theme_settings[street_address]" type="text" size="60" name="theme_settings[street_address]" value="<?php esc_attr_e( $options['street_address'] ); ?>" />
                        <label> - Вкажіть вулицю, будинок та апартаменти </label>
                    </li>
                    <li>
                        <input id="theme_settings[city_address]" type="text" size="60" name="theme_settings[city_address]" value="<?php esc_attr_e( $options['city_address'] ); ?>" />
                        <label> - Вкажіть місто </label>
                    </li>
                    <li>
                        <input id="theme_settings[post_address]" type="text" size="60" name="theme_settings[post_address]" value="<?php esc_attr_e( $options['post_address'] ); ?>" />
                        <label> - Вкажіть поштовий індекс </label>
                    </li>
                    <li>
                        <input id="theme_settings[phone_kiiv]" type="text" size="40" name="theme_settings[phone_kiiv]" value="<?php esc_attr_e( $options['phone_kiiv'] ); ?>" />
                        <label> - Вкажіть ваш телефон (Київстар) </label>
                    </li>
                    <li>
                        <input id="theme_settings[phone_life]" type="text" size="40" name="theme_settings[phone_life]" value="<?php esc_attr_e( $options['phone_life'] ); ?>" />
                        <label> - Вкажіть ваш телефон (Лайф) </label>
                    </li>
                    <li>
                        <input id="theme_settings[phone_voda]" type="text" size="40" name="theme_settings[phone_voda]" value="<?php esc_attr_e( $options['phone_voda'] ); ?>" />
                        <label> - Вкажіть ваш телефон (Водафон) </label>
                    </li>
                    <li>
                        <input id="theme_settings[phone_office]" type="text" size="40" name="theme_settings[phone_office]" value="<?php esc_attr_e( $options['phone_office'] ); ?>" />
                        <label> - Вкажіть ваш телефон (Офіс) </label>
                    </li>
                    <li>
                        <input id="theme_settings[contact_mail]" type="text" size="40" name="theme_settings[contact_mail]" value="<?php esc_attr_e( $options['contact_mail'] ); ?>" />
                        <label> - Вкажіть вашу електронну пошту</label>
                    </li>
                </ul>

            </fieldset>
            <fieldset>

                <legend>Інформація у підвалі сайту</legend>
                <p><input id="theme_settings[footer]" type="text" size="40" name="theme_settings[footer]" value="<?php esc_attr_e( $options['footer'] ); ?>" />
                    <label> - Можете ввести ваш текст, посилання та права на копірайт. Використовувати теги html дозволено</label>
                </p>
                <p><input name="submit" id="submit" class="button button-primary" value="Зберегти" type="submit"></p>

            </fieldset>
        </form>
    </div>


    <style>
        legend{
            font-size: 1.2rem;
            font-weight: 600;
            margin: 10px 0;
        }

    </style>
<?php } ?>