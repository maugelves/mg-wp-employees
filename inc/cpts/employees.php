<?php

namespace MGEmployees\cpts;

/**
 * Class Employees
 *
 * @author  Mauricio Gelves <mg@maugelves.com>
 * @since   1.0.1
 */
class Employees
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_employee' ), 10 );
		add_action( 'init', array( $this, 'create_departamento_taxonomy' ), 11 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );


		// Custom columns filters
		add_filter('manage_employee_posts_columns', array( $this, 'create_archive_columns' ) );
		add_action('manage_employee_posts_custom_column', array( $this, 'populate_archive_columns' ), 10, 2);

	}


	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		if  ( 'employee' == $screen->post_type )
			$title = __('Introduce el nombre completo', 'mgemployees' );


		return $title;
	}



	/**
	 * This function creates the CPT Employee
	 */
	public function create_cpt_employee() {

		$args = array(
			'label'                 => __( 'Empleados', 'mgemployees' ),
			'labels'                => array (

				// Labels values
				'name'                  => __( 'Empleados', 'mgemployees' ),
				'singular'              => __( 'Empleado', 'mgemployees' ),
				'add_new'               => __( 'Agregar un empleado', 'mgemployees' ),
				'add_new_item'          => __( 'Agregar un empleado', 'mgemployees' ),
				'edit_item'             => __( 'Editar empleado', 'mgemployees' ),
				'new_item'              => __( 'Nuevo empleado', 'mgemployees' ),
				'view_item'             => __( 'Ver empleado', 'mgemployees' ),
				'view_items'            => __( 'Ver empleados', 'mgemployees' ),
				'search_items'          => __( 'Buscar empleados', 'mgemployees' ),
				'not_found'             => __( 'No se encontraron empleados', 'mgemployees' ),
				'not_found_in_trash'    => __( 'No hay registros eliminados', 'mgemployees' ),
				'all_items'             => __( 'Todos los empleados', 'mgemployees' ),
				'archives'              => __( 'Empleados', 'mgemployees' ),
				'featured_image'        => __( 'Foto', 'mgemployees' ),
				'set_featured_image'    => __( 'Establecer la foto', 'mgemployees' ),
				'remove_featured_image' => __( 'Quitar la foto', 'mgemployees' ),
				'use_featured_image'    => __( 'Usar esta foto como principal', 'mgemployees' )
			),
			'public'                => true,
			'exclude_from_search'   => true,
			'show_ui'               => true,
			'menu_position'         => 19,
			'menu_icon'             => 'dashicons-universal-access',
			'supports'              => array( 'title', 'thumbnail' ),
			'has_archive'           => true
		);


		register_post_type( 'employee', $args );

	}


	/**
	 * Create Departamento taxonomy for employees
	 */
	public function create_departamento_taxonomy(){

		$args = array(
			'label'     => __('Departamentos','mgemployees'),
			'labels'    => array(
				'name'          => __('Departamentos','mgemployees'),
				'singular_name' => __('Departamento','mgemployees'),
				'all_items'     => __('Todos los departamentos','mgemployees'),
				'edit_item'     => __('Editar el departamento','mgemployees'),
				'view_item'     => __('Ver el departamento','mgemployees'),
				'update_item'   => __('Actualizar el departamento','mgemployees'),
				'add_new_item'  => __('Agregar un nuevo departamento','mgemployees'),
				'search_items'  => __('Buscar departamentos','mgemployees')
			),
			'hierarchical' => true

		);
		register_taxonomy('departamento', 'employee', $args );

	}


	/**
	 * Creates, remove or modify the columns array for the Admin Archive
	 *
	 * @param $defaults
	 *
	 * @return mixed
	 */
	public function create_archive_columns( $defaults ) {
		unset( $defaults['date'] );
		$defaults['featured'] = '';
		$defaults['title'] = __('Nombre', 'mgemployees');
		$defaults['date'] = 'Fecha';
		return $defaults;
	}


	/**
	 * Fill the columns for the Admin Archive
	 *
	 * @param $column_name
	 * @param $post_ID
	 */
	public function populate_archive_columns( $column_name, $post_ID ){

		switch ( $column_name ):
			case 'featured':
				$args = array(100, 'auto');
				the_post_thumbnail( $args );
				break;
		endswitch;

	}



	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['employee'] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( 'Empleado actualizado.', 'mgemployees' ),
			4 => __( 'Empleado actualizado.', 'mgemployees' ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( 'Empleado recuperado de la revisión %s.', 'mgemployees' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Empleado publicado.', 'mgemployees' ),
			7 => __( 'Empleado guardado.', 'mgemployees' ),
			9 => __('Empleado programador', 'mgemployees' ),
			10 => __( 'Borrador de empleado actualizado.', 'mgemployees' ),
		);

		return $messages;
	}

}
$employees = new Employees();