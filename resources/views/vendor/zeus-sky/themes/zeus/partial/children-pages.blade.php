<a href="{{ route('page',$post->slug) }}">
    <div class="flex space-x-3 rtl:space-x-reverse">
        @if(!$post->getMedia('posts')->isEmpty())
            <img src="{{ $post->getFirstMediaUrl('posts') }}" class="h-6 w-6 shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/>
        @else
            <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80" class="h-6 w-6 shadow-md rounded-[2rem] rounded-bl-none z-0 object-cover"/>
        @endif
        <div class="w-full">
            <div class="flex items-center justify-between">
                <span class="text-lg">{{ $post->title ?? '' }}</span>
            </div>
        </div>
    </div>
</a>
