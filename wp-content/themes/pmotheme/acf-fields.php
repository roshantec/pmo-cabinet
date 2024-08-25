<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_pmo_history',
    'title' => 'PMO History',
    'fields' => array(
        array(
            'key' => 'field_establishment_title',
            'label' => 'Establishment Title',
            'name' => 'establishment_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_establishment_content',
            'label' => 'Establishment Content',
            'name' => 'establishment_content',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_establishment_link',
            'label' => 'Establishment Link',
            'name' => 'establishment_link',
            'type' => 'url',
        ),
        array(
            'key' => 'field_past_pms_title',
            'label' => 'Past PMs Title',
            'name' => 'past_pms_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_past_prime_ministers',
            'label' => 'Past Prime Ministers',
            'name' => 'past_prime_ministers',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_pm_image',
                    'label' => 'PM Image',
                    'name' => 'pm_image',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_pm_name',
                    'label' => 'PM Name',
                    'name' => 'pm_name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_pm_term',
                    'label' => 'PM Term',
                    'name' => 'pm_term',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_pm_description',
                    'label' => 'PM Description',
                    'name' => 'pm_description',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-pmo-history.php',
            ),
        ),
    ),
));

endif;