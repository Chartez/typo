<?php

namespace App\Http\Controllers;

use App\Card;
use App\Comment;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CardsController extends Controller
{
    public function index(Request $request)
    {
        $cards = Card::with(['comments'])->get();



        return view('pages.explore', compact('cards'));
    }

    public function show(Card $card)
    {
        $comments = Comment::where('card_id', $card->id)->get();
        return view('pages.single', compact('card', 'comments'));
    }

    public function store(Request $request, Card $card)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'headline' => 'required',
            'main_text' => 'required'
        ]);

        $card = new Card($request->all());
        $card->user_id = Auth::id();
        $card->save();

        return redirect('library')->with([
            'flash_message' => 'Your card has been created!'
        ]);
    }

    public function edit(Card $card)
    {
        return view('pages.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        $card->update($request->all());

        return redirect('library');
    }

    public function library()
    {
        $user = Auth::user();
        $cards = $user->cards()->get();

        return view('pages.library')->with(array('user' => $user, 'cards' => $cards));
    }

    public function destroy($card)
    {
        Card::destroy($card);

        return redirect('library')->with([
            'deleted_message' => 'Your card has been deleted!'
        ]);
    }
}
