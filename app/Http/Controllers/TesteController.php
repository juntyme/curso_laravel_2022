<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    /**
     * Undocumented function
     *
     * @param integer $p1
     * @param integer $p2
     * @return void
     */
    public function teste(int $p1, int $p2)
    {
        // echo "A soma de $p1 + $p2 é: " . $p1 + $p2;
        // return view('site.teste', ['p1' => $p1, 'p2' => $p2]); // Array associativo
        //  return view('site.teste', compact('p1', 'p2')); // compact função nativa do php cria um array associativo
        return view('site.teste')->with('p1', $p1)->with('p2', $p2);
    }
}
