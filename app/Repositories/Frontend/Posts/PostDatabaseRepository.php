<?php
namespace App\Repositories\Frontend\Posts;

use App\Models\Post;
use Illuminate\Support\Collection;

class PostDatabaseRepository implements PostRepositoryInterface
{
    public function findById(int $id) : Post
    {
        return Post::find($id);
    }

    public function findBySlug(string $slug): Post
    {
        return Post::whereSlug($slug)->first();
    }

    public function getAll() : Collection
    {
        return Post::all();
    }

    public function getPaginated()
    {
        return Post::paginate(Post::PAGINATE_FE);
    }

    public function getAllActiveAndPublished()  : Collection
    {
        return Post::active()->published()->get();
    }

    public function getAllActiveAndPublishedPaginated()
    {
        return Post::active()->published()->paginate(Post::PAGINATE_FE);
    }
}