<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Index', [
            'posts' => Post::with(['tags', 'category'])->active()->paginate(Post::PAGINATE_FE),
            'categories' => Category::inRandomOrder()->take(10)->get()
        ]);
    }

    public function show(Post $post)
    {
        $post->load('tags', 'category');

        return Inertia::render('Post/Show', [
            'post' => $post
        ]);
    }
}