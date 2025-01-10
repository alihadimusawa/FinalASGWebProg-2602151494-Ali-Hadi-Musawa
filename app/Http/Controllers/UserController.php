<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

use function Laravel\Prompts\alert;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->all();

        $userId = DB::table('users')->insertGetId([
            'name' => $data['name'],
            'instagram' => $data['instagram'],
            'mobile' => $data['mobile'],
            'status' => $data['status'],
            'password' => $data['password'],
            'gender' => $data['gender'],
            'coins' => '2000'
        ]);

        $hobbies = array_map(function ($hobby) use ($userId) {
            return [
                'userId' => $userId,
                'hobby' => $hobby,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $data['hobby']);

        DB::table('hobbies')->insert($hobbies);

        $avatar = [
            'userId' => $userId,
            'imageLink' => "https://static.vecteezy.com/system/resources/previews/002/002/403/non_2x/man-with-beard-avatar-character-isolated-icon-free-vector.jpg",
            'status' => "active",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table("avatars")->insert($avatar);


        // Attach the user ID to the redirect route as a query parameter
        return redirect()->route('register-payment', ['userId' => $userId])
            ->with('success', 'User registered successfully!');
    }


    public function updateCoin(Request $request)
    {
        $data = $request->all();

        // Update user 'coin' to the inserted coin value which is $data['money']
        DB::table("users")
            ->where('id', $data['userId'])
            ->update(['coins' => $data['money']]);

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $users = DB::table("users")->get();
        foreach ($users as $user) {
            if ($user->name == $data['username'] && $user->password == $data["password"]) {

                Session::put('user', $user);

                return redirect()->route("homepage");
            }
        }

        return redirect()->route("login");
    }

    public function sendFriendRequest(Request $request)
    {
        $targetUserId = $request->targetId;
        $currentUserId = Session::get('user')->id;

        $newFriend = [
            'friendId' => $currentUserId, 
            'targetUserId' => $targetUserId,
            'status' => 'waiting',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // validate if the current process has been done in the past or not
        $isValid = true; 
        $friends = DB::table('friends')->get();
        foreach ($friends as $friend) {
            if($friend->friendId == $newFriend['friendId'] && $friend->targetUserId == $newFriend['targetUserId'] ) {
                $isValid = false;
                break;
            }
        }


        if($isValid){
            try {
                DB::table('friends')->insert($newFriend);
            } catch (\Throwable $th) {
                dd($th);
            }
        }

        // what if i want to stay on the same page after all the operation above
        return redirect()->back();
    }
}
