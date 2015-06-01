/********************************************************************
<!--
jQuery(document).ready(function() {

jQuery(function () {
    jQuery(".show_hide").click(function() {
        
jQuery('.widefat th div span',this).toggleClass('current_opener');

  jQuery(this).next().toggle();
      if( jQuery('.slidingDiv').length > 1) {
            jQuery('.slidingDiv table:vissible').hide();

            jQuery(this).next().show();
       }
    }); 
}); 
});

-->
***********************************************************/

jQuery(document).ready(function() {

jQuery(function () {
    jQuery(".show_hide2").click(function() {

jQuery('.widefat th div span',this).toggleClass('current_opener');

  jQuery(this).next().toggle();
      if( jQuery('.slidingDiv2').length > 1) {
            jQuery('.slidingDiv2 :vissible').hide();

            jQuery(this).next().show();
       }
    }); 
}); 
});



jQuery(document).ready(function(){

    jQuery(".hide_stuff_change_tog").click(function(){
  jQuery(".hide_stuff_change_tog span").toggleClass('current_opener');
     jQuery(".hide_stuff_change").slideToggle(0);
     
  });
});


<!-- clear -->

jQuery(document).ready(function(){

    jQuery("a.nav-tab.general-tab").click(function(){
	jQuery("a.nav-tab.billing-tab,a.nav-tab.shipping-tab,a.nav-tab.additional-tab").removeClass('nav-tab-active');
	jQuery(".address_fields_class,.checkout_notice_class,.custom_css_class,.switches_class").removeClass('current');  
	jQuery(this).addClass('nav-tab-active');
	jQuery(".upload_class").addClass('current');
	jQuery("#content-nav-right").addClass('general-vibe');
	jQuery(".billing-semi,.shipping-semi,.additional-semi,.colorpicker-semi").hide();
     jQuery("#main-nav-left,.upload_files").show();
     
  });

 jQuery("a.nav-tab.billing-tab").click(function(){
	jQuery("a.nav-tab.general-tab,a.nav-tab.shipping-tab,a.nav-tab.additional-tab").removeClass('nav-tab-active');
	jQuery(this).addClass('nav-tab-active');
	jQuery("#content-nav-right").removeClass('general-vibe');
     jQuery(".general-semi,.shipping-semi,.additional-semi,#main-nav-left,.upload_files,.colorpicker-semi").hide();
	jQuery(".billing-semi").show();
     
  });

 jQuery("a.nav-tab.shipping-tab").click(function(){
	jQuery("a.nav-tab.general-tab,a.nav-tab.billing-tab,a.nav-tab.additional-tab").removeClass('nav-tab-active');
	jQuery(this).addClass('nav-tab-active');
	jQuery("#content-nav-right").removeClass('general-vibe');
     jQuery(".general-semi,.billing-semi,.additional-semi,#main-nav-left,.upload_files,.colorpicker-semi").hide();
	jQuery(".shipping-semi").show();
     
  });

 jQuery("a.nav-tab.additional-tab").click(function(){
	jQuery("a.nav-tab.general-tab,a.nav-tab.billing-tab,a.nav-tab.shipping-tab").removeClass('nav-tab-active');
	jQuery(this).addClass('nav-tab-active');
jQuery("#content-nav-right").removeClass('general-vibe');
     jQuery(".general-semi,.billing-semi,.shipping-semi,.upload_files,#main-nav-left").hide();
	jQuery(".additional-semi").show();
     
  });


jQuery(".upload_class").click(function(){
	jQuery(".address_fields_class,.checkout_notice_class,.switches_class,.custom_css_class").removeClass('current');  
	jQuery(this).addClass('current');  
	jQuery(".address_fields,.checkout_notices,.switches,.custom_css").hide();  
	jQuery(".upload_files").show();    
  });

jQuery(".address_fields_class").click(function(){
	jQuery(".checkout_notice_class,.upload_class,.switches_class,.custom_css_class").removeClass('current');  
	jQuery(this).addClass('current');  
	jQuery(".checkout_notices,.switches,.upload_files,.custom_css").hide();    
	jQuery(".address_fields").show();    
  });

jQuery(".checkout_notice_class").click(function(){
	jQuery(".address_fields_class,.upload_class,.switches_class,.custom_css_class").removeClass('current');  
	jQuery(this).addClass('current'); 
	jQuery(".address_fields,.upload_files,.switches,.custom_css").hide();     
	jQuery(".checkout_notices").show();    
  });

jQuery(".switches_class").click(function(){
	jQuery(".address_fields_class,.checkout_notice_class,.upload_class,.custom_css_class").removeClass('current');  
	jQuery(this).addClass('current'); 
	jQuery(".address_fields,.checkout_notices,.upload_files,.custom_css").hide();     
	jQuery(".switches").show();    
  });

jQuery(".custom_css_class").click(function(){
	jQuery(".address_fields_class,.checkout_notice_class,.upload_class,.switches_class").removeClass('current');  
	jQuery(this).addClass('current'); 
	jQuery(".address_fields,.checkout_notices,.upload_files,.switches").hide();     
	jQuery(".custom_css").show();    
  });






});

<!-- =========================== clear ========================= -->

jQuery(document).ready(function(){

    jQuery("th.daoo").click(function(){
	jQuery("th.daoo").toggleClass('current_opener');
     jQuery(".hide_stuff_days").slideToggle(0);
     
  });
});

