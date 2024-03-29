<div class="container mx-auto mt-10" id="cart-wrapper">
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Order Cart</h1>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Cups</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Option</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
            </div>
            @foreach($carts as $cart)
                <div class="ease-in-out transition-all duration-300 flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 cup">
                    <div class="flex w-2/5"> <!-- product -->
                        <div class="w-24 h-24">
                            <img class="w-full h-full object-cover aspect-square" src="{{$cart['image']}}" alt="">
                        </div>
                        <div class="flex flex-col justify-between ml-4 flex-grow">
                            <span class="font-bold text-sm">{{$cart['name']}}</span>
                            <a href="#" data-id="{{$cart['id']}}" class="ease transition-all duration-300 font-semibold hover:text-red-500 text-gray-500 text-xs remove-btn">Remove</a>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <select class="block py-2 px-0.5 text-gray-600 w-16 text-sm border">
                            @foreach($options as $option)
                                <option value="{{$option}}">{{$option->key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-center w-1/5 increment-input">
                        <button class="qtyminus" aria-hidden="true">
                            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                            </svg>
                        </button>
                        <input data-id="{{$cart['id']}}" class="quantity-input mx-2 border text-center w-10 qty" type="number" name="qty" min="1" max="999" step="1" value="{{$cart['quantity']}}">
                        <button class="qtyplus" aria-hidden="true">
                            <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                            </svg>
                        </button>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">{{number_format($cart['price'])}}đ</span>
                    <span class="text-center w-1/5 font-semibold text-sm">{{number_format($cart['price'] * $cart['quantity'])}}đ</span>
                </div>
            @endforeach
            <a href="{{route('coffee.shop')}}" class="flex font-semibold text-gray-800 text-sm mt-10 arrow-back">
                <svg class="fill-current mr-2 text-gray-800 w-4 transition-all ease-in-out duration-200" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                Continue Order
            </a>
        </div>
        @include('layouts.Components.cart-summary')
    </div>
</div>



