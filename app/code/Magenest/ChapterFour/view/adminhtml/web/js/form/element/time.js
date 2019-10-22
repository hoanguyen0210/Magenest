define([
    'Magento_Ui/js/form/element/date',
    'jquery'
], function(Date) {
    'use strict';
    return Date.extend({
        defaults: {
            options: {
                showsDate: true,
                beforeShowDay: function(date){
                    var day = date.getDate();
                    return [day === 8 || day === 9 || day === 10 || day === 11 || day === 12]
                }
            },
            elementTmpl: 'ui/form/element/date',
        }
    });
});

