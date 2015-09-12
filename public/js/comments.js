var $f = $('form');
$f.submit(function(event) {
    $.ajax({
        type: $f.attr('method'),
        url: $f.attr('action'),
        data: $f.serialize(),
        success: function(data) {
            console.log(data);
            //$("#comments-list").prepend(data);
        }
    });

    event.preventDefault();
});
//# sourceMappingURL=comments.js.map