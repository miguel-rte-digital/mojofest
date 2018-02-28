<?php

class EF_Link_Field extends EF_Field_Base {
	
	public $type = 'link';
	
	public function display() {
		$defaults = array(
			'section_prefix' => 'section_prefix_',
			'class' => 'ef-section ef-text',
			'style' => '',
			'id_prefix' => 'id_prefix'
		);
		
		$args = wp_parse_args( $this->args, $defaults );
		extract( $args );

		?>
		<section id="<?php echo $section_prefix . $this->id ?>" class="<?php echo $class ?>" <?php echo $style; ?>>
			<a href="<?php echo $link;?>"><?php echo $this->name ?></a>
		</section>
		<?php
	}	
}