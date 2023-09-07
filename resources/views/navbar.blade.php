<nav class="w-full sticky top-0 left-0 flex-col md:flex-row h-auto bg-[#fefefe] border-b-[1px] border-[#ccc] gap-8 px-2 py-4 flex justify-between items-center">
    <div class="w-full h-full flex justify-between items-center p-2">
        <img src="{{$logo}}" alt="El pais">
        <button id="btn-navbar" class="md:hidden w-10 h-10 group flex justify-center items-center flex-col gap-1 px-1">
            <div class="w-8 h-1 bg-[#333] rounded"></div>
            <div class="w-8 h-1 bg-[#333] rounded"></div>
        </button>
    </div>
    <ul id="list-links" class="md:flex md:justify-evenly md:items-center justify-center hidden items-center gap-2 flex-col md:flex-row">
        @foreach($urls as $url)
            <a class="text-sm font-medium px-4 hover:bg-[#f2f2f2] rounded-md py-2 transition-all" href="/news/{{$url}}">{{$url}}</a>
        @endforeach
    </ul>
</nav>

<script>
    const btn_links = document.querySelector('#btn-navbar')
    const links = document.querySelector('#list-links');
    btn_links.addEventListener('click', () => {
        links.classList.toggle('hidden');
        links.classList.toggle('flex');
    });
</script>
