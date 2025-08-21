<div x-data="{ init(){ const video = $refs.video; if (!Hls.isSupported()) { video.src = $refs.source.value; video.play(); } else { const hls = new Hls(); hls.loadSource($refs.source.value); hls.attachMedia(video); hls.on(Hls.Events.MANIFEST_PARSED, function() { video.play(); }); } } }" x-init="init()" class="space-y-2">
    <input type="hidden" x-ref="source" value="{{ asset('storage/' . $hls) }}" />
    <video x-ref="video" controls class="w-full rounded"></video>
    <div class="flex gap-2">
        <form method="POST" action="{{ route('stream.start', $cctv) }}">@csrf <x-primary-button>Start</x-primary-button></form>
        <form method="POST" action="{{ route('stream.stop', $cctv) }}">@csrf @method('DELETE') <x-secondary-button>Stop</x-secondary-button></form>
    </div>
</div>

