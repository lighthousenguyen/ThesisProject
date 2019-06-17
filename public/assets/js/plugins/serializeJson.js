;(function ($) {

    'use strict';

    $.fn.serializeJson = function () {
        var $this = $(this);
        var result = {};

        $.each($this.serializeArray(), function (index, input) {
            result[input.name] = input.value;
        });

        return result;
    }

})(jQuery);