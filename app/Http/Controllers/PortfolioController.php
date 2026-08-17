<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->get();
        $categories = PortfolioCategory::all();

        return view('portfolio.index', compact('portfolios', 'categories'));
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('category');

        $relatedPortfolios = Portfolio::where('category_id', $portfolio->category_id)
            ->where('id', '!=', $portfolio->id)
            ->limit(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
}
