@unless($recent->isEmpty())
    <div class="my-4">
        <h4 class="mb-4 text-xl font-bold text-black-700 dark:text-black-200">Recent Post</h4>
        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white dark:bg-black-800 rounded-[2rem] ltr:rounded-br-none rtl:rounded-bl-none shadow-md">
            @foreach($recent as $post)
                <a href="{{ route('post',$post->slug) }}" class="border-b border-t border-white hover:border-primary-600 transition duration-300 px-1 py-4">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        @if(!$post->getMedia('posts')->isEmpty())
                            <img src="{{ $post->getFirstMediaUrl('posts') }}" class="h-6 w-6 shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/>
                        @endif
                        <div class="w-full text-lg">{{ $post->title ?? '' }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endunless
