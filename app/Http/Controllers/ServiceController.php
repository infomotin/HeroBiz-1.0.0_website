<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceDetail;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->with('details')
            ->orderBy('sort_order')
            ->get();

        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load('details');

        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->with('details')
            ->limit(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