jQuery(document).ready(function(){

    jQuery("th.add_amount").click(function(){
	jQuery("th.add_amount").toggleClass('current_opener');
     jQuery(".add_amount_field").slideToggle(0);
     
  });
});

jQuery(document).ready(function(){

    jQuery("th.apply_tick").click(function(){
	jQuery("th.apply_tick").toggleClass('current_opener');
     jQuery(".condition_tick").slideToggle(0);
     
  });
});


jQuery(document).ready(function(){

    jQuery(".more_toggler").click(function(){
  jQuery(".more_toggler span").toggleClass('current_opener');
     jQuery(".more_toggler1").slideToggle(0);
     
  });
});

jQuery(document).ready(function(){

    jQuery(".more_toggler1a").click(function(){
  jQuery(".more_toggler1a span").toggleClass('current_opener');
     jQuery(".more_toggler1c").slideToggle(0);
     
  });
});

/************************************************************************
<!-- We don't use this anymore 
jQuery(document).ready(function(){

var counter = 0; 
jQuery(".toggler_adder").bind("click",function(){
    counter++;
    switch(counter){
        case 1:            
	    jQuery(".toggler_adder span").addClass('current_opener');
            jQuery(".wccm1").hide();
            jQuery(".hide_stuff_op2").show();
            break;

        case 999:
            jQuery(".toggler_adder span").removeClass('current_opener');
            jQuery(".wccm1").show();
	    jQuery(".hide_stuff_op" + (counter) ).hide();
	    counter = 0;
            break;

        case counter:
            jQuery(".hide_stuff_op" + (counter) ).hide();
            jQuery(".hide_stuff_op" + (counter + 1) ).show();
            break;

        }	   
});
});
--->
*******************************************************************/


jQuery(document).ready(function(){

    jQuery(".hide_stuff_color_tog").click(function(){
    jQuery(".hide_stuff_color_tog span").toggleClass('current_opener');
     jQuery(".hide_stuff_color").slideToggle(0);
     
  });
});


jQuery(document).ready(function(){

    jQuery(".hide_stuff_tog").click(function(){
    jQuery(".hide_stuff_tog span").toggleClass('current_opener');
     jQuery(".hide_stuff_op").slideToggle(0);
     
  });
});

jQuery(document).ready(function(){

    jQuery(".hide_stuff_time_tog").click(function(){
    jQuery(".hide_stuff_time_tog span").toggleClass('current_opener');
     jQuery(".hide_stuff_time").slideToggle(0);
     
  });
});

jQuery(document).ready(function(){

    jQuery(".hide_stuff_togcheck").click(function(){
     jQuery(".hide_stuff_togcheck span").toggleClass('current_opener');
     jQuery(".hide_stuff_opcheck").slideToggle(0);
     
  });
});

/************************************************************************************
jQuery(document).ready(function() {
jQuery(function() {
jQuery('#select_all_rm').click(function() {
    var c = this.checked;
    jQuery('.rm').prop('checked',c);
});
});
});

jQuery(document).ready(function() {
jQuery(function() {
jQuery('#select_all_rm_s').click(function() {
    var c = this.checked;
    jQuery('.rm_s').prop('checked',c);
});
});
});

jQuery(document).ready(function() {
jQuery(function() {
jQuery('#select_all_rq').click(function() {
    var c = this.checked;
    jQuery('.rq').prop('checked',c);
});
});
});

jQuery(document).ready(function() {
jQuery(function() {
jQuery('#select_all_rq_s').click(function() {
    var c = this.checked;
    jQuery('.rq_s').prop('checked',c);
});
});
});

******************************************************************************/

// Javascript for adding new field
jQuery(document).ready( function() {

	/**
	 * Credits to the Advanced Custom Fields plugin for this code
	 */

	// Update Order Numbers
	function update_order_numbers(div) {
		div.children('tbody').children('tr.wccs-row').each(function(i) {
			jQuery(this).children('td.wccs-order').html(i+1);
		});
	}
	
	// Make Sortable
	function make_sortable(div){
		var fixHelper = function(e, ui) {
			ui.children().each(function() {
				jQuery(this).width(jQuery(this).width());
			});
			return ui;
		};

		div.children('tbody').unbind('sortable').sortable({
			update: function(event, ui){
				update_order_numbers(div);
			},
			handle: 'td.wccs-order',
			helper: fixHelper
		});
	}

	var div = jQuery('.wccs-table'),
		row_count = div.children('tbody').children('tr.wccs-row').length;

	// Make the table sortable
	make_sortable(div);
	
	// Add button
	jQuery('#wccs-add-button').live('click', function(){

		var div = jQuery('.wccs-table'),			
			row_count = div.children('tbody').children('tr.wccs-row').length,
			new_field = div.children('tbody').children('tr.wccs-clone').clone(false); // Create and add the new field

		new_field.attr( 'class', 'wccs-row' );

		// Update names
		new_field.find('[name]').each(function(){
			var count = parseInt(row_count);
			var name = jQuery(this).attr('name').replace('[999]','[' + count + ']');
			jQuery(this).attr('name', name);
		});

		// Add row
		div.children('tbody').append(new_field); 
		update_order_numbers(div);

		// There is now 1 more row
		row_count ++;

		return false;	
	});

	// Remove button
	jQuery('.wccs-table .wccs-remove-button').live('click', function(){
		var div = jQuery('.wccs-table'),
			tr = jQuery(this).closest('tr');

		tr.animate({'left' : '50px', 'opacity' : 0}, 250, function(){
			tr.remove();
			update_order_numbers(div);
		});

		return false;
	});
});