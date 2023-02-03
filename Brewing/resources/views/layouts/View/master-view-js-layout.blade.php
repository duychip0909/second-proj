<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    $(document).on('click', '.btnAddToCart', function() {
        let btn = $(this);
        url = btn.data('url');
        $.getJSON(url, function(res) {
            $('.navbar').html(res.view);
            Toast.fire({
                icon: 'success',
                title: 'Add to cart ' + res.name + ' successfully'
            })
        });
    });

    $('.qtyplus').on('click', function () {
        let input = $(this).parents('.increment-input').find('.quantity-input');
        var max = Number(input.attr('max'));
        let current = Number(input.val());
        let newVal = (current + Number(input.attr('step')));
        if (newVal > max) newVal = max;
        input.val(Number(newVal)).trigger('change');
    });

    $('.qtyminus').on('click', function () {
        let input = $(this).parents('.increment-input').find('.quantity-input');
        console.log(input);
        var min = Number(input.attr('min'));
        let current = Number(input.val());
        let newVal = (current - input.attr('step'));
        if (newVal < min) {
            newVal = min;
        }
        input.val(Number(newVal)).trigger('change');
    });

    $('.quantity-input').on('change', function() {
        Livewire.emit('updateItem', $(this).data('id'), $(this).val());
    })

    window.addEventListener('removeSuccess', (res) => {
        Toast.fire({
            icon: 'success',
            title: 'Remove ' + res.detail.name + ' successfully'
        })
    })

    // var $grid = $('.isotope-grid').isotope({
    //     itemSelector: '.grid-item',
    //     layoutMode: 'fitRows',
    //     getSortData: {
    //         name: '.coffee-name'
    //     },
    //     fitRows: {
    //         columnWidth: 200,
    //         rowHeight: 100
    //     }
    // });
    //
    // $('.filter').on('click', function() {
    //     var sortValue = $(this).attr('data-sort-value');
    //     console.log(sortValue)
    //     $grid.isotope({
    //         sortBy: sortValue
    //     });
    // });
</script>
