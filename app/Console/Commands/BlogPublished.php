<?php 

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BlogPublished extends Command
{
    protected $signature = 'blog:published';
    protected $description = 'Publish scheduled blog posts';

    public function handle()
    {
        $now = now()->setTimezone(config('app.timezone'));
        Log::info("Checking for scheduled blogs at: " . $now);

        $blogs = Blog::where('status', 'scheduled')
            ->where('published_at', '<=', $now)
            ->get();

        if ($blogs->isEmpty()) {
            Log::info("No blogs found to publish.");
            $this->info("No blogs to publish.");
            return;
        }

        foreach ($blogs as $blog) {
            Log::info("Publishing blog ID: {$blog->id}, Title: {$blog->title}");
            $blog->update(['status' => 'published']);
        }

        Log::info("Published {$blogs->count()} blogs.");
        $this->info("Successfully published {$blogs->count()} blogs.");
    }
}
