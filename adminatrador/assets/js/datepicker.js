$(function() {
    'use strict';

    if ($('#report-daily-datepicker').length) {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('#report-daily-datepicker').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true
        });
        $('#report-daily-datepicker').datepicker('setDate', today);
    }

    if ($('#report-custom-start-datepicker').length) {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('#report-custom-start-datepicker').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true
        });
        $('#report-custom-start-datepicker').datepicker('setDate', today);
    }

    if ($('#report-custom-end-datepicker').length) {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('#report-custom-end-datepicker').datepicker({
            format: "yyyy-mm-dd",
            todayHighlight: true,
            autoclose: true
        });
        $('#report-custom-end-datepicker').datepicker('setDate', today);
    }
});