<div class="absolute bg-white inset-x-0 h-auto z-10 w-full shadow p-2" id="searchBox">
    @foreach($coffees as $coffee)
        <div class="flex mb-2">
            <img src="{{$coffee->image}}" alt="" class="w-16 h-16 aspect-square object-cover">
            <h5 class="ml-2">{{$coffee->name}}</h5>
        </div>
    @endforeach
</div>

