<?php
        // Register and load the widget
        function yatsyuk_load_widget() {
            register_widget( 'yatsyuk_widget' );
        }
        add_action( 'widgets_init', 'yatsyuk_load_widget' );

        // Creating the widget
        class yatsyuk_widget extends WP_Widget {

            function __construct() {
                parent::__construct(

        // Base ID of your widget
                    'yatsyuk_widget',

        // Widget name will appear in UI
                    __('Список категорій Справ', 'yatsyuk_widget_domain'),

        // Widget description
                    array( 'description' => __( 'Цим віджетом ви можете вивести список ваших категорій справ', 'yatsyuk_widget_domain' ), )
                );
            }

        // Creating widget front-end

            public function widget( $args, $instance ) {
                $title = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
                echo $args['before_widget'];
                if ( ! empty( $title ) )
                    echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
                echo '<ul class="col-12 tax-list minus-padding">';
                $args = array(
                                    'taxonomy'     => 'servicescat',
                                    'orderby'      => 'name',
                                    'show_count'   => 0,
                                    'pad_counts'   => 0,
                                    'title_li'     => ''
                                );
                                wp_list_categories( $args );

               echo ' </ul>
                     </section>';
                echo $args['after_widget'];
            }

        // Widget Backend
            public function form( $instance ) {
                if ( isset( $instance[ 'title' ] ) ) {
                    $title = $instance[ 'title' ];
                }
                else {
                    $title = __( 'Практика', 'yatsyuk_widget_domain' );
                }
        // Widget admin form
                ?>
                <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <?php
            }

        // Updating widget replacing old instances with new
            public function update( $new_instance, $old_instance ) {
                $instance = array();
                $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
                return $instance;
            }
        } // Class wpb_widget ends here