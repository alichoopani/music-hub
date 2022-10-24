<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $likes = Like::query()
            ->with([
                'likeable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Album::class,
                        Track::class
                    ]);
                }])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $bookmarks = Bookmark::query()
            ->with([
                'bookmarkable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Album::class,
                        Track::class
                    ]);
                }])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $followedArtists = Follow::query()
            ->with([
                'followable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Artist::class,
                    ]);
                }])
            ->where('followable_type', '=', 'App\\Models\\Artist')
            ->byId(Auth::id())
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $followedCategories = Follow::query()
            ->with([
                'followable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Category::class,
                    ]);
                }])
            ->where('followable_type', '=', 'App\\Models\\Category')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        return view('auth.profile',
            [
                'profile' => \Auth::user(),
                'likes' => $likes,
                'bookmarks' => $bookmarks,
                'followedArtists' => $followedArtists,
                'followedCategories' => $followedCategories
            ]);
    }

    public function updateIndex()
    {
        $profile = User::findOrFail(\auth()->user()->id);

        return view('auth.edit-profile', ['profile' => $profile]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validation = Validator::make($request->all(), [
            'username' => 'nullable|string',
            'email' => 'unique:users,email,' . $user->id
        ]);

        if (!$validation->fails()) {
            if($request->file('avatar')) {
                $file = $request->file('avatar')->store('public/user');
                $filename = substr($file, 7);
            }

            $user->update([
                'username' => $request->get('username') ?? $user->username,
                'avatar'=> $filename ?? $user->avatar,
                'email' => $request->get('email') ?? $user->email
            ]);
            return \redirect('profile');
        }
        return \redirect()->back()->withErrors($validation->errors())->withInput();
    }
}
