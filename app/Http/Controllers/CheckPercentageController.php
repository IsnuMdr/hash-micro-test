<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckPercentageController extends Controller
{
    public function index()
    {
        return view('check-percentage.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'input1' => 'required|string',
            'input2' => 'required|string',
        ]);

        $input1 = strtoupper($request->input('input1'));
        $input2 = strtoupper($request->input('input2'));

        $characters = str_split($input1); // Karakter Input 1
        $totalCharacters = count($characters); // Total Karakter di Input 1
        $sameCharacters = [];

        $matchCount = 0;

        foreach ($characters as $char) {
            if (strpos($input2, $char) !== false) {
                $matchCount++;
                array_push($sameCharacters, $char);
            }
        }

        // Hitung Persentase
        $percentage = ($matchCount / $totalCharacters) * 100;


        return view('check-percentage.result', [
            'input1' => $request->input1,
            'input2' => $request->input2,
            'percentage' => $percentage,
            'totalCharacters' => $totalCharacters,
            'sameCharacters' => $sameCharacters,
        ]);
    }
}
