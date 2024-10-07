<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_textarea'))
{
 	/**
	 * Returns a properly templated text input field.
	 *
	 * @param string $data    Either a string with the element name, or an array of key/value pairs of all attributes.
	 * @param string $value   Either a string with the value, or blank if an array is passed to the $data param.
	 * @param string $label   A string with the label of the element.
	 * @param string $extra   A string with any additional items to include, like Javascript.
	 * @param string $tooltip A string for inline help or a tooltip icon
	 *
	 * @return string A string with the formatted input element, label tag and wrapping divs.
	 */
    function textarea( $data='', $value='', $label='', $extra='', $tooltip = '',$class='')
	{
		//$defaults = array( 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
        $defaults = array( 'name' => $data, 'value' => $value);
		// If name is empty at this point, try to grab it from the $data array
		$error = '';

		if (function_exists('form_error'))
		{
			if (form_error($defaults['name']))
			{
				$error   = ' error';
				$tooltip = '<span class="help-inline">' . form_error($defaults['name']) . '</span>' . PHP_EOL;
			}
		}

	//	$output = _parse_form_attributes($data, $defaults);

	//	$output = <<<EOL
?>
<div class="control-group {$error}">
	<label class="control-label" for="<?php echo $defaults['name']; ?>"><?php echo $label; ?></label>
	<div class="controls">
		 <textarea   name='<?php echo $defaults['name']; ?>' class="<?php echo $class;?>" <?php echo $extra;?> ><?php echo $defaults['value']; ?></textarea>
        <?php 
            echo $tooltip;
           // echo "sdf";
        ?>
	</div>
</div>
<?php
//EOL;

//		return $output;

	}//end _form_common()
}
///////////////////////////////////////////////////


function ways_country_select($select_name,  $selected_iso, $label, $extra='', $tooltip = '')
{ 
	// First, grab the states from the config
		$countries= config_item('address.countries');
		$keys=array_keys($countries);
		//print_r($keys);
		$options=array();
		foreach($keys as $key)
		{
			$options[$key]=$countries[$key]['name'];
		}
		//print_r($options);
		return form_dropdown($select_name, $options, $selected_iso, $label, $extra, $tooltip );
		//print_r($countries);
		
		

	
}

function check_box( $data='', $checked='', $label='', $extra='', $tooltip = '')
{

    $defaults = array( 'name' => $data, 'value' => $value);
	// If name is empty at this point, try to grab it from the $data array
	$error = '';

	if (function_exists('form_error'))
	{
		if (form_error($defaults['name']))
		{
			$error   = ' error';
			$tooltip = '<span class="help-inline">' . form_error($defaults['name']) . '</span>' . PHP_EOL;
		}
	}

//	$output = _parse_form_attributes($data, $defaults);

//	$output = <<<EOL
?>
<div class="control-group {$error}">
	<label class="control-label" for="<?php echo $defaults['name']; ?>"><?php echo $label; ?></label>
	<div class="controls">
        <?php
        if($checked)
        {
        ?>
        <input  type="checkbox"    checked="checked" name='<?php echo $defaults['name']; ?>'  <?php echo $extra;?> />
		
        <?php 
        }
        else
        {
            ?>
        <input  type="checkbox" name='<?php echo $defaults['name']; ?>' <?php echo $extra;?> />
		
        <?php
        }
            echo $tooltip;
          
        ?>
	</div>
</div>
<?php

	
}
function tree_check_box( $data='', $checked='', $label='', $extra='', $tooltip = '')
{

    $defaults = array( 'name' => $data, 'value' => $value);
	// If name is empty at this point, try to grab it from the $data array
	$error = '';

	    if($checked)
        {
        ?>
        <input  type="checkbox"    checked="checked" name='<?php echo $defaults['name']; ?>'  <?php echo $extra;?> />
		
        <?php 
        }
        else
        {
            ?>
        <input  type="checkbox" name='<?php echo $defaults['name']; ?>' <?php echo $extra;?> />
		
        <?php
        }
            echo $tooltip;
            echo $label;
        ?>
	
<?php

	
}
function __form_label($label)
{
    ?>
    <div class="control-group">
    	<label class="control-label" ><?php echo $label ?></label>
    	
    </div>
    <?php
}

?>