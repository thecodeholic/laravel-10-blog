<x-app-layout>

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3  px-3">
            <div class=" flex flex-col items-center">
                @foreach($posts as $post)
                    <x-post-item :post="$post"/>
                @endforeach
            </div>
            {{ $posts->links() }}
        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">
                    {{\App\Models\TextWidget::getTitle('about-us-sidebar')}}
                </p>
                {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
                <a href="#"
                   class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

        </aside>

    </div>
</x-app-layout>
