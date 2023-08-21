@props(['posts'])

    <div class="container sm:grid grid-cols-2 gap-15 mx-auto py-15 px-5 border-b border-gray-300">
        @foreach ($posts as $post)
        <div class="flex">
            <img class="object-cover" src="{{asset('storage/' . $post->image)}}"  style="width: 590px;height:400px">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-4xl py-5 md:pt-0">{{$post->title}}</h2>
            <div>
                    By: <span class="text-gray-500 italic">{{$post->user->username}}</span>
                    on <span class="text-gray-500 italic">{{ date('d-m-Y',strtotime($post->updated_at)) }}</span>
                <p class="text-l text-gray-700 py-8 leading-6">{{ substr(strip_tags($post->description), 0, 450) }} .......</p>

                <x-link name='Read More' link='/{{$post->slug}}' color='gray' padding='p-5'/>
            </div>
        </div>
        @endforeach
    </div>
