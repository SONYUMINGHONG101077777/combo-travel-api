<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * GET /api/banners
     * Public — returns active banners in display order, for the
     * homepage Carousel. No auth required since this is public content.
     */
    public function index()
    {
        $banners = Banner::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'banners' => $banners,
        ]);
    }

    /**
     * POST /api/banners
     * Admin — create a new banner. Protect this route with an admin
     * middleware/guard once you have one; for now it just requires auth.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|string',
            'badge_text' => 'nullable|string',
            'title' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'sometimes|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $banner = Banner::create($data);

        return response()->json([
            'message' => 'Banner created',
            'banner' => $banner,
        ], 201);
    }

    /**
     * PUT /api/banners/{banner}
     * Admin — update an existing banner.
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'image' => 'sometimes|string',
            'badge_text' => 'nullable|string',
            'title' => 'sometimes|string',
            'link' => 'nullable|string',
            'order' => 'sometimes|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $banner->update($data);

        return response()->json([
            'message' => 'Banner updated',
            'banner' => $banner,
        ]);
    }

    /**
     * DELETE /api/banners/{banner}
     * Admin — remove a banner.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response()->json([
            'message' => 'Banner deleted',
        ]);
    }
}