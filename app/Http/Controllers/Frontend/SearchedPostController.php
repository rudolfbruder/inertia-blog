<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Posts\PostRepositoryInterface;
use Inertia\Inertia;

class SearchedPostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(string $input)
    {
        return Inertia::render('Post/SearchResults', [
            'posts' => $this->postRepository->searchAllByTitle($input),
            'input' => $input
        ]);
    }
}