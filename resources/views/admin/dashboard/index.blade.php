@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    @php
        $cards = [
            ['label' => 'Heroes', 'count' => $stats['heroes'], 'route' => 'admin.hero.index', 'color' => 'blue'],
            ['label' => 'Services', 'count' => $stats['services'], 'route' => 'admin.service.index', 'color' => 'green'],
            ['label' => 'Portfolios', 'count' => $stats['portfolios'], 'route' => 'admin.portfolio.index', 'color' => 'purple'],
            ['label' => 'Blog Posts', 'count' => $stats['blog_posts'], 'route' => 'admin.blog-post.index', 'color' => 'indigo'],
            ['label' => 'Testimonials', 'count' => $stats['testimonials'], 'route' => 'admin.testimonial.index', 'color' => 'pink'],
            ['label' => 'Team Members', 'count' => $stats['teams'], 'route' => 'admin.team.index', 'color' => 'yellow'],
            ['label' => 'Pricing Plans', 'count' => $stats['pricing'], 'route' => 'admin.pricing.index', 'color' => 'red'],
            ['label' => 'FAQs', 'count' => $stats['faqs'], 'route' => 'admin.faq.index', 'color' => 'teal'],
            ['label' => 'Clients', 'count' => $stats['clients'], 'route' => 'admin.client.index', 'color' => 'orange'],
            ['label' => 'Pages', 'count' => $stats['pages'], 'route' => 'admin.page.index', 'color' => 'cyan'],
            ['label' => 'Contact Messages', 'count' => $stats['contact_messages'], 'route' => 'admin.contact-message.index', 'color' => 'gray'],
        ];
    @endphp

    @foreach($cards as $card)
        <a href="{{ route($card['route']) }}" class="block bg-white rounded-lg shadow p-6 hover:shadow-md transition">
            <div class="text-sm font-medium text-gray-500">{{ $card['label'] }}</div>
            <div class="mt-2 text-3xl font-bold text-gray-900">{{ $card['count'] }}</div>
        </a>
    @endforeach
</div>
@endsection
