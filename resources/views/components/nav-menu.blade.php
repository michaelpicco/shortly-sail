<nav class="-mx-3 flex flex-1 justify-end">
    <a
        href="{{ route('home') }}"
        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
    >
        Home
    </a>    
    @if (Route::has('urls'))
        <a
            href="{{ route('urls') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            URL List
        </a> 
    @endif                                                             
    @if (Route::has('upload'))
        <a
            href="{{ route('upload') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Upload CSV
        </a> 

    @endif

    @if (Route::has('analytics'))
        <a
            href="{{ route('analytics') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Analytics
        </a> 
    @endif                                
</nav>
