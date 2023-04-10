<footer class="bg-gray-700 py-15 mt-20">
    <div class="container mx-auto flex justify-between item-center px-6 ">
        <div>
            <h3 class="font-bold text-gray-100">Pages</h3>
            <ul class="pt-4 text-gray-400">
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="{{ url('/') }}">Home</a></li>
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="{{url('blog')}}">Blog</a></li>
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="{{ route('login') }}">Login</a></li>
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="{{ route('register') }}">Register</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold text-gray-100">Latest Posts</h3>
            <ul class="pt-4 text-gray-400">
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="/">better</a></li>
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="/">very good</a></li>
                <li class="pb-2"><a class="hover:text-gray-100 transition duration-300" href="/">good</a></li>
            </ul>
        </div>
    </div>
</footer>