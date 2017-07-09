<?php
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_5962718f4c996',
		'title' => 'Employees',
		'fields' => array (
			array (
				'key' => 'field_59627194afd0e',
				'label' => 'Descripción',
				'name' => 'mgemp_description',
				'type' => 'textarea',
				'instructions' => 'Indique la descripción del empleado',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'new_lines' => '',
			),
			array (
				'key' => 'field_596271c4afd0f',
				'label' => 'Enlace a LinkedIn',
				'name' => 'mgemp_linkedin',
				'type' => 'url',
				'instructions' => 'Indique el perfil de LinkedIn del empleado',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'employee',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array (
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'custom_fields',
			4 => 'discussion',
			5 => 'comments',
			6 => 'revisions',
			7 => 'slug',
			8 => 'author',
			9 => 'format',
			10 => 'page_attributes',
			11 => 'tags',
			12 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));

endif;