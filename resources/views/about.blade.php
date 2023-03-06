<x-app-layout meta-title="TheCodeholic Blog - About us">

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Post Section -->
        <section class="w-full md:w-full flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                @if($widget && $widget->image)
                    <img src="/storage/{{ $widget->image }}">
                @endif

                <div class="bg-white flex flex-col justify-start p-6">
                    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{$widget ? $widget->title : ''}}
                    </h1>
                    <div>
                        {!! $widget ? $widget->content : '' !!}
                    </div>
                </div>
            </article>
        </section>

    </div>
</x-app-layout>
