<nav class="flex items-center justify-between">
    <div class="flex items-center space-x-10">
        {{-- Logo --}}
        <a href="/" class="flex items-center space-x-2 transition-opacity hover:opacity-80">
            <img src="{{ $page->baseUrl }}{{ $page->siteLogo }}" alt="{{ $page->siteName}}" class="h-8 w-8 invert dark:invert-0" width="32" height="32" />
            <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ $page->siteName }}</span>
        </a>

        {{-- Desktop Navigation (Matches React md:flex) --}}
        <div class="hidden items-center space-x-8 md:flex">
            @foreach ($page->siteMenu as $link)
                <a href="{{ $page->appUrl }}{{ $link->link }}" 
                  class="text-gray-600 hover:text-primary-600 dark:text-gray-300 dark:hover:text-primary-400">
                    {{ $link->title }}
                </a>
            @endforeach
        </div>
    </div>
            
    <div class="flex items-center gap-3">
        {{-- Desktop Actions (Matches sm:flex) --}}
        <div class="hidden md:flex items-center ml-auto">
            @includeFirst(['_partials.nav-right', '_shared._partials.nav-right-default'])
        </div>

        {{-- MOBILE TOGGLE BUTTON (Essential for mobile to work) --}}
        <button id="mobile-menu-toggle" class="p-2 md:hidden text-gray-600 dark:text-gray-300">
            <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            <svg id="close-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
    </div>
</nav>
