<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\BlogPost;
use App\Models\Pricing;
use App\Models\Faq;
use App\Models\Client;
use App\Models\AboutSection;
use App\Models\AboutTab;
use App\Models\CallToAction;
use App\Models\OnfocusSection;
use App\Models\Feature;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::where('is_active', true)->first();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        $featuredServices = Service::where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->limit(4)->get();
        $aboutSection = AboutSection::where('is_active', true)->first();
        $aboutTabs = AboutTab::where('is_active', true)->orderBy('sort_order')->get();
        $clients = Client::where('is_active', true)->orderBy('sort_order')->get();
        $cta = CallToAction::where('is_active', true)->first();
        $onfocus = OnfocusSection::where('is_active', true)->first();
        $features = Feature::where('is_active', true)->orderBy('sort_order')->get();
        $serviceDetails = ServiceDetail::with('service')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order')->get();
        $pricings = Pricing::where('is_active', true)->orderBy('sort_order')->get();
        $faqs = Faq::where('is_active', true)->orderBy('sort_order')->get();
        $portfolios = Portfolio::with('category')->get();
        $portfolioCategories = PortfolioCategory::all();
        $teamMembers = Team::where('is_active', true)->orderBy('sort_order')->get();
        $recentPosts = BlogPost::with(['author', 'category'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('welcome', compact(
            'hero', 'services', 'featuredServices', 'aboutSection', 'aboutTabs',
            'clients', 'cta', 'onfocus', 'features', 'serviceDetails',
            'testimonials', 'pricings', 'faqs', 'portfolios', 'portfolioCategories',
            'teamMembers', 'recentPosts'
        ));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
