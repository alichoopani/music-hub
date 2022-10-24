<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Follow;
use App\Models\Track;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $popularCategories = Category::query()
            ->withCount('follows')
            ->orderByDesc('follows_count')
            ->paginate(6);

        return view('categories.index',
            [
                'categories' => $categories,
                'popularCategories' => $popularCategories
            ]);
    }

    public function category($id)
    {
        $categories = Category::query()
            ->findOrFail($id);

        $trackList = Track::query()
            ->where('approve', 1)
            ->where('category_id', $id)
            ->paginate(9);


        $category_id = Category::query()
            ->where('id', $id)
            ->pluck('id');

        $countTracks = Track::query()
            ->where('category_id', '=', $category_id)
            ->where('approve', 1)
            ->inRandomOrder()
            ->count();

        $countFollows = Follow::query()
            ->where('followable_id', $id)
            ->count();

        return view('categories.detail',
            [
                'trackList' => $trackList,
                'categories' => $categories,
                'countTracks' => $countTracks,
                'countFollows' => $countFollows
            ]);
    }
}
