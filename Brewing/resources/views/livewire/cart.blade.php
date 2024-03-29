<div class="container mx-auto mt-10" id="cart-wrapper">
    <div class="flex shadow-md my-10  overflow-hidden">
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
                <div class="ease-in-out transition-all duration-300 flex items-center hover:bg-gray-100 -mx-8 px-6 py-5 cup ">
                    <div class="flex w-2/5"> <!-- product -->
                        <div class="w-24 h-24  overflow-hidden">
                            <img class="w-full h-full object-cover aspect-square" src="{{$cart['image']}}" alt="">
                        </div>
                        <div class="flex flex-col justify-between ml-4 flex-grow">
                            <span class="font-bold text-sm">{{$cart['name']}}</span>
                            <a href="javascript:;" wire:click.prevent="removeItem({{$cart['id']}})" class="ease transition-all duration-300 font-semibold hover:text-red-500 text-gray-500 text-xs remove-btn">Remove</a>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <select class="block py-2 px-0.5 text-gray-600 w-16 text-sm border ">
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
                        <input data-id="{{$cart['id']}}" class=" quantity-input mx-2 border text-center w-10 qty" type="number" name="qty" min="1" max="999" step="1" value="{{$cart['quantity']}}">
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
        <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">{{$cupTotal == 1 ? 'CUP ' . $cupTotal : 'CUPS ' . $cupTotal}}</span>
                <span class="font-semibold text-sm">{{number_format($subTotal)}}đ</span>
            </div>
            <form action="{{route('coffee.order')}}" method="post">
                @csrf
                <div class="py-5">
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Name</label>
                    <input type="text" id="promo" name="order_name" placeholder="Enter your name" class="p-2 text-sm w-full ">
                    @error('order_name')
                    <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-5">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Phone number</label>
                    <input type="text" id="promo" name="order_phone" placeholder="Enter your phone number" class="p-2 text-sm w-full ">
                    @error('order_phone')
                    <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-5">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Email</label>
                    <input type="text" id="promo" name="order_email" placeholder="Enter your email" class="p-2 text-sm w-full ">
                    @error('order_email')
                    <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="pb-5">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Address</label>
                    <textarea type="text" id="promo" name="order_address" placeholder="Enter your address (available for Hanoi)" class=" p-2 text-sm w-full resize-none" rows="5"></textarea>
                    @error('order_address')
                    <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Notes</label>
                    <textarea type="text" id="promo" name="order_notes" placeholder="Enter your notes" class=" p-2 text-sm w-full resize-none" rows="5"></textarea>
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase hidden">Apply</button>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>{{number_format($subTotal)}}đ</span>
                    </div>
                    <button type="submit" class="transition ease-in-out duration-200 text-black hover:bg-gray-800 hover:text-white font-semibold border-2 border-gray-900 focus:outline-none btnAddToCart py-3 text-sm uppercase w-full">Order</button>
                </div>
            </form>
        </div>
    </div>
</div>



