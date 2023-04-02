<x-app-layout>
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3  px-3">
            <div class=" flex flex-col">
                @foreach($posts as $post)
                    <div>
                        <a href="{{route('view', $post)}}">
                            <h2 class="text-blue-500 font-bold text-lg sm:text-xl mb-2">
                                {!! str_replace(request()->get('q'), '<span class="bg-yellow-300">'.request()->get('q').'</span>', $post->title) !!}
                            </h2>
                        </a>
                        <div>
                            {{$post->shortBody()}}
                        </div>
                    </div>
                    <hr class="my-4">
                @endforeach
            </div>
            {{ $posts->links() }}
        </section>

        <!-- Sidebar Section -->
        <x-sidebar/>

    </div>
</x-app-layout>
