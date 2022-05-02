<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Frontend\Posts\PostRepositoryInterface;
use Inertia\Inertia;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return Inertia::render('Post/Index', [
            'posts' => $this->postRepository->getAllActiveAndPublishedPaginated(),
            'categories' => Category::inRandomOrder()->take(10)->get()
        ]);
    }

    public function show($slug)
    {
        return Inertia::render('Post/Show', [
            'post' => $this->postRepository->findBySlug($slug)
        ]);
    }
}