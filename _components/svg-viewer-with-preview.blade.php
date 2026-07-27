@php
    $id = $id ?? 'svg-' . uniqid();
    $fullWidth = $fullWidth ?? true; 
    $bgColor = $bgColor ?? 'bg-white dark:bg-black';
    
    $rawHeight = $height ?? '500px';
    $height = is_numeric($rawHeight) ? $rawHeight . 'px' : $rawHeight;
    
    $baseUrl = rtrim($page->baseUrl ?? '', '/');
    $svgUrl = $baseUrl . '/' . ltrim($path ?? '', '/');
    
    $staticPath = $staticPath ?? str_replace('.svg', '.png', $path ?? '');
    $imageUrl = $baseUrl . '/' . ltrim($staticPath, '/');
@endphp

<figure class="my-10 flex flex-col items-center {{ $fullWidth ? 'w-full' : '' }}">
    {{-- Main Outer Card: p-3 removed so header sits perfectly flush on the outer borders --}}
    <div id="wrapper-{{ $id }}" class="{{ $fullWidth ? 'w-full max-w-7xl' : 'w-fit max-w-full' }} bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-800 flex flex-col transition-all duration-300 overflow-hidden">
        
        {{-- Unified Control Header Row: Sits flush up against top, left, and right borders --}}
        <div id="header-{{ $id }}" class="hidden items-center justify-end px-4 py-2 bg-gray-50/80 dark:bg-gray-800/80 border-b border-gray-200 dark:border-gray-700 z-20">
            <div class="flex items-center gap-2">
                <button id="zoom-in-{{ $id }}" style="cursor: pointer;" class="hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 w-8 h-8 flex items-center justify-center rounded border border-gray-300 dark:border-gray-600 font-bold text-lg transition-colors" title="Zoom In">+</button>
                <button id="zoom-out-{{ $id }}" style="cursor: pointer;" class="hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 w-8 h-8 flex items-center justify-center rounded border border-gray-300 dark:border-gray-600 font-bold text-lg transition-colors" title="Zoom Out">−</button>
                <button id="reset-{{ $id }}" style="cursor: pointer;" class="hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 w-8 h-8 flex items-center justify-center rounded border border-gray-300 dark:border-gray-600 text-lg transition-colors" title="Reset View">⟲</button>
                <button id="fullscreen-{{ $id }}" style="cursor: pointer;" class="hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 w-8 h-8 flex items-center justify-center rounded border border-gray-300 dark:border-gray-600 text-lg transition-colors" title="Toggle Full Screen">⛶</button>
            </div>
        </div>

        {{-- Your New Inner Wrapper: Reintroduces p-3 to cushion all the inner layout content --}}
        <div class="p-3 w-full flex flex-col">
            
            {{-- Main Vector Viewport Layer Container --}}
            <div id="canvas-{{ $id }}" class="overflow-hidden rounded-lg {{ $bgColor }} border border-gray-100 dark:border-gray-800/60 p-3 flex items-center justify-center relative transition-all duration-300 w-full" style="height: {{ $height }};">
                {{-- Default Static Preview Layer --}}
                <img id="img-{{ $id }}" src="{{ $imageUrl }}" alt="Diagram Preview" class="max-w-full max-h-full object-contain block mx-auto h-auto" onerror="this.src='{{ $svgUrl }}';">
                
                {{-- Target Injection Viewport for Interactive Mode --}}
                <div id="interactive-container-{{ $id }}" class="hidden w-full h-full"></div>
            </div>

            {{-- Static Mode Action Link --}}
            <div id="action-row-{{ $id }}" class="w-full flex justify-end mt-1 pr-0">
                <button id="activate-{{ $id }}" style="cursor: pointer;" class="ml-auto bg-indigo-600 hover:bg-indigo-700 text-white text-[10px] font-semibold px-2 py-1 rounded tracking-wide uppercase transition-colors shadow-sm flex items-center gap-1">
                    <span>🔍 View in SVG Viewer</span>
                </button>
            </div>

            {{-- The Caption Row Block: Added fullscreen:hidden to drop from view when maximized --}}
            <div id="caption-{{ $id }}" class="w-full fullscreen:hidden">
                <figcaption class="mt-1 px-1 text-sm leading-relaxed text-gray-600 dark:text-gray-400 empty:hidden">
                    @inlineMarkdown(trim($slot))
                </figcaption>
            </div>

        </div>
    </div>
