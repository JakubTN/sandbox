//twitter bootstrap alerts
$(".alert").alert();

//NETTE.AJAX.JS INIT
$(function () {
    $.nette.init();
});

//AJAX LOADING SPINNER
(function($, undefined) {
	$.nette.ext('spinner', {
		init: function () {
			this.spinner = this.createSpinner();
			this.spinner.appendTo('body');
		},
		start: function () {
			this.spinner.show(this.speed);
		},
		complete: function () {
			this.spinner.hide(this.speed);
		}
	}, {
		createSpinner: function () {
			return $('<div>', {
				id: 'ajax-spinner',
				css: {
					display: 'none'
				}
			});
		},
		spinner: null,
		speed: undefined
	});
})(jQuery);

//AJAX DELETE CONFIRMATION
(function($, undefined) {
    $.nette.ext({
        before: function (xhr, settings) {
            if (!settings.nette) {
                return;
            }
            var question = settings.nette.el.data('confirm');
            if (question) {
                return confirm(question);
            }
        }
    });
})(jQuery);

//TWITTER BOOTSTRAP TAB NAVIGATION
$(function(){
    var hash = window.location.hash;
    hash && $('ul.nav-tabs a[href="' + hash + '"]').tab('show');
});

//DATEPICKER
$('.datepicker').pickadate({
    format: 'dd.mm.yyyy',
    formatSubmit: 'yyyy-mm-dd',
    firstDay: 1,
    monthsFull: [ 'január', 'február', 'marec', 'apríl', 'máj', 'jún', 'júl', 'august', 'september', 'október', 'november', 'december' ],
    monthsShort: [ 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII' ],
    weekdaysFull: [ 'nedeļľa', 'pondelok', 'utorok', 'streda', 'š̌tvrtok', 'piatok', 'sobota' ],
    weekdaysShort: [ 'Ne', 'Po', 'Ut', 'St', 'Št', 'Pi', 'So' ],
    today: 'dnes',
    clear: 'vymazať'
});