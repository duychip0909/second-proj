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
            <input type="text" id="promo" name="order_name" placeholder="Enter your name" class="p-2 text-sm w-full">
            @error('order_name')
            <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
            @enderror
        </div>
        <div class="pb-5">
            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Phone number</label>
            <input type="text" id="promo" name="order_phone" placeholder="Enter your phone number" class="p-2 text-sm w-full">
            @error('order_phone')
            <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
            @enderror
        </div>
        <div class="pb-5">
            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Email</label>
            <input type="text" id="promo" name="order_email" placeholder="Enter your email" class="p-2 text-sm w-full">
            @error('order_email')
            <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
            @enderror
        </div>
        <div class="pb-5">
            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Address</label>
            <textarea type="text" id="promo" name="order_address" placeholder="Enter your address (available for Hanoi)" class="p-2 text-sm w-full resize-none" rows="5"></textarea>
            @error('order_address')
            <p class="text-xs text-red-500 mt-0.5">*{{ $message }}</p>
            @enderror
        </div>
        <div class="">
            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Notes</label>
            <textarea type="text" id="promo" name="order_notes" placeholder="Enter your notes" class="p-2 text-sm w-full resize-none" rows="5"></textarea>
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