</figure>

@push('scripts')
<script>
    (function() {
        const id = '{{ $id }}';
        const activateBtn = document.getElementById('activate-' + id);
        if (!activateBtn) return;

        activateBtn.onclick = (e) => {
            e.preventDefault();

            const headerBar = document.getElementById('header-' + id);
            const canvasContainer = document.getElementById('canvas-' + id);
            const staticImg = document.getElementById('img-' + id);
            const actionRow = document.getElementById('action-row-' + id);
            const interactiveContainer = document.getElementById('interactive-container-' + id);

            if (!staticImg || !actionRow || !headerBar || !interactiveContainer || !canvasContainer) return;

            // 1. Remove static elements from view
            staticImg.remove();
            actionRow.remove();

            // 2. Unveil the responsive interactive elements
            headerBar.classList.remove('hidden');
            headerBar.classList.add('flex');
            interactiveContainer.classList.remove('hidden');

            // 3. Create the core inner padding block container (p-4 padding matches original specs)
            // 4. Create the core inner padding block container (Your brilliant layout wrapper)
            const innerContainer = document.createElement('div');
            innerContainer.id = 'inner-container-' + id; // Added an ID so we can target it easily below
            innerContainer.className = 'svg-viewer-container p-4 transition-all duration-300 w-full h-full';

            const embed = document.createElement('object');
            embed.id = 'embed-' + id;
            embed.setAttribute('type', 'image/svg+xml');
            embed.data = '{{ $svgUrl }}';
            embed.className = 'w-full h-full block';
            
            innerContainer.appendChild(embed);
            interactiveContainer.appendChild(innerContainer);

            // 5. Initialize the Pan-Zoom runtime context
            const initEngine = () => {
                const wrapper = document.getElementById('wrapper-' + id);
                const container = innerContainer; 
                const fsBtn = document.getElementById('fullscreen-' + id);
                const originalHeight = '{{ $height }}';

                setTimeout(() => {
                    const instance = svgPanZoom(embed, {
                        zoomEnabled: true,
                        controlIconsEnabled: false,
                        fit: true,
                        center: true
                    });

                    document.getElementById('zoom-in-' + id).onclick = () => instance.zoomIn();
                    document.getElementById('zoom-out-' + id).onclick = () => instance.zoomOut();
                    document.getElementById('reset-' + id).onclick = () => {
                        instance.resetZoom(); 
                        instance.center(); 
                        instance.fit();
                    };

                    if (fsBtn && wrapper && container) {
                        fsBtn.onclick = (el) => {
                            el.preventDefault();
                            if (!document.fullscreenElement) {
                                wrapper.requestFullscreen().catch(err => console.error(err.message));
                            } else {
                                document.exitFullscreen();
                            }
                        };

                        document.addEventListener('fullscreenchange', () => {
                            const liveCaption = document.getElementById('caption-' + id);
                            const canvasBox = document.getElementById('canvas-' + id); // Targets the inner canvas container
                            
                            if (document.fullscreenElement) {
                                // 1. Fullscreen Active: Completely hide the caption container element block
                                if (liveCaption) {
                                    liveCaption.style.setProperty('display', 'none', 'important');
                                }
                                
                                // Expand BOTH container structures to fill the monitor height layout
                                if (canvasBox) {
                                    canvasBox.style.setProperty('height', 'calc(100vh - 48px)', 'important');
                                }
                                container.style.setProperty('height', 'calc(100vh - 48px)', 'important');
                                container.style.flex = '1';
                            } else {
                                // 2. Normal Layout View: Safely re-reveal the caption block frame
                                if (liveCaption) {
                                    liveCaption.style.removeProperty('display');
                                }
                                
                                // Restore original layout fallback heights across elements
                                if (canvasBox) {
                                    canvasBox.style.setProperty('height', originalHeight, 'important');
                                }
                                container.style.setProperty('height', originalHeight, 'important');
                                container.style.flex = 'none';
                            }
                            
                            // Re-calculate pan-zoom bounding limits to fill the screen landscape view
                            setTimeout(() => { 
                                instance.resize(); 
                                instance.fit(); 
                                instance.center(); 
                            }, 200);
                        });
                    }
                }, 50);
            };

            if (embed.contentDocument && embed.contentDocument.documentElement) {
                initEngine();
            } else {
                embed.addEventListener('load', initEngine);
            }
        };
    })();
</script>
@endpush
