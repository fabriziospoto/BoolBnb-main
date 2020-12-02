require('bootstrap-fileinput');
require('bootstrap-fileinput/themes/fa/theme.js');
require('bootstrap-fileinput/js/locales/it.js');

//trigger button "crea appartamento" (hide/show)
$(document).on('click', '.fileinput-upload-button', function () {
    if ($('.kv-upload-progress.kv-hidden').is(':hidden')) {
        console.log('nascosto');
    } else {
        $('#btn-apartment_create').css('display', 'block');
        console.log('else');
    }
})

// create
if (top.location.pathname === '/user/apartments/images/image-create/' + $('#apartment_id').val()) {
    $("#input-fa").fileinput({
        theme: "fa",
        language: "it",
        dropZoneTitle: 'Trascina 5 file qui &hellip;',
        uploadUrl: "/image-submit",
        uploadExtraData: function () {
            return {
                _token: $("input[name='_token']").val(),
                apartment_id: $('#apartment_id').val(),
            }
        },
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 2000,
        minFileCount: 5,
        maxFileCount: 5,
        slugCallBack: function (filename) {
            return filename.replace('(', '_').replace(')', '_');
        }
    });
}

// edit
if (top.location.pathname === '/user/apartments/images/' + $('#apartment_id').val() + '/image-edit') {

    if ($('.number-card').length == 5) {
        $("#input-fa").fileinput({
            theme: "fa",
            language: "it",
        }).fileinput('disable');
    } else {
        $("#input-fa").fileinput({
            theme: "fa",
            language: "it",
            dropZoneTitle: 'Trascina 5 file qui &hellip;',
            uploadUrl: "/image-submit",
            uploadExtraData: function () {
                return {
                    _token: $("input[name='_token']").val(),
                    apartment_id: $('#apartment_id').val(),
                }
            },
            alloweFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize: 2000,
            minFileCount: 5 - $('.number-card').length,
            maxFileCount: 5 - $('.number-card').length,
            slugCallBack: function (filename) {
                return filename.replace('(', '_').replace(')', '_');
            }
        });
    }
}
