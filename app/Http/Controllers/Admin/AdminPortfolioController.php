<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class AdminPortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = PortfolioCategory::orderBy('name')->get();
        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'category_id' => 'required|exists:portfolio_categories,id',
        ]);

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio created successfully.');
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('category');
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = PortfolioCategory::orderBy('name')->get();
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'category_id' => 'required|exists:portfolio_categories,id',
        ]);

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio deleted successfully.');
    }
}
