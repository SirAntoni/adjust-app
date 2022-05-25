$(function() {
    'use strict'

    if ($("#providers").length) {
        $("#providers").select2();
    }

    if ($("#clients").length) {
        $("#clients").select2();
    }
});