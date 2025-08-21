<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use App\Services\StreamService;

class StreamController extends Controller
{
    public function __construct(private StreamService $service) {}

    public function start(Cctv $cctv)
    {
        $this->authorize('view', $cctv);
        $stream = $this->service->start($cctv);
        return back()->with('status', 'Streaming started');
    }

    public function stop(Cctv $cctv)
    {
        $this->authorize('view', $cctv);
        $this->service->stop($cctv);
        return back()->with('status', 'Streaming stopped');
    }
}

