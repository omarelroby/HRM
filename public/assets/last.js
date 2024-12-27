$(function () {
initHijrDatePicker();
initHijrDatePickerDefault();

    $('.disable-date').hijriDatePicker({

      minDate:"2020-01-01",
      maxDate:"2021-01-01",
      viewMode:"years",
            hijri:true,
            debug:true
            });

            });

function initHijrDatePicker() {

    $(".hijri-date-input").hijriDatePicker({
            locale: "ar-sa",
            format: "DD-MM-YYYY",
            hijriFormat:"iYYYY-iMM-iDD",
            dayViewHeaderFormat: "MMMM YYYY",
            hijriDayViewHeaderFormat: "iMMMM iYYYY",
            showSwitcher: true,
            allowInputToggle: true,
            showTodayButton: false,
            useCurrent: true,
            isRTL: false,
            viewMode:'months',
            keepOpen: false,
            hijri: false,
            debug: true,
            showClear: true,
            showTodayButton: true,
            showClose: true
            });
            }

            function initHijrDatePickerDefault() {

            $(".hijri-date-default").hijriDatePicker();
            }
