<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\PortfolioCategory;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogAuthor;
use App\Models\BlogPost;
use App\Models\BlogComment;
use App\Models\Pricing;
use App\Models\Faq;
use App\Models\Client;
use App\Models\Page;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Models\AboutSection;
use App\Models\AboutTab;
use App\Models\CallToAction;
use App\Models\OnfocusSection;
use App\Models\Feature;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AllContentSeeder extends Seeder
{
    public function run(): void
    {
        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'HeroBiz'],
            ['key' => 'site_tagline', 'value' => 'Business Template'],
            ['key' => 'contact_address', 'value' => 'A108 Adam Street, New York, NY 535022'],
            ['key' => 'contact_phone', 'value' => '+1 5589 55488 55'],
            ['key' => 'contact_email', 'value' => 'info@example.com'],
            ['key' => 'social_twitter', 'value' => '#'],
            ['key' => 'social_facebook', 'value' => '#'],
            ['key' => 'social_instagram', 'value' => '#'],
            ['key' => 'social_linkedin', 'value' => '#'],
            ['key' => 'footer_copyright', 'value' => 'MyWebsite'],
            ['key' => 'google_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621'],
        ];
        foreach ($settings as $s) {
            Setting::create($s);
        }

        // Hero
        Hero::create([
            'title' => 'Welcome to <span>HeroBiz</span>',
            'subtitle' => 'Et voluptate esse accusantium accusamus natus reiciendis quidem voluptates similique aut.',
            'image' => 'assets/img/hero-img.svg',
            'video_url' => 'https://www.youtube.com/watch?v=Y7f98aduVJ8',
            'btn_text' => 'Get Started',
            'btn_link' => '#about',
            'video_btn_text' => 'Watch Video',
            'is_active' => true,
        ]);

        // About Section
        $about = AboutSection::create([
            'title' => 'About Us',
            'subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            'image' => 'assets/img/about-portrait.jpg',
            'heading' => 'Neque officiis dolore maiores et exercitationem quae est seda lidera pat claero',
            'is_active' => true,
        ]);

        $tabs = [
            ['title' => 'Saepe fuga', 'content' => '<p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p><div class="d-flex align-items-center mt-4"><i class="bi bi-check2"></i><h4>Repudiandae rerum velit modi et officia quasi facilis</h4></div><p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p><div class="d-flex align-items-center mt-4"><i class="bi bi-check2"></i><h4>Incidunt non veritatis illum ea ut nisi</h4></div><p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur.</p><div class="d-flex align-items-center mt-4"><i class="bi bi-check2"></i><h4>Omnis ab quia nemo dignissimos rem eum quos..</h4></div><p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam.</p>', 'sort_order' => 1],
            ['title' => 'Voluptates', 'content' => '<p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita.</p><div class="d-flex align-items-center mt-4"><i class="bi bi-check2"></i><h4>Repudiandae rerum velit modi</h4></div><p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis.</p>', 'sort_order' => 2],
            ['title' => 'Corrupti', 'content' => '<p class="fst-italic">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita.</p><div class="d-flex align-items-center mt-4"><i class="bi bi-check2"></i><h4>Incidunt non veritatis illum ea ut nisi</h4></div><p>Non quod totam minus repellendus autem sint velit.</p>', 'sort_order' => 3],
        ];
        foreach ($tabs as $tab) {
            AboutTab::create($tab);
        }

        // Featured Services (icon cards on homepage)
        $featuredServices = [
            ['icon' => 'bi bi-activity', 'title' => 'Lorem Ipsum', 'description' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi', 'sort_order' => 1],
            ['icon' => 'bi bi-bounding-box-circles', 'title' => 'Sed ut perspici', 'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'sort_order' => 2],
            ['icon' => 'bi bi-calendar4-week', 'title' => 'Magni Dolores', 'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia', 'sort_order' => 3],
            ['icon' => 'bi bi-broadcast', 'title' => 'Nemo Enim', 'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis', 'sort_order' => 4],
        ];
        foreach ($featuredServices as $s) {
            Service::create($s);
        }

        // Clients
        for ($i = 1; $i <= 6; $i++) {
            Client::create([
                'name' => "Client $i",
                'logo' => "assets/img/clients/client-$i.png",
                'website' => '#',
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }

        // Call to Action
        CallToAction::create([
            'heading' => 'Alias sunt quas <em>Cupiditate</em> oluptas hic minima',
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'btn_text' => 'Call To Action',
            'btn_link' => '#',
            'image' => 'assets/img/cta.jpg',
            'is_active' => true,
        ]);

        // Onfocus Section
        OnfocusSection::create([
            'heading' => 'Voluptatem dignissimos provident quasi corporis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'checklist_items' => [
                'Ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'Duis aute irure dolor in reprehenderit in voluptate velit.',
                'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.',
            ],
            'video_url' => 'https://www.youtube.com/watch?v=Y7f98aduVJ8',
            'btn_text' => 'Read More',
            'btn_link' => '#',
            'is_active' => true,
        ]);

        // Features (6 tabbed features)
        $featureColors = ['#0dcaf0', '#6610f2', '#20c997', '#df1529', '#0d6efd', '#fd7e14'];
        $featureData = [
            ['title' => 'Modinest', 'icon' => 'bi bi-binoculars', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'content' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'checklist_items' => ['Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.', 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.'], 'image' => 'assets/img/features-1.svg'],
            ['title' => 'Undaesenti', 'icon' => 'bi bi-box-seam', 'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'checklist_items' => ['Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.', 'Provident mollitia neque rerum asperiores dolores quos qui a.'], 'image' => 'assets/img/features-2.svg'],
            ['title' => 'Pariatur', 'icon' => 'bi bi-brightness-high', 'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'checklist_items' => ['Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.'], 'image' => 'assets/img/features-3.svg'],
            ['title' => 'Nostrum', 'icon' => 'bi bi-command', 'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'checklist_items' => ['Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.'], 'image' => 'assets/img/features-4.svg'],
            ['title' => 'Adipiscing', 'icon' => 'bi bi-easel', 'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'checklist_items' => ['Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.'], 'image' => 'assets/img/features-5.svg'],
            ['title' => 'Reprehit', 'icon' => 'bi bi-map', 'description' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'checklist_items' => ['Ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Duis aute irure dolor in reprehenderit in voluptate velit.'], 'image' => 'assets/img/features-6.svg'],
        ];
        foreach ($featureData as $i => $f) {
            Feature::create(array_merge($f, [
                'color' => $featureColors[$i],
                'is_active' => true,
                'sort_order' => $i + 1,
            ]));
        }

        // Service Details (detailed service cards with images)
        $serviceDetails = [
            ['title' => 'Nesciunt Mete', 'description' => 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis.', 'icon' => 'bi bi-activity', 'image' => 'assets/img/services-1.jpg'],
            ['title' => 'Eosle Commodi', 'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.', 'icon' => 'bi bi-broadcast', 'image' => 'assets/img/services-2.jpg'],
            ['title' => 'Ledo Markt', 'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.', 'icon' => 'bi bi-easel', 'image' => 'assets/img/services-3.jpg'],
            ['title' => 'Asperiores Commodit', 'description' => 'Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.', 'icon' => 'bi bi-bounding-box-circles', 'image' => 'assets/img/services-4.jpg'],
            ['title' => 'Velit Doloremque', 'description' => 'Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.', 'icon' => 'bi bi-calendar4-week', 'image' => 'assets/img/services-5.jpg'],
            ['title' => 'Dolori Architecto', 'description' => 'Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.', 'icon' => 'bi bi-chat-square-text', 'image' => 'assets/img/services-6.jpg'],
        ];
        $serviceId = 1;
        foreach ($serviceDetails as $sd) {
            ServiceDetail::create(array_merge($sd, ['service_id' => $serviceId]));
            $serviceId++;
            if ($serviceId > 4) $serviceId = 1;
        }

        // Testimonials
        $testimonialData = [
            ['name' => 'Saul Goodman', 'role' => 'Ceo & Founder', 'image' => 'assets/img/testimonials/testimonials-1.jpg', 'content' => 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.', 'rating' => 5],
            ['name' => 'Sara Wilsson', 'role' => 'Designer', 'image' => 'assets/img/testimonials/testimonials-2.jpg', 'content' => 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.', 'rating' => 5],
            ['name' => 'Jena Karlis', 'role' => 'Store Owner', 'image' => 'assets/img/testimonials/testimonials-3.jpg', 'content' => 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.', 'rating' => 5],
            ['name' => 'Matt Brandon', 'role' => 'Freelancer', 'image' => 'assets/img/testimonials/testimonials-4.jpg', 'content' => 'Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.', 'rating' => 5],
            ['name' => 'John Larson', 'role' => 'Entrepreneur', 'image' => 'assets/img/testimonials/testimonials-5.jpg', 'content' => 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.', 'rating' => 5],
        ];
        foreach ($testimonialData as $i => $t) {
            Testimonial::create(array_merge($t, ['is_active' => true, 'sort_order' => $i + 1]));
        }

        // Pricing
        $pricingData = [
            ['name' => 'Free Plan', 'price' => 0, 'features' => ['Quam adipiscing vitae proin', 'Nec feugiat nisl pretium', 'Nulla at volutpat diam uteera'], 'is_featured' => false],
            ['name' => 'Business Plan', 'price' => 29, 'features' => ['Quam adipiscing vitae proin', 'Nec feugiat nisl pretium', 'Nulla at volutpat diam uteera', 'Pharetra massa massa ultricies', 'Massa ultricies mi quis hendrerit'], 'is_featured' => true],
            ['name' => 'Developer Plan', 'price' => 49, 'features' => ['Quam adipiscing vitae proin', 'Nec feugiat nisl pretium', 'Nulla at volutpat diam uteera', 'Pharetra massa massa ultricies', 'Massa ultricies mi quis hendrerit'], 'is_featured' => false],
        ];
        foreach ($pricingData as $i => $p) {
            Pricing::create(array_merge($p, [
                'period' => '/ month',
                'btn_text' => 'Buy Now',
                'is_active' => true,
                'sort_order' => $i + 1,
            ]));
        }

        // FAQs
        $faqData = [
            ['question' => 'Non consectetur a erat nam at lectus urna duis?', 'answer' => 'Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.'],
            ['question' => 'Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?', 'answer' => 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.'],
            ['question' => 'Dolor sit amet consectetur adipiscing elit pellentesque?', 'answer' => 'Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.'],
        ];
        foreach ($faqData as $i => $f) {
            Faq::create(array_merge($f, ['is_active' => true, 'sort_order' => $i + 1]));
        }

        // Portfolio Categories & Portfolios
        $categories = ['App', 'Product', 'Branding', 'Books'];
        $portfolioCategories = collect();
        foreach ($categories as $cat) {
            $portfolioCategories->push(PortfolioCategory::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]));
        }

        $portfolioItems = [
            ['title' => 'App 1', 'image' => 'assets/img/portfolio/app-1.jpg', 'category_index' => 0],
            ['title' => 'Product 1', 'image' => 'assets/img/portfolio/product-1.jpg', 'category_index' => 1],
            ['title' => 'Branding 1', 'image' => 'assets/img/portfolio/branding-1.jpg', 'category_index' => 2],
            ['title' => 'Books 1', 'image' => 'assets/img/portfolio/books-1.jpg', 'category_index' => 3],
            ['title' => 'App 2', 'image' => 'assets/img/portfolio/app-2.jpg', 'category_index' => 0],
            ['title' => 'Product 2', 'image' => 'assets/img/portfolio/product-2.jpg', 'category_index' => 1],
            ['title' => 'Branding 2', 'image' => 'assets/img/portfolio/branding-2.jpg', 'category_index' => 2],
            ['title' => 'Books 2', 'image' => 'assets/img/portfolio/books-2.jpg', 'category_index' => 3],
            ['title' => 'App 3', 'image' => 'assets/img/portfolio/app-3.jpg', 'category_index' => 0],
            ['title' => 'Product 3', 'image' => 'assets/img/portfolio/product-3.jpg', 'category_index' => 1],
            ['title' => 'Branding 3', 'image' => 'assets/img/portfolio/branding-3.jpg', 'category_index' => 2],
            ['title' => 'Books 3', 'image' => 'assets/img/portfolio/books-3.jpg', 'category_index' => 3],
        ];
        foreach ($portfolioItems as $pi) {
            Portfolio::create([
                'title' => $pi['title'],
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'image' => $pi['image'],
                'category_id' => $portfolioCategories[$pi['category_index']]->id,
            ]);
        }

        // Team Members
        $teamData = [
            ['name' => 'Walter White', 'role' => 'Chief Executive Officer', 'image' => 'assets/img/team/team-1.jpg'],
            ['name' => 'Sarah Jhonson', 'role' => 'Product Manager', 'image' => 'assets/img/team/team-2.jpg'],
            ['name' => 'William Anderson', 'role' => 'CTO', 'image' => 'assets/img/team/team-3.jpg'],
        ];
        foreach ($teamData as $i => $t) {
            Team::create(array_merge($t, ['is_active' => true, 'sort_order' => $i + 1]));
        }

        // Blog (reuse BlogSectionSeeder logic)
        $blogCategories = [
            ['name' => 'Politics', 'slug' => 'politics'],
            ['name' => 'Sports', 'slug' => 'sports'],
            ['name' => 'Entertainment', 'slug' => 'entertainment'],
        ];
        $createdCategories = collect();
        foreach ($blogCategories as $cat) {
            $createdCategories->push(BlogCategory::create($cat));
        }

        $authors = [
            ['name' => 'Maria Doe', 'email' => 'maria@example.com', 'bio' => 'Senior Political Analyst'],
            ['name' => 'Allisa Mayer', 'email' => 'allisa@example.com', 'bio' => 'Sports Journalist'],
            ['name' => 'Mark Dower', 'email' => 'mark@example.com', 'bio' => 'Entertainment Reporter'],
        ];
        $createdAuthors = collect();
        foreach ($authors as $author) {
            $createdAuthors->push(BlogAuthor::create($author));
        }

        $tags = [
            ['name' => 'Breaking', 'slug' => 'breaking'],
            ['name' => 'Update', 'slug' => 'update'],
            ['name' => 'Featured', 'slug' => 'featured'],
        ];
        $createdTags = collect();
        foreach ($tags as $tag) {
            $createdTags->push(BlogTag::create($tag));
        }

        $categoryIds = $createdCategories->pluck('id')->toArray();
        $authorIds = $createdAuthors->pluck('id')->toArray();

        for ($i = 1; $i <= 6; $i++) {
            $post = BlogPost::create([
                'title' => "Dolorum optio tempore voluptas dignissimos $i",
                'slug' => Str::slug("dolorum-optio-tempore-voluptas-dignissimos-$i"),
                'excerpt' => 'This is the excerpt for post number $i.',
                'content' => '<p>This is the full content of blog post number $i. It contains multiple paragraphs and some <strong>HTML</strong> for testing.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
                'featured_image' => "assets/img/blog/blog-$i.jpg",
                'author_id' => $authorIds[($i - 1) % count($authorIds)],
                'category_id' => $categoryIds[($i - 1) % count($categoryIds)],
                'published_at' => Carbon::now()->subDays($i * 10),
                'views' => rand(50, 500),
            ]);

            $randomTags = $createdTags->random(min(2, count($tags)));
            $post->tags()->attach($randomTags->pluck('id')->toArray());
        }

        // Contact Messages (sample)
        ContactMessage::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Inquiry about services',
            'message' => 'Hello, I would like to know more about your services.',
            'status' => 'unread',
        ]);

        // Pages
        Page::create([
            'title' => 'About Us',
            'slug' => 'about-us',
            'content' => 'About us page content goes here.',
            'is_active' => true,
        ]);
        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => 'Privacy policy content goes here.',
            'is_active' => true,
        ]);
    }
}
