protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'admire-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Video List', 'admire-widgets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_title',
                        'label' => esc_html__('Title', 'admire-widgets'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'admire-widgets'),
                        'label_block' => true,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],
                    [
                        'name' => 'list_video_image',
                        'label' => esc_html__('Video Image', 'admire-widgets'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]

                ],
                'default' => [
                    [
                        'list_title' => esc_html__('Video #1', 'admire-widgets')
                    ],
                    [
                        'list_title' => esc_html__('Video #2', 'admire-widgets')
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render video card  widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['list']) {
            echo '<dl>';
            foreach ($settings['list'] as $index => $item) {
                $repeater_setting_key = $this->get_repeater_setting_key('list_title', 'list', $index);
                $this->add_inline_editing_attributes($repeater_setting_key);

                // list title 
                echo '<dt class=elementor-repeater-item-' . esc_attr($item["_id"]) . ' ' . $this->print_render_attribute_string($repeater_setting_key) . '">' . $item['list_title'] . '</dt>';

                echo '<img src="' . esc_url($item['list_video_image']['url']) . '" alt="">';
            }
            echo '</dl>';
        }
    }

    protected function content_template()
    {
?>
        <# if ( settings.list.length ) { #>
            <dl>
                <# _.each( settings.list, function( item, index ) { var repeater_setting_key=view.getRepeaterSettingKey( 'list_text' , 'list' , index ); view.addInlineEditingAttributes( repeater_setting_key ); #>

                    <!-- render list title in editor -->
                    <dt class="elementor-repeater-item-{{ item._id }}" {{{ view.getRenderAttributeString( repeater_setting_key ) }}}>{{{ item.list_title }}}</dt>

                    <!-- render image in editor -->
                    <img src="{{ item.list_video_image.url }}" alt="" />

                    <# }); #>

            </dl>
            <# }; #>
        <?php
    }






    /** 
<!-- Converting PHP array into JavaScript array -->
        <script>
            var arr = <?php echo json_encode($myArr); ?>;
            console.log(arr)
        </script>
 */