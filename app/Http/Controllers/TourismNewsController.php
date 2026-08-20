<?php

namespace App\Http\Controllers;

use App\Models\TourismNews;
use Illuminate\Http\Request;

class TourismNewsController extends Controller
{
    // GET /api/tourism-news?limit=2
    public function index(Request $request)
    {
        $limit = (int) $request->query('limit', 10);

        $news = TourismNews::where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderByDesc('created_at')
            ->take($limit)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $news,
        ]);
    }

    // GET /api/tourism-news/{id}
    public function show($id)
    {
        $news = TourismNews::find($id);

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $news,
        ]);
    }

    // POST /api/tourism-news
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $news = TourismNews::create($validated);

        return response()->json([
            'success' => true,
            'data' => $news,
        ], 201);
    }

    // PUT/PATCH /api/tourism-news/{id}
    public function update(Request $request, $id)
    {
        $news = TourismNews::find($id);

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found',
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'sometimes|required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $news->update($validated);

        return response()->json([
            'success' => true,
            'data' => $news,
        ]);
    }

    // DELETE /api/tourism-news/{id}
    public function destroy($id)
    {
        $news = TourismNews::find($id);

        if (!$news) {
            return response()->json([
                'success' => false,
                'message' => 'News not found',
            ], 404);
        }

        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully',
        ]);
    }
}