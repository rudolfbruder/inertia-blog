<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Frontend\Posts\PostRepositoryInterface;
use Inertia\Inertia;
use JeroenG\Explorer\Domain\Syntax\Matching;
use JeroenG\Explorer\Domain\Syntax\Nested;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        dd(Post::search('de')
        ->must(new Nested('category', new Matching('category.title', 'Decentralized secondary projection')))
        ->get());
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