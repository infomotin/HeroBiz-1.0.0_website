<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            ['name' => 'Politics', 'slug' => 'politics'],
            ['name' => 'Sports', 'slug' => 'sports'],
            ['name' => 'Entertainment', 'slug' => 'entertainment'],
        ];

        $createdCategories = collect();
        foreach ($categories as $category) {
            $createdCategories->push(BlogCategory::create($category));
        }

        // Create authors
        $authors = [
            ['name' => 'Maria Doe', 'email' => 'maria@example.com', 'bio' => 'Senior Political Analyst'],
            ['name' => 'Allisa Mayer', 'email' => 'allisa@example.com', 'bio' => 'Sports Journalist'],
            ['name' => 'Mark Dower', 'email' => 'mark@example.com', 'bio' => 'Entertainment Reporter'],
            ['name' => 'Lisa Neymar', 'email' => 'lisa@example.com', 'bio' => 'Sports Commentator'],
            ['name' => 'Denis Peterson', 'email' => 'denis@example.com', 'bio' => 'Political Correspondent'],
            ['name' => 'Mika Lendon', 'email' => 'mika@example.com', 'bio' => 'Entertainment Critic'],
        ];

        $createdAuthors = collect();
        foreach ($authors as $author) {
            $createdAuthors->push(BlogAuthor::create($author));
        }

        // Create tags (optional)
        $tags = [
            ['name' => 'Breaking', 'slug' => 'breaking'],
            ['name' => 'Update', 'slug' => 'update'],
            ['name' => 'Featured', 'slug' => 'featured'],
        ];

        $createdTags = collect();
        foreach ($tags as $tag) {
            $createdTags->push(BlogTag::create($tag));
        }

        // Get the created categories and authors for assignment
        $categoryIds = $createdCategories->pluck('id')->toArray();
        $authorIds = $createdAuthors->pluck('id')->toArray();
        $tagIds = $createdTags->pluck('id')->toArray();

        // Create 6 blog posts
        for ($i = 1; $i <= 6; $i++) {
            $post = BlogPost::create([
                'title' => "Post Title $i",
                'slug' => Str::slug("Post Title $i"),
                'excerpt' => "This is the excerpt for post number $i.",
                'content' => "<p>This is the full content of blog post number $i. It contains multiple paragraphs and some <strong>HTML</strong> for testing.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>",
                'featured_image' => "assets/img/blog/blog-{$i}.jpg",
                'author_id' => $authorIds[($i - 1) % count($authorIds)],
                'category_id' => $categoryIds[($i - 1) % count($categoryIds)],
                'published_at' => Carbon::now()->subDays($i * 10),
                'views' => rand(50, 500),
            ]);

            // Attach random tags (0 to 3 tags per post)
            if (!empty($tagIds)) {
                $count = rand(0, min(3, count($tagIds)));
                if ($count > 0) {
                    $post->tags()->attach(
                        array_rand($tagIds, $count)
                    );
                }
            }

            // Create a comment for the first post
            if ($i === 1) {
                BlogComment::create([
                    'post_id' => $post->id,
                    'name' => 'John Commenter',
                    'email' => 'john@example.com',
                    'content' => 'This is a test comment for the first blog post.',
                    'status' => 'approved',
                ]);
            }
        }
    }
}