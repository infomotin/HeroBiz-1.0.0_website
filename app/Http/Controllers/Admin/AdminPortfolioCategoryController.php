<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::latest()->paginate(10);
        return view('admin.portfolio-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_categories,slug',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        PortfolioCategory::create($validated);

        return redirect()->route('admin.portfolio-category.index')->with('success', 'Portfolio category created successfully.');
    }

    public function show(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->load('portfolios');
        return view('admin.portfolio-category.show', compact('portfolioCategory'));
    }

    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-category.edit', compact('portfolioCategory'));
    }

    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_categories,slug,' . $portfolioCategory->id,
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $portfolioCategory->update($validated);

        return redirect()->route('admin.portfolio-category.index')->with('success', 'Portfolio category updated successfully.');
    }

    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();
        return redirect()->route('admin.portfolio-category.index')->with('success', 'Portfolio category deleted successfully.');
    }
}
