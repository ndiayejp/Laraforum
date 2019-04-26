<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function LikeIt(Reply $reply)
    {
        $reply->likes()->create([
            'user_id' => Auth::id()
        ]);
    }


    public function UnlikeIt(Reply $reply)
    {
        $reply->likes()->where(['user_id' => Auth::id()])->first()->delete();
    }
}
