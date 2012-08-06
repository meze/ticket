var App = {

    inputControlId: "command_text",

    run: function () {
        this.initCommands();
        this.initEvents();
    },

    initEvents: function() {
        var app = this;
        $('.command_form').submit(function (e) {
            var $form = $(this);

            $('#command_send')
                .prop('disabled', true)
                .addClass('disabled')
                .html('Sending...');

            $('#' + app.inputControlId).prop('readonly', true);


            $.post($form.prop('action'), $form.serialize())
                .success(function() {
                })
                .error(function() {
                })
                .complete(function() {
                    $('#' + app.inputControlId).val('').prop('readonly', false);
                    $('#command_send')
                        .prop('disabled', false)
                        .removeClass('disabled')
                        .html('Send');
                });

            e.preventDefault();
        });
    },

    initCommands: function () {
        var app = this;
        $.ajax(Routing.generate('app_command_list'), {
            success: function (countries, textStatus, jqXHR) {
                $("#" + app.inputControlId).autocomplete({
                    wordCount: 1,
                    on: {
                        query: function (text, cb) {
                            var words = [];
                            for (var i = 0; i < countries.length; i++) {
                                if (countries[i].toLowerCase().indexOf(text.toLowerCase()) == 0) {
                                    words.push(countries[i]);
                                }
                                if (words.length > 5) break;
                            }
                            cb(words);
                        }
                    }
                });
            }
        });
    }
};

$(document).ready(function () {
    App.run();
});