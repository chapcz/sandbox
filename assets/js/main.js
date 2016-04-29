$(function () {
    $.nette.init();
});

$("[modal]").unbind("click");
$("[modal]").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: $(this).attr("href"),
        data: {no_layout: 1},
        success: function (r) {
            $(".modal-content").html(r);
            $("#modal").modal("show");
        }
    });
});

LiveForm.setOptions({
    messageErrorPrefix: '',
    wait: 500
});

$(".datepicker").datepicker({
    language: "cs",
    orientation: "bottom left"
});

$('input[maxlength]').maxlength();


$("input.typeahead").each(function(){
    var x = $(this);
    console.log(x.data("remote"));
    var y =  new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: x.data("remote")+'?query=%QUERY',
            wildcard: '%QUERY'
        }
    });
    x.typeahead(null, {
        name: x.name,
        source: y,
        limit: 10
    });
});

$('#calendar').fullCalendar({
    lang: 'cs'
});

tinymce.init({
    selector: 'textarea.tinymce',
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
});