<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Entities\Favorites;

class FavoritesController extends Controller
{
    public function index() {
           
        $favorites = Favorites::with('posts')->where('user_id', 1)->get();

        return view('favorites.index', [
            'favorites' => $favorites
        ]);

    }

    public function destroy($favorites_id) {

        try
        {
            DB::table('favorites')->where('id', $favorites_id)->delete();   

            session()->flash('output', [
                'success' => true,
                'message' => 'Favorito deletado.',
                'type'    => 'is-success'
            ]);
        }
        catch(Exception $e)
        {
            session()->flash('output', [
                'success' => false,
                'message' => $e->getMessage(),
                'type'    => 'is-danger'
            ]);
        }

        return redirect()->back();
    }

    public function store($user_id, $post_id) {

        try
        {
        
            $favorites = new Favorites;

            $favorites->user_id = $user_id;
            $favorites->post_id = $post_id;

            $favorites->save();

            session()->flash('output', [
                'success'   => true,
                'message'   => 'Post adicionado ao seus favoritos.',
                'type'      => 'is-success'
            ]);

            
        }
        catch (Exception $e) {
            dd($e->getMessage());
        }
        
        return redirect()->back();

    }

}
