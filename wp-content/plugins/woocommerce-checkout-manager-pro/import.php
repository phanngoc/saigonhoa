<?php
// =======================================================
// IMPORT FUNCTION
// =======================================================

			if (isset($_FILES['import']) && check_admin_referer('ie-import')) {
				if ($_FILES['import']['error'] > 0) {
				}
				else {
				
				$encode_options = $_FILES['import']['tmp_name'];

	$row = count($options[buttons]);
if (($handle = fopen( $encode_options , "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
        $num = count($data);
        $row++;

	for ($c=0; $c < $num; $c++) {

	if ( $c == 0 ) { // Required
	$options[buttons][$row][checkbox] = $data[$c];
	}

	if ( $c == 1 ) { // Position
	$options[buttons][$row][position] = $data[$c];
	}

	if ( $c == 2 ) { // Clear
	$options[buttons][$row][clear_row] = $data[$c];
	}

	if ( $c == 3 ) { // Label
	$options[buttons][$row][label] = $data[$c];
	}

	if ( $c == 4 ) { // Placeholder
	$options[buttons][$row][placeholder] = $data[$c];
	}

	if ( $c == 5 ) { // Choose Type
	$options[buttons][$row][type] = $data[$c];
	}

	if ( $c == 6 ) { // Abbreviation
	$options[buttons][$row][cow] = $data[$c];
	}

	if ( $c == 7 ) { // Deny Checkout
	$options[buttons][$row][deny_checkout] = $data[$c];
	}

	if ( $c == 8 ) { // Tax Remove
	$options[buttons][$row][tax_remove] = $data[$c];
	}

	if ( $c == 9 ) { // Deny Receipt
	$options[buttons][$row][deny_receipt] = $data[$c];
	}

	if ( $c == 10 ) { // Add Amount
	$options[buttons][$row][add_amount] = $data[$c];
	}

	if ( $c == 11 ) { // Amount Name
	$options[buttons][$row][fee_name] = $data[$c];
	}

	if ( $c == 12 ) { // Enter Amount
	$options[buttons][$row][add_amount_field] = $data[$c];
	}

	if ( $c == 13 ) { // Conditional Field On
	$options[buttons][$row][conditional_parent_use] = $data[$c];
	}

	if ( $c == 14 ) { // Conditional Parent
	$options[buttons][$row][conditional_parent] = $data[$c];
	}

	if ( $c == 15 ) { // Chosen Value
	$options[buttons][$row][chosen_valt] = $data[$c];
	}

	if ( $c == 16 ) { // Conditional Tie
	$options[buttons][$row][conditional_tie] = $data[$c];
	}

	if ( $c == 17 ) { // Default Color
	$options[buttons][$row][colorpickerd] = $data[$c];
	}

	if ( $c == 18 ) { // Force Title
	$options[buttons][$row][force_title2] = $data[$c];
	}

	if ( $c == 19 ) { // Options
	$options[buttons][$row][option_array] = $data[$c];
	}

	if ( $c == 20 ) { // Checked Value
	$options[buttons][$row][check_1] = $data[$c];
	}

	if ( $c == 21 ) { // Not Checked Value
	$options[buttons][$row][check_2] = $data[$c];
	}

	if ( $c == 22 ) { // Input Name
	$options[buttons][$row][changenamep] = $data[$c];
	}

	if ( $c == 23 ) { // Change Name
	$options[buttons][$row][changename] = $data[$c];
	}

	if ( $c == 24 ) { // Date Format
	$options[buttons][$row][format_date] = $data[$c];
	}

	if ( $c == 25 ) { // Days Before
	$options[buttons][$row][min_before] = $data[$c];
	}

	if ( $c == 26 ) { // Days After
	$options[buttons][$row][max_after] = $data[$c];
	}

	if ( $c == 27 ) { // Days Enabler
	$options[buttons][$row][days_disabler] = $data[$c];
	}

	if ( $c == 28 ) { // Sunday
	$options[buttons][$row][days_disabler0] = $data[$c];
	}

	if ( $c == 29 ) { // Monday
	$options[buttons][$row][days_disabler1] = $data[$c];
	}

	if ( $c == 30 ) { // Tuesday
	$options[buttons][$row][days_disabler2] = $data[$c];
	}

	if ( $c == 31 ) { // Wednesday
	$options[buttons][$row][days_disabler3] = $data[$c];
	}

	if ( $c == 32 ) { // Thursday
	$options[buttons][$row][days_disabler4] = $data[$c];
	}

	if ( $c == 33 ) { // Friday
	$options[buttons][$row][days_disabler5] = $data[$c];
	}

	if ( $c == 34 ) { // Saturday
	$options[buttons][$row][days_disabler6] = $data[$c];
	}

	if ( $c == 35 ) { // Min YY
	$options[buttons][$row][single_yy] = $data[$c];
	}

	if ( $c == 36 ) { // Min MM
	$options[buttons][$row][single_mm] = $data[$c];
	}

	if ( $c == 37 ) { // Min DD
	$options[buttons][$row][single_dd] = $data[$c];
	}

	if ( $c == 38 ) { // Max YY
	$options[buttons][$row][single_max_yy] = $data[$c];
	}

	if ( $c == 39 ) { // Max MM
	$options[buttons][$row][single_max_mm] = $data[$c];
	}

	if ( $c == 40 ) { // Max DD
	$options[buttons][$row][single_max_dd] = $data[$c];
	}

	if ( $c == 41 ) { // More
	$options[buttons][$row][more_content] = $data[$c];
	}

	if ( $c == 42 ) { // Hide Field from Product
	$options[buttons][$row][single_p] = $data[$c];
	}

	if ( $c == 43 ) { // Show Field for Product
	$options[buttons][$row][single_px] = $data[$c];
	}

	if ( $c == 44 ) { // Hide Field from Category
	$options[buttons][$row][single_p_cat] = $data[$c];
	}

	if ( $c == 45 ) { // Show Field for Category
	$options[buttons][$row][single_px_cat] = $data[$c];
	}
	
update_option( 'wccs_settings', $options );


        }

        
    }
    fclose($handle);
}

					
					
				}}
		?>
		
		<form method='post' class='import_form' enctype='multipart/form-data'>
			
				<?php wp_nonce_field('ie-import'); ?>
				<input type="button" class="button-secondary import tap_dat12" value="Import" />

<div id="wp-auth-check-wrap" class="click_showWccm" style="display:none;">
	<div id="wp-auth-check-bg"></div>
	<div id="wp-auth-check" style="max-height: 489px;">
	<div class="wp-auth-check-close" tabindex="0" title="Close"></div>
<div class="updated realStop"><p>Please choose CSV file. <br /><span class="make_smalla">Max Upload Size: <?php echo size_format( wp_max_upload_size() ); ?> <br /> <a href="http://www.trottyzone.com/wp-content/plugins/download-monitor/download.php?id=wooccm_csv_example.csv">Download</a> Example of CSV file.</span></p></div>
<div class="updated jellow">
				<p><input type='file' name='import' class="wccm_importer" /></p>
				<p><input type='submit' class="button-secondary wccm_importer_submit" name='submit' value='<?php _e('Import CSV', 'card-helper'); ?>' /></p>

</div>
	</div>
	</div>
			
		</form>
	

<script type="text/javascript">
jQuery(document).ready(function() {

jQuery('.import.tap_dat12').click(function() {
jQuery('#wp-auth-check-wrap').slideToggle('slow');
});
});
</script>

<?php
// =======================================================
// EXPORT FUNCTION
// =======================================================

$csv = wooccm_generate_csv();

?>

<script type="text/javascript">
jQuery(document).ready(function($) {
jQuery('.export.tap_dat12').click(function() {

var A = [<?php echo $csv; ?>];  // initialize array of rows with header row as 1st item

var csvRows = [];
for(var i=0,l=A.length; i<l; ++i){
    csvRows.push(A[i].join(','));   // unquoted CSV row
}
var csvString = csvRows.join("\n");

var a = document.createElement('a');
a.href     = 'data:attachment/csv,' + encodeURIComponent(csvString);
a.target   = '_blank';
a.download = 'WooCCM.csv';
document.body.appendChild(a);
a.click();

});
});
</script>
<?php
/**
* Converting data to CSV
*/
function wooccm_generate_csv() {

$options = get_option('wccs_settings');

$rowr = $options['buttons']; 
	for ($j=0; $j < count($rowr); $j++) {
	$csv_output .= 


	// Required
	'["'.$rowr[$j][checkbox].'","'.
	

	// Position
	$rowr[$j][position].'","'.
	

	// Clear
	$rowr[$j][clear_row].'","'.
	

	// Label
	$rowr[$j][label].'","'.
	

	// Placeholder
	$rowr[$j][placeholder].'","'.
	

	// Choose Type
	$rowr[$j][type].'","'.
	

	// Abbreviation
	$rowr[$j][cow].'","'.
	

	// Deny Checkout
	$rowr[$j][deny_checkout].'","'.
	

	// Tax Remove
	$rowr[$j][tax_remove].'","'.
	

	// Deny Receipt
	$rowr[$j][deny_receipt].'","'.
	

	// Add Amount
	$rowr[$j][add_amount].'","'.
	

	// Amount Name
	$rowr[$j][fee_name].'","'.
	

	// Enter Amount
	$rowr[$j][add_amount_field].'","'.
	

	// Conditional Field On
	$rowr[$j][conditional_parent_use].'","'.
	

	// Conditional Parent
	$rowr[$j][conditional_parent].'","'.
	

	// Chosen Value
	$rowr[$j][chosen_valt].'","'.
	

	// Conditional Tie
	$rowr[$j][conditional_tie].'","'.
	

	// Default Color
	$rowr[$j][colorpickerd].'","'.
	

	// Force Title
	$rowr[$j][force_title2].'","'.
	

	// Options
	$rowr[$j][option_array].'","'.
	

	// Checked Value
	$rowr[$j][check_1].'","'.
	

	// Not Checked Value
	$rowr[$j][check_2].'","'.
	

	// Input Name
	$rowr[$j][changenamep].'","'.
	

	// Change Name
	$rowr[$j][changename].'","'.
	

	// Date Format
	$rowr[$j][format_date].'","'.
	

	// Days Before
	$rowr[$j][min_before].'","'.
	

	// Days After
	$rowr[$j][max_after].'","'.
	

	// Days Enabler
	$rowr[$j][days_disabler].'","'.
	

	// Sunday
	$rowr[$j][days_disabler0].'","'.
	

	// Monday
	$rowr[$j][days_disabler1].'","'.
	

	// Tuesday
	$rowr[$j][days_disabler2].'","'.
	

	// Wednesday
	$rowr[$j][days_disabler3].'","'.
	

	// Thursday
	$rowr[$j][days_disabler4].'","'.
	

	// Friday
	$rowr[$j][days_disabler5].'","'.
	

	// Saturday
	$rowr[$j][days_disabler6].'","'.
	

	// Min YY
	$rowr[$j][single_yy].'","'.
	

	// Min MM
	$rowr[$j][single_mm].'","'.
	

	// Min DD
	$rowr[$j][single_dd].'","'.
	

	// Max YY
	$rowr[$j][single_max_yy].'","'.
	

	// Max MM
	$rowr[$j][single_max_mm].'","'.
	

	// Max DD
	$rowr[$j][single_max_dd].'","'.
	

	// More
	$rowr[$j][more_content].'","'.
	

	// Hide Field from Product
	$rowr[$j][single_p].'","'.
	

	// Show Field for Product
	$rowr[$j][single_px].'","'.
	

	// Hide Field from Category
	$rowr[$j][single_p_cat].'","'.
	

	// Show Field for Category
	$rowr[$j][single_px_cat].'"],';
	
	}
	
return $csv_output;
}

?>
<form method='post' class='import_form' name='export' >

				<a class="button-secondary export tap_dat12" >Export</a>
			
		</form>