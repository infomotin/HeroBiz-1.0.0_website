<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\Pricing;
use App\Models\Faq;
use App\Models\Client;
use App\Models\Page;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'heroes' => Hero::count(),
            'services' => Service::count(),
            'portfolios' => Portfolio::count(),
            'blog_posts' => BlogPost::count(),
            'testimonials' => Testimonial::count(),
            'teams' => Team::count(),
            'pricing' => Pricing::count(),
            'faqs' => Faq::count(),
            'clients' => Client::count(),
            'pages' => Page::count(),
            'contact_messages' => ContactMessage::count(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
