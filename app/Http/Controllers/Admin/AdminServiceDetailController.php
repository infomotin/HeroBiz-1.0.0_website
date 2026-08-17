<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceDetailController extends Controller
{
    public function index()
    {
        $serviceDetails = ServiceDetail::with('service')->latest()->paginate(10);
        return view('admin.service-detail.index', compact('serviceDetails'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();
        return view('admin.service-detail.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        ServiceDetail::create($validated);

        return redirect()->route('admin.service-detail.index')->with('success', 'Service detail created successfully.');
    }

    public function show(ServiceDetail $serviceDetail)
    {
        $serviceDetail->load('service');
        return view('admin.service-detail.show', compact('serviceDetail'));
    }

    public function edit(ServiceDetail $serviceDetail)
    {
        $services = Service::orderBy('title')->get();
        return view('admin.service-detail.edit', compact('serviceDetail', 'services'));
    }

    public function update(Request $request, ServiceDetail $serviceDetail)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $serviceDetail->update($validated);

        return redirect()->route('admin.service-detail.index')->with('success', 'Service detail updated successfully.');
    }

    public function destroy(ServiceDetail $serviceDetail)
    {
        $serviceDetail->delete();
        return redirect()->route('admin.service-detail.index')->with('success', 'Service detail deleted successfully.');
    }
}
