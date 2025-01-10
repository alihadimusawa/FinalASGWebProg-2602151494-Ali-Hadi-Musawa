<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class pageController extends Controller
{
    public function homepage()
    {
        $users = User::with(['avatars', 'hobby'])->get();
        $currentUser = Session::get('user');
        // dd($currentUser);
        return view('homepage')->with("users", $users)->with('currentUser', $currentUser);
    }

    public function notification()
    {
        $currentUserId = 2;

        $friendRequests = DB::table('friends')
            ->join('users', 'friends.friendId', '=', 'users.id')
            ->leftJoin('hobbies', 'users.id', '=', 'hobbies.userId')
            ->leftJoin('avatars', function ($join) {
                $join->on('users.id', '=', 'avatars.userId')
                    ->where('avatars.status', 'active');
            })
            ->where('friends.targetUserId', $currentUserId)
            ->where('friends.status', 'waiting')
            ->select(
                'users.name',
                'avatars.imageLink',
                'hobbies.hobby'
            )
            ->get();

        // Now group hobbies by user
        $friendsWaiting = $friendRequests->groupBy('name')->map(function ($friend) {
            return [
                'imageLink' => $friend->first()->imageLink,
                'hobbies' => $friend->pluck('hobby')->toArray()
            ];
        });

        return view('notification')->with('friendsWaiting', $friendsWaiting);
    }
}
