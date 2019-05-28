<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\LikeEvent;

class LikeController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }


    public function LikeIt(Reply $reply)
    {
        $likeCheck = Like::where(['user_id' => auth()->user()->id, 'reply_id' => $reply->id])->first();

        $reply->likes()->create([
            'user_id' => Auth::id()
        ]);
        broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }


    public function UnlikeIt(Reply $reply)
    {
        $reply->likes()->where(['user_id' => Auth::id()])->first()->delete();
        broadcast(new LikeEvent($reply->id, 0))->toOthers();
    }
}
