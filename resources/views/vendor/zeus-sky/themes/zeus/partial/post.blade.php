<article class="mt-6" itemscope itemtype="https://schema.org/Movie">
    <div class="px-6 pb-6 mx-auto bg-white dark:bg-black-800 rounded-[2rem] rounded-bl-none rounded-tr-none shadow-md">
        <div class="flex items-center justify-between">
            <span class="font-light text-sm text-black-600 dark:text-black-200">{{ optional($post->published_at)->diffForHumans() ?? '' }}</span>
            <div>
                @unless ($post->tags->isEmpty())
                    @each($theme.'.partial.tag', $post->tags->where('type','category'), 'tag')
                @endunless
            </div>
        </div>
        <aside class="mt-2">
            <a href="{{ route('post',$post->slug) }}" class="text-2xl md:text-3xl font-bold text-black-700 dark:text-black-200 hover:underline">
                {!! $post->title !!}
            </a>
            @if($post->description !== null)
                <p class="mt-2 text-black-600 dark:text-black-200">
                    {!! $post->description !!}
                </p>
            @endif
        </aside>
        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('post',$post->slug) }}" class="text-blue-500 dark:text-blue-200 hover:underline">Read more</a>
            <div>
                <a class="flex items-center gap-2">
                    <img src="{{ \Filament\Facades\Filament::getUserAvatarUrl($post->author) }}" alt="avatar" class="hidden object-cover w-8 h-8 rounded-full sm:block">
                    <p class="text-black-700 dark:text-black-200 hover:underline">{{ $post->author->name ?? '' }}</p>
                </a>
            </div>
        </div>
    </div>
</article>
