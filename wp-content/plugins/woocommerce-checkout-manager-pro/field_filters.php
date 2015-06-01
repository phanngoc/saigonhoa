<?php
// MULTISELECT
add_filter('woocommerce_form_field_multiselect', 'wooccm_multiselect_handler', 10, 4);
function wooccm_multiselect_handler( $field = '', $key, $args, $value ) {

if ( ( ! empty( $args['clear'] ) ) ) $after = '<div class="clear"></div>'; else $after = '';

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
		} else {
			$required = '';
		}

		$args['maxlength'] = ( $args['maxlength'] ) ? 'maxlength="' . absint( $args['maxlength'] ) . '"' : '';

		$options = '';

		if ( ! empty( $args['options'] ) )
			foreach (explode('||',$args['options']) as $option_key => $option_text )
				$options .= '<option value="'.esc_attr( $option_text ).'" '. selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) .'</option>';

			$field = '<p class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) .'" id="' . esc_attr( $key ) . '_field">';

			if ( $args['label'] )
				$field .= '<label for="' . esc_attr( $key ) . '" class="' . implode( ' ', $args['label_class'] ) .'">' . $args['label']. $required . '</label>';

			$field .= '<select data-placeholder="' . __( 'Select some options', 'wc_checkout_fields' ) . '" multiple="multiple" name="' . esc_attr( $key ) . '[]" id="' . esc_attr( $key ) . '" class="checkout_chosen_select select">
					' . $options . '
				</select>
			</p>' . $after;

		return $field;
}


// MULTCHECKBOX
add_filter('woocommerce_form_field_multicheckbox', 'wooccm_multicheckbox_handler', 10, 4);
function wooccm_multicheckbox_handler( $field = '', $key, $args, $value ) {

if ( ( ! empty( $args['clear'] ) ) ) $after = '<div class="clear"></div>'; else $after = '';

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
		} else {
			$required = '';
		}

		$args['maxlength'] = ( $args['maxlength'] ) ? 'maxlength="' . absint( $args['maxlength'] ) . '"' : '';

		$options = '';

		if ( ! empty( $args['options'] ) )
			foreach (explode('||',$args['options']) as $option_key => $option_text )
				$options .= '' . esc_attr( $option_text ) .' <input type="checkbox" name="' . esc_attr( $key ) . '[]" value="'.esc_attr( $option_text ).'" '. selected( $value, $option_key, false ) . ' /><br />';

			$field = '<p class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) .'" id="' . esc_attr( $key ) . '_field">';

			if ( $args['label'] )
				$field .= '<label for="' . esc_attr( $key ) . '" class="' . implode( ' ', $args['label_class'] ) .'">' . $args['label']. $required . '</label>';

			$field .= '' . $options . '
			</p>' . $after;

		return $field;
}

// RADIO BUTTONS
add_filter('woocommerce_form_field_radio', 'wooccm_radio_handler', 10, 4);
function wooccm_radio_handler( $field = '', $key, $args, $value ) {

		if ( ( ! empty( $args['clear'] ) ) ) $after = '<div class="clear"></div>'; else $after = '';

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
		} else {
			$required = '';
		}

		$args['maxlength'] = ( $args['maxlength'] ) ? 'maxlength="' . absint( $args['maxlength'] ) . '"' : '';

		$field = '<div class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) .'" id="' . esc_attr( $key ) . '_field">';

		$field .= '<fieldset><legend>' . $args['label'] . $required . '</legend>';

		if ( ! empty( $args['options'] ) )

			foreach ( explode('||',$args['options']) as $option_key => $option_text )
				$field .= '<label><input type="radio" ' . checked( $value, esc_attr( $option_text ), false ) . ' name="' . esc_attr( $key ) . '" value="' . esc_attr( $option_text ) . '" /> ' . esc_html( $option_text ) . '</label>';

		$field .= '</fieldset></div>' . $after;

		return $field;

}



// SELEECT OPTIONS
add_filter('woocommerce_form_field_select_wccm', 'wooccm_select_handler', 10, 4);
function wooccm_select_handler( $field = '', $key, $args, $value ) {

if ( ( ! empty( $args['clear'] ) ) ) $after = '<div class="clear"></div>'; else $after = '';

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
		} else {
			$required = '';
		}

		$args['maxlength'] = ( $args['maxlength'] ) ? 'maxlength="' . absint( $args['maxlength'] ) . '"' : '';

		$options = '';

		if ( ! empty( $args['options'] ) )
			$options .= ($args['default']) ?'<option value="">' . $args['default'] .'</option>': '';
			foreach (explode('||',$args['options']) as $option_key => $option_text )
				$options .= '<option '. selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) .'</option>';

			$field = '<p class="form-row ' . esc_attr( implode( ' ', $args['class'] ) ) .'" id="' . esc_attr( $key ) . '_field">';

			if ( $args['label'] )
				$field .= '<label for="' . esc_attr( $key ) . '" class="' . implode( ' ', $args['label_class'] ) .'">' . $args['label']. $required . '</label>';

			$field .= '<select data-placeholder="' . __( ''.$args['default'].'', 'wc_checkout_fields' ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" class="country_select">
					' . $options . '
				</select>
			</p>' . $after;

		return $field;

}

// CHECKBOX
add_filter('woocommerce_form_field_checkbox_wccm', 'wooccm_checkbox_handler', 10, 4);
function wooccm_checkbox_handler( $field = '', $key, $args, $value ) {

		if ( ( ! empty( $args['clear'] ) ) ) $after = '<div class="clear"></div>'; else $after = '';

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
		} else {
			$required = '';
		}

$field = '<p class="form-row ' . implode( ' ', $args['class'] ) .'" id="' . $key . '_field">
					<input type="checkbox" class="input-checkbox" name="' . $key . '" id="' . $key . '_checkbox" value="'.$args['options'][0].'" />

					<input type="hidden" id="' . $key . '_checkboxhiddenfield" name="' . $key . '" value="'.$args['options'][1].'" />

					<label for="' . $key . '" class="checkbox ' . implode( ' ', $args['label_class'] ) .'">' . $args['label'] . $required . '</label>
				</p>' . $after;

				return $field;

}


// COLORPICKER
add_filter('woocommerce_form_field_colorpicker', 'wooccm_colorpicker_handler', 10, 4);
function wooccm_colorpicker_handler( $field = '', $key, $args, $value ) {


		if ( ( ! empty( $args['clear'] ) ) ) $after = '<div class="clear"></div>'; else $after = '';

		if ( $args['required'] ) {
			$args['class'][] = 'validate-required';
			$required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce'  ) . '">*</abbr>';
		} else {
			$required = '';
		}


if ( empty($value) ) {
$value = $args['default_color'];
}

			$field = '<p class="form-row ' . implode( ' ', $args['class'] ) .'" id="' . $key . '_field">
					<label for="' . $key . '" class="' . implode( ' ', $args['label_class'] ) .'">' . $args['label'] . $required . '</label>
					<input type="text" class="input-text" maxlength="7" size="6" name="' . $key . '" id="' . $key . '_colorpicker" placeholder="' . $args['placeholder'] . '" value="'. $value.'" />
				</p>' . $after;

			return $field;
}