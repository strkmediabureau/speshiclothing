<?php
/**
 *	Aurum WordPress Theme
 *
 *	Laborator.co
 *	www.laborator.co
 */

#if($_SERVER['SERVER_ADDR'] == '127.0.0.1') return;

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'contact-page',
		'title' => 'Contact Page',
		'fields' => array (
			array (
				'key' => 'field_544f8132bb57a',
				'label' => 'Contact Map',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_544f8140bb57b',
				'label' => 'Show Map',
				'name' => 'show_map',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_544f81b8e3852',
				'label' => 'Map Coordinates',
				'name' => 'map_coordinates',
				'type' => 'repeater',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_544f8140bb57b',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => array (
					array (
						'key' => 'field_544f823a93859',
						'label' => 'Map Point',
						'name' => 'map_point',
						'type' => 'coordinates-field',
						'column_width' => '',
						'center' => array (
							'lat' => 55.39979699999999951387508190236985683441162109375,
							'lng' => 10.3962009999999995812913766712881624698638916015625,
						),
						'zoom' => 12,
					),
					array (
						'key' => 'field_544f8a804451c',
						'label' => 'Zoom Level',
						'name' => 'zoom_level',
						'type' => 'number',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'Scale from 1 to 20',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => 1,
					),
					array (
						'key' => 'field_544f91810987e',
						'label' => 'Pin Image',
						'name' => 'pin_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Map Point',
			),
			array (
				'key' => 'field_544f9588228c0',
				'label' => 'Contact Form',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54500b5102174',
				'label' => 'Form Alignment',
				'name' => 'form_position',
				'type' => 'select',
				'choices' => array (
					'left' => 'Left',
					'right' => 'Right',
				),
				'default_value' => 'left',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_544f96071d19f',
				'label' => 'Title',
				'name' => 'form_title',
				'type' => 'text',
				'default_value' => 'Get in Touch',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544f96311d1a0',
				'label' => 'Sub Title',
				'name' => 'form_sub_title',
				'type' => 'text',
				'default_value' => 'Write us a Letter',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544f9599228c1',
				'label' => 'Required Fields',
				'name' => 'required_fields',
				'type' => 'checkbox',
				'choices' => array (
					'name' => 'Name',
					'subject' => 'Subject',
					'email' => 'E-mail',
					'message' => 'Message',
				),
				'default_value' => 'name
			email
			message',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_544f96f90bfc5',
				'label' => 'Submit Button Text',
				'name' => 'submit_button_text',
				'type' => 'text',
				'default_value' => 'Send Message',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544f9673538c6',
				'label' => 'Success Message',
				'name' => 'success_message',
				'type' => 'textarea',
				'instructions' => 'Thank you for contacting us. We will respond to your request as soon as possible.',
				'default_value' => 'Enter message that will displayed when contact form is submitted successfully.',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_544f96af538c7',
				'label' => 'Email Notifications',
				'name' => 'email_notifications',
				'type' => 'email',
				'instructions' => 'Enter email to send contact requests, default is admin email.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_544f97a17b45b',
				'label' => 'Address',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_544f97af7b45c',
				'label' => 'Title',
				'name' => 'address_title',
				'type' => 'text',
				'default_value' => 'Our Address',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544f97cc7b45d',
				'label' => 'Sub Title',
				'name' => 'address_sub_title',
				'type' => 'text',
				'default_value' => 'Where are we located',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544f989f88636',
				'label' => 'Address Description',
				'name' => 'address_description',
				'type' => 'wysiwyg',
				'default_value' => '2954 Golden Estates,
			Guys Store, Virginia,
			24318-5414,
			United states


			(571) 400-1255
			info@aurumtheme.com

			[lab_social_networks]',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'faq-items',
		'title' => 'FAQ Items',
		'fields' => array (
			array (
				'key' => 'field_545005874cee7',
				'label' => 'Opened Panels',
				'name' => 'opened_panels',
				'type' => 'select',
				'choices' => array (
					'closed' => 'All Closed',
					'opened' => 'All Opened',
					'first' => 'First Open',
				),
				'default_value' => 'first',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_544ffcc81bd5b',
				'label' => 'FAQ Items',
				'name' => 'faq_items',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_544ffce81bd5c',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_544ffcee1bd5d',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add F.A.Q. Item',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'faq.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-options',
		'title' => 'Page Options',
		'fields' => array (
			array (
				'key' => 'field_547dafd2b1182',
				'label' => 'Page Header',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_544fd30acf7d3',
				'label' => 'Show Page Title',
				'name' => 'show_page_title',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_544fd336cf7d4',
				'label' => 'Main Title',
				'name' => 'main_title',
				'type' => 'text',
				'instructions' => 'Enter page title to be displayed below the header (optional)',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_544fd30acf7d3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544fd3becf7d5',
				'label' => 'Small Description',
				'name' => 'small_description',
				'type' => 'text',
				'instructions' => 'Optional description below the title',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_544fd30acf7d3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544ff80720590',
				'label' => 'Show Breadcrumb',
				'name' => 'show_breadcrumb',
				'type' => 'true_false',
				'instructions' => 'This will show current path of the page. To activate this feature you must install <a href="plugin-install.php?tab=search&s=Breadcrumb+NavXT" target="_blank"> <strong>Breadcrumb NavXT</strong></a> plugin.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_544fd30acf7d3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_547db0c34ac9e',
				'label' => 'Transparent Header',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_547db0db57f02',
				'label' => 'Enable Transparent Header',
				'name' => 'enable_transparent_header',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_547daff7878f9',
				'label' => 'Other Options',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_547db008878fa',
				'label' => 'Remove Top Margin',
				'name' => 'remove_top_margin',
				'type' => 'true_false',
				'instructions' => 'Remove the margin between header and content.',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_547db029878fb',
				'label' => 'Remove Bottom Margin',
				'name' => 'remove_bottom_margin',
				'type' => 'true_false',
				'instructions' => 'Remove the margin between footer and content.',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_547e15f931b34',
				'label' => 'Fullwidth Page',
				'name' => 'fullwidth_page',
				'type' => 'true_false',
				'instructions' => 'Checking this field will make the page container fullwidth. Its the same as setting page template to "Fullwidth Page"',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'testimonials',
		'title' => 'Testimonials',
		'fields' => array (
			array (
				'key' => 'field_546e3fb42c8ae',
				'label' => 'Link to Author',
				'name' => 'link_to_author',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_546e3fca2c8af',
				'label' => 'Open in New Window',
				'name' => 'open_in_new_window',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'testimonial',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'welcome-page-options',
		'title' => 'Welcome Page Options',
		'fields' => array (
			array (
				'key' => 'field_547b5c42ade13',
				'label' => 'Sub Title',
				'name' => 'welcome_sub_title',
				'type' => 'text',
				'instructions' => 'Text that will displayed inline with the site logo. (optional)',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_547b5c7c1e6f0',
				'label' => 'Links List Colums',
				'name' => 'colums_count',
				'type' => 'select',
				'choices' => array (
					2 => 'Two',
					3 => 'Three',
					4 => 'Four',
					5 => 'Five',
					6 => 'Six',
				),
				'default_value' => 3,
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_547b580911fb1',
				'label' => 'Links List',
				'name' => 'links_list',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_547b58f4eda57',
						'label' => 'List Title',
						'name' => 'list_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_547b5991941c3',
						'label' => 'Links',
						'name' => 'links',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_547b59a3941c4',
								'label' => 'Link TItle',
								'name' => 'link_title',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_547b59ac941c5',
								'label' => 'Link URL',
								'name' => 'link_url',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_547b636d8ec97',
								'label' => 'Blank Window',
								'name' => 'target_blank',
								'type' => 'true_false',
								'column_width' => '',
								'message' => '',
								'default_value' => 0,
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'row',
						'button_label' => 'Add Link',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Links List',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'welcome-page.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}