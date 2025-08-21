<?php

namespace App\Services;

use App\Models\Cctv;
use App\Models\Stream;
use Illuminate\Support\Facades\Storage;

class StreamService
{
    public function start(Cctv $cctv): Stream
    {
        $dir = storage_path('app/public/streams/cctv_' . $cctv->id);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $hlsPath = $dir . '/index.m3u8';
        $segmentPattern = $dir . '/segment_%03d.ts';

        // Build ffmpeg command
        $rtsp = escapeshellarg($cctv->rtsp_url);
        $hlsPathEsc = escapeshellarg($hlsPath);
        $segmentPatternEsc = escapeshellarg($segmentPattern);

        $cmd = "ffmpeg -rtsp_transport tcp -i $rtsp -an -c:v copy -f hls -hls_time 2 -hls_list_size 6 -hls_flags delete_segments+append_list -hls_segment_filename $segmentPatternEsc $hlsPathEsc";

        // Run in background and capture PID
        $output = [];
        exec($cmd . ' > /dev/null 2>&1 & echo $!', $output);
        $pid = isset($output[0]) ? (int) $output[0] : null;

        $stream = $cctv->stream()->firstOrNew();
        $stream->hls_path = 'streams/cctv_' . $cctv->id . '/index.m3u8';
        $stream->pid = $pid;
        $stream->status = 'running';
        $stream->started_at = now();
        $stream->stopped_at = null;
        $stream->save();

        return $stream;
    }

    public function stop(Cctv $cctv): void
    {
        $stream = $cctv->stream;
        if ($stream && $stream->pid) {
            $pid = (int) $stream->pid;
            // Attempt to terminate
            exec('kill ' . $pid . ' > /dev/null 2>&1');
            $stream->status = 'stopped';
            $stream->stopped_at = now();
            $stream->save();
        }
    }
}

