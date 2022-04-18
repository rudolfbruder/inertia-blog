<?php
namespace App\Repositories\Frontend\Posts;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function findById(int $id) : Post;

    public function findBySlug(string $slug): Post;

    public function getAll() : Collection;

    public function getPaginated();

    public function getAllActiveAndPublished()  : Collection;

    public function getAllActiveAndPublishedPaginated();
}