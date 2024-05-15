<?php
class Elementor_Clientify_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'clientify_form'; // Consider changing this to something more specific if needed
    }

    public function get_title() {
        return 'Form Clientify';
    }

    public function get_icon() {
        return 'eicon-form-horizontal'; // Consider updating the icon to match the new branding
    }

    public function get_categories() {
        return ['clientify-forms']; // Updated to the new category
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'form-clientify'), // Update the text domain if needed
            ]
        );

        $this->add_control(
            'form_id',
            [
                'label' => __('Form ID', 'form-clientify'), // Update the text domain if needed
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => '12345',
            ]
        );

        $this->end_controls_section();
    }


protected function render() {
    $settings = $this->get_settings_for_display();
    $form_id = esc_attr($settings['form_id']);

    echo '<div id="clientify_form_' . $form_id . '"></div>';
    echo '<script type="text/javascript">
        var script = document.createElement("script");
        script.src = "https://api.clientify.net/web-marketing/superforms/script/' . $form_id . '.js";
        document.body.appendChild(script);
    </script>';
}

    protected function _content_template() {
        ?>
        <div id="_form_embedformselectorc{{{ settings.form_id }}}"></div>
        <?php
    }
}
