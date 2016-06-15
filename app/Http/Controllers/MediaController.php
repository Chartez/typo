<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\Comment;

use Auth;

use App\Http\Requests;

class MediaController extends Controller
{
    public function addLikes(Request $request, Card $card)
    {
        if($request->has('likes'))
        {
            $cards = $request->get('likes');
            $selectedCard = Card::find($cards);

            $selectedCard->likes()->create([
                'user_id' => Auth::id(),
                'card_id' => $cards,
            ]);

            return redirect()->back();
        }
    }

    public function addComments(Request $request, Card $card)
    {
        if($request->has('comments'))
        {
//            $this->validate($request, [
//                'comment_text' => 'requin:5'
//            ]);

            $status = $request->get('comments');
            $commentBox = $request->get('comment-text');
            $selectedStatus = Card::find($status);

            $selectedStatus->comments()->create([
                'user_id' => Auth::id(),
                'card_id' => $status,
                'comment_text' => $commentBox,

            ]);

            return redirect()->back()->with([
                'flash_message' => 'Comment posted!'
            ]);
        }
    }

}
