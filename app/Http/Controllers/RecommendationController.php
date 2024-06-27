<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::all();
        return view('recommendations.index', compact('recommendations'));
    }

    public function create()
    {
        return view('recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Recommendation::create([
            'user_id' => auth()->id(), // Assuming the logged-in user is the one creating the recommendation
            'content' => $request->input('content'),
        ]);

        return redirect()->route('recommendations.index')->with('success', 'Recommendation created successfully.');
    }

    public function show(Recommendation $recommendation)
    {
        return view('recommendations.show', compact('recommendation'));
    }

    public function edit(Recommendation $recommendation)
    {
        return view('recommendations.edit', compact('recommendation'));
    }

    public function update(Request $request, Recommendation $recommendation)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $recommendation->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully.');
    }

    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();

        return redirect()->route('recommendations.index')->with('success', 'Recommendation deleted successfully.');
    }
}
