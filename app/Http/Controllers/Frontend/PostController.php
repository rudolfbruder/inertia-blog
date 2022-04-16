<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Index', [
            'posts' => Post::active()->paginate(Post::PAGINATE_FE)
        ]);
    }
}