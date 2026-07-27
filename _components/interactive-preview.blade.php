@php
    $id = $id ?? 'preview-' . uniqid();
    $height = is_numeric($height) ? $height . 'px' : ($height ?? '500px');
    $path = $path ?? '';
    $status = $status ?? 'draft';
    $fullWidth = $fullWidth ?? true; 
    
    $baseUrl = rtrim($page->baseUrl ?? '', '/');
    $svgUrl = $baseUrl . '/' . ltrim($path, '/');
    
    $staticPath = $staticPath ?? str_replace('.svg', '.png', $path);
    $imageUrl = $baseUrl . '/' . ltrim($staticPath, '/');
@endphp

<figure class="my-10 flex flex-col items-center {{ $fullWidth ? 'w-full' : '' }}">
    <div id="wrapper-{{ $id }}" class="{{ $fullWidth ? 'w-full max-w-7xl' : 'w-fit max-w-full' }} p-3 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-900 dark:border-gray-800 flex flex-col transition-all duration-300 overflow-hidden">
        
        {{-- Static Mode Wrapper Container --}}
        <div id="static-block-{{ $id }}" class="flex flex-col w-full">
            {{-- Image Canvas Viewport --}}
            <div class="overflow-hidden rounded-lg bg-gray-50/30 border border-gray-100 dark:border-gray-700 flex items-center justify-center relative" style="height: {{ $height }};">
                <img id="img-{{ $id }}" src="{{ $imageUrl }}" alt="Diagram Preview" class="max-w-full max-h-full object-contain block mx-auto h-auto" onerror="this.src='{{ $svgUrl }}';">
            </div>

            {{-- Action Row Container: Force button flush-right and close vertically --}}
            <div class="w-full flex justify-end mt-2 pr-0">
                <button id="activate-{{ $id }}" style="cursor:pointer;" class="ml-auto bg-indigo-600 hover:bg-indigo-700 dark:text-white text-[10px] font-semibold px-2 py-1 tracking-wide uppercase transition-colors shadow-sm flex items-center gap-1">
                    <span>🔍 View in SVG Viewer</span>
                </button>
            </div>
        </div>

        {{-- Dynamic Interactive Layout Injection Target --}}
        <div id="canvas-{{ $id }}" class="hidden w-full h-full p-0 m-0"></div>

        {{-- The Hidden Core Component Blueprint Template Layer --}}
        <template id="template-{{ $id }}">
            @include('_shared._components.svg-viewer', [
                'id' => 'viewer-' . $id,
                'height' => $height,
                'path' => $path,
                'status' => $status
            ])
        </template>

        {{-- The Caption Row Block: Borders removed and top margin downsized --}}
        <div id="caption-{{ $id }}">
            <figcaption class="mt-1 px-1 text-sm leading-relaxed text-gray-600 dark:text-gray-400 empty:hidden">
                @inlineMarkdown(trim($slot))
            </figcaption>
        </div>
    </div>
</figure>

@push('scripts')
<script>
    (function() {
        const id = '{{ $id }}';
        const btn = document.getElementById('activate-' + id);
        if (!btn) return;

        btn.onclick = (e) => {
            e.preventDefault();

            const staticBlock = document.getElementById('static-block-' + id);
            const canvas = document.getElementById('canvas-' + id);
            const template = document.getElementById('template-' + id);
            const caption = document.getElementById('caption-' + id);

            if (!staticBlock || !canvas || !template) return;

            staticBlock.remove();
            if (caption) caption.remove();

            canvas.classList.remove('hidden');

            const clone = template.content.cloneNode(true);
            canvas.appendChild(clone);

            const embeddedObject = document.getElementById('viewer-' + id);
            if (embeddedObject) {
                if (embeddedObject.contentDocument && embeddedObject.contentDocument.documentElement) {
                    embeddedObject.dispatchEvent(new Event('load'));
                }
            }
        };
    })();
</script>
@endpush
