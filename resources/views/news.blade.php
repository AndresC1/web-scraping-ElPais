@extends('template')

@section('content')
    <div class="w-full h-auto flex justify-center items-center flex-col">
        @foreach($info_news as $new)
            <div class="w-full max-w-[45rem] h-80 px-8 border-b-[1px] grid grid-cols-12 py-4">
                <div class="col-span-4 h-full bg-cover bg-center rounded-md" style='background-image: url("{{$new['image']}}")'></div>
                <span class="col-span-8 flex flex-col justify-start items-start gap-4 px-4">
                    <h1 class="font-semibold text-lg">{{$new['title']}}</h1>
                    <p class="text-[#777] text-sm font-medium">{{$new['content']}}</p>
                    <a class="col-span-12 flex justify-end items-center gap-2" href="{{route('info', ['country' => $new['link']['country'], 'date' => $new['link']['date'], 'title' => $new['link']['title']])}}">
                        <span class="text-sm font-medium text-[#777]">Leer más</span>
                        <svg class="w-4 h-4 text-[#777]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </span>
            </div>
        @endforeach
    </div>
@endsection
