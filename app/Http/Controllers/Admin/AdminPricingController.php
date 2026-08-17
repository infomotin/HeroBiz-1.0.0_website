<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class AdminPricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::latest()->paginate(10);
        return view('admin.pricing.index', compact('pricings'));
    }

    public function create()
    {
        return view('admin.pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'period' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_featured' => 'boolean',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        Pricing::create($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan created successfully.');
    }

    public function show(Pricing $pricing)
    {
        return view('admin.pricing.show', compact('pricing'));
    }

    public function edit(Pricing $pricing)
    {
        return view('admin.pricing.edit', compact('pricing'));
    }

    public function update(Request $request, Pricing $pricing)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'period' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_featured' => 'boolean',
            'btn_text' => 'nullable|string|max:255',
            'btn_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $pricing->update($validated);

        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan updated successfully.');
    }

    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return redirect()->route('admin.pricing.index')->with('success', 'Pricing plan deleted successfully.');
    }
}
