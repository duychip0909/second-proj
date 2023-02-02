@extends('layouts.View.master-view-layout')
@section('content')
    @include('layouts.View.master-cart-layout')
@endsection

@section('customScript')
    <script>
        const updateCartUrl = "{{route('coffee.updateCart')}}";
        const deleteCartUrl = "{{route('coffee.removeCup')}}";


        $(document).on('click', '.qtyplus', function (e) {
            let input = $(this).parents('.increment-input').find('.quantity-input');
            var max = Number(input.attr('max'));
            let current = Number(input.val());
            let newVal = (current + Number(input.attr('step')));
            if (newVal > max) newVal = max;
            input.val(Number(newVal));
            input.trigger('change');
            e.preventDefault();
        });

        $(document).on('click', '.qtyminus', function (e) {
            let input = $(this).parents('.increment-input').find('.quantity-input');
            console.log(input);
            var min = Number(input.attr('min'));
            let current = Number(input.val());
            let newVal = (current - input.attr('step'));
            if (newVal < min) {
                newVal = min;
            }

            input.val(newVal);
            input.trigger('change');
            console.log('[change]', newVal);
            e.preventDefault();
        });

        function addToCart(e) {
            try {
                console.log('hello');
                e.preventDefault();
                let quantityInput = $(this);
                let id = quantityInput.data('id');
                let quantity = quantityInput.val();
                $.getJSON(`${updateCartUrl}?id=${id}&quantity=${quantity}`, function (response) {
                    $('#cart-wrapper').replaceWith($(response.view));
                })
            } catch (err) {}
        }

        function deleteCup(e) {
            try {
                e.preventDefault();
                let removeBtn = $(this);
                let id = removeBtn.data('id');
                $.getJSON(`${deleteCartUrl}?id=${id}`, function (response) {
                    $('#cart-wrapper').replaceWith($(response.view));
                })
            } catch (err) {}
        }

        $(document).on('change', '.quantity-input', addToCart);
        $(document).on('click', '.remove-btn', deleteCup);
    </script>
@endsection
