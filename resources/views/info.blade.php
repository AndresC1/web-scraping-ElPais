@extends('template')

@section('content')
    <section class="w-full h-auto px-8 py-10 flex flex-col justify-start items-center gap-6">
        <h1 class="text-4xl font-bold w-full max-w-[60rem] pb-14">{{$encabezado}}</h1>
        <p class="text-md font-base w-full max-w-[60rem]">{{$content}}</p>
        <img class="w-full max-w-[55rem] bg-cover rounded-md" src="{{$imagen}}" alt="{{$title}}">
        @foreach($pTexts as $texto)
            <p class="text-md font-base w-full max-w-[60rem]">{{$texto}}</p>
        @endforeach
    </section>
@endsection

