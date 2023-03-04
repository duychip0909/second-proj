<section class="shadow-md bg-white navbar rounded-lg">
    <div class="container mx-auto">
        <div class="navbar flex justify-between items-center h-32">
            <div class="logo">
                BREWING*
            </div>
            <a href="javascript:">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
            </a>
            <div class="navbar-nav absolute lg:block">
                <ul class="flex-col lg:flex-row flex items-center">
                    <li class="mx-4"><a href="{{route('coffee.shop')}}">Home</a></li>
                    <li class="mx-4"><a href="#">Our Cups</a></li>
                    <li class="mx-4"><a href="{{route('about_us')}}">About us</a></li>
                    <li class="mx-4"><a href="#">Contact</a></li>
                    <li class="mx-4">
                        <a href="{{route('coffee.showCart')}}" class="relative inline-flex items-center p-1 text-sm font-medium text-center text-black cart">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <span class="sr-only">Notifications</span>
                            <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                                {{$cupTotal}}
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
