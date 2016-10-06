/**
 *
 * Scheduled Posts Date Picker
 * Author: Colin Devroe cdevroe.com
 * Used Date Picker by Stefan Petre www.eyecon.ro
 *
 * This JS is GPLv2. Stefan's is dual licensed.
 *
 */

(function ($) {
  $(document).ready(function() {
    wp_mm =   $('#mm');
    wp_dd =   $('#jj');
    wp_yyyy = $('#aa');

    $(wp_dd).DatePicker({
      format:   'm/d/Y',
      date:     '10/06/2016',
      starts:   1,
      position: 'bottom',
      onBeforeShow: function(){
        today =   new Date($(wp_mm).val()+'/'+$(wp_dd).val()+'/'+$(wp_yyyy).val());
        dd =      today.getDate();
        mm =      today.getMonth()+1; //January is 0!
        yyyy =    today.getFullYear();
        if(dd<10) { // Add leading 0 for days
            dd='0'+dd;
        }
        if(mm<10) { // Add leading 0 for months
            mm='0'+mm;
        }
        today = mm+'/'+dd+'/'+yyyy;
        $(wp_dd).DatePickerSetDate(today, true);
      },
      onChange: function(formated, dates){
        selectedDate =  new Date(dates);
        selectedDay =   selectedDate.getDate();
        selectedMonth = selectedDate.getMonth()+1;
        selectedYear =  selectedDate.getFullYear();

        if(selectedDay<10) { // Add leading 0 for days
            selectedDay='0'+selectedDay;
        }
        if(selectedMonth<10) { // Add leading 0 for days
            selectedMonth='0'+selectedMonth;
        }

        // Set date values based on selected date
        $(wp_dd).val(selectedDay);
        $(wp_mm).val(selectedMonth)
        $(wp_yyyy).val(selectedYear)

        // Close date picker
        $(wp_dd).DatePickerHide();
      }
    });
  });
})(jQuery);

// Patch for WordPress' version of jQuery
// Patch found here: http://stackoverflow.com/questions/29298462/c-curcss-is-not-a-function-bug-from-jquery#29298828
if (typeof jQuery.curCSS === 'undefined') {
  jQuery.curCSS = function(element, prop, val) {
      return jQuery(element).css(prop, val);
  };
}
