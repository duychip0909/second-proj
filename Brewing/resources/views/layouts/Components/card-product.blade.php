<div class="w-full max-w-sm bg-white  overflow-hidden border border-gray-200 hover:shadow dark:bg-gray-200 dark:border-gray-200 drinks grid-item">
    <a href="{{route('coffee.detail', ['id' => $coffee->id])}}" class="block drinks-img-wrapper w-[167px] lg:w-[260px] aspect-square overflow-hidden ">
        <img class="w-full h-full object-cover drinks-img" src="{{$coffee->image}}" alt="product image" />
    </a>
    <div class="p-3">
        <a href="#">
            <h5 class="text-sm lg:text-base font-bold tracking-tight text-gray-900 dark:text-white text-center coffee-name">
                {{$coffee->name}}
                @foreach($options as $option)
                    <span class="text-xs px-0.5 rounded {{$option->value == 1 ? 'text-red-600 bg-red-200' : 'text-blue-600 bg-blue-200'}}">{{$option->key}}</span>
                @endforeach
            </h5>
        </a>
        <div class="flex flex-col lg:flex-row items-center justify-between text-base mt-4 relative">
            <span class="font-medium text-gray-900 dark:text-white text-xs lg:text-sm">{{number_format($coffee->price)}}đ</span>
            <button data-url="{{route('coffee.addToCart', ['id' => $coffee->id])}}" class="px-2 py-0.5 transition ease-in-out duration-200 hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none btnAddToCart">Add
                to cart
            </button>
        </div>
    </div>
</div>
