<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script>
    $('.btnAddToCart').on('click', function() {
        let btn = $(this);
        execute = btn.data('url');
        $.getJSON(execute, function(res) {
            console.log(res.view);
            $('body').html(res.view);
        });
    });
</script>
