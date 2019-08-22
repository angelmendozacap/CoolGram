<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProfilesRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $follows = Auth::user() ? Auth::user()->following->contains($user->id) : false;

        $postsCount = Cache::remember(
            'count.posts.'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingsCount = Cache::remember(
            'count.following.'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profiles.index')->with(compact('user', 'follows', 'postsCount', 'followersCount', 'followingsCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit')->with(compact('user'));
    }

    public function update(StoreProfilesRequest $request, User $user)
    {
        $this->authorize('update', $user->profile);

        $imagePath = null;

        if ($request['image']) {
            $imagePath = $request['image']->store('profiles/'.Auth::user()->id, 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
        }

        Auth::user()->profile->update(array_merge(
            $request->all(), ['image' => $imagePath]
        ));

        return redirect()->route('profile.show', ['user' => $user->id]);
    }
}
