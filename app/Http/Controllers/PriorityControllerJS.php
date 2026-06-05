<?php

namespace App\Http\Controllers;

use App\Models\PriorityJS;
use Illuminate\Http\Request;

class PriorityControllerJS extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $priorities = PriorityJS::orderBy('level')->get();
        return view('priorities.index', compact('priorities'));
    }

    public function create()
    {
        return view('priorities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:priorities',
            'level' => 'required|integer|min:1|max:5'
        ]);

        PriorityJS::create($validated);
        return redirect()->route('priorities.index')->with('success', 'Priority created!');
    }

    public function edit(PriorityJS $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    public function update(Request $request, PriorityJS $priority)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:priorities,name,' . $priority->id,
            'level' => 'required|integer|min:1|max:5'
        ]);

        $priority->update($validated);
        return redirect()->route('priorities.index')->with('success', 'Priority updated!');
    }

    public function destroy(PriorityJS $priority)
    {
        $priority->delete();
        return redirect()->route('priorities.index')->with('success', 'Priority deleted!');
    }
}
