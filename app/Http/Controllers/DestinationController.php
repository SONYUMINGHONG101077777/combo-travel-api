<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationOption;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * GET /api/destinations
     * GET /api/destinations?category=sea
     * Public — returns active destinations in display order, each with
     * its Resort/Camping options eager-loaded. Pass ?category= to filter
     * to a single category (sea, mountain, temple, island) — used by the
     * Sea / Mountain / Temple pages; omit it to get everything, like the
     * homepage grid does.
     */
    public function index(Request $request)
    {
        $query = Destination::where('is_active', true)->orderBy('order');

        if ($request->filled('category')) {
            $request->validate([
                'category' => 'in:sea,mountain,temple,island',
            ]);
            $query->where('category', $request->category);
        }

        $destinations = $query->with('options')->get();

        return response()->json([
            'destinations' => $destinations,
        ]);
    }

    /**
     * GET /api/destinations/{destination}
     * Public — a single destination with its options, in case the
     * dialog is ever loaded from a direct link instead of from the
     * already-fetched list.
     */
    public function show(Destination $destination)
    {
        $destination->load('options');

        return response()->json([
            'destination' => $destination,
        ]);
    }

    /**
     * POST /api/destinations
     * Admin — create a destination. Accepts an optional `options` array
     * to create its Resort/Camping sub-items in the same request.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|in:sea,mountain,temple,island',
            'description' => 'nullable|string',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'img' => 'nullable|string',
            'img1' => 'nullable|string',
            'img2' => 'nullable|string',
            'order' => 'sometimes|integer',
            'is_active' => 'sometimes|boolean',

            'options' => 'sometimes|array',
            'options.*.type' => 'required|in:Resort,Camping,Hotel,Means of transport',
            'options.*.img' => 'nullable|string',
            'options.*.text' => 'nullable|string',
            'options.*.order' => 'sometimes|integer',
        ]);

        $options = $data['options'] ?? [];
        unset($data['options']);

        $destination = Destination::create($data);

        foreach ($options as $option) {
            $destination->options()->create($option);
        }

        return response()->json([
            'message' => 'Destination created',
            'destination' => $destination->load('options'),
        ], 201);
    }

    /**
     * PUT /api/destinations/{destination}
     * Admin — update a destination's own fields. Options are managed
     * separately via the endpoints below.
     */
    public function update(Request $request, Destination $destination)
    {
        $data = $request->validate([
            'title' => 'sometimes|string',
            'category' => 'sometimes|in:sea,mountain,temple,island',
            'description' => 'nullable|string',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'img' => 'nullable|string',
            'img1' => 'nullable|string',
            'img2' => 'nullable|string',
            'order' => 'sometimes|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $destination->update($data);

        return response()->json([
            'message' => 'Destination updated',
            'destination' => $destination->load('options'),
        ]);
    }

    /**
     * DELETE /api/destinations/{destination}
     * Admin — deletes the destination and, via the migration's
     * cascadeOnDelete, its options too.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return response()->json([
            'message' => 'Destination deleted',
        ]);
    }

    /**
     * POST /api/destinations/{destination}/options
     * Admin — add a single Resort/Camping option to a destination.
     */
public function addOption(Request $request, Destination $destination)
{
    $data = $request->validate([
        'type' => 'required|in:Resort,Camping,Hotel,Means of transport',
        'img' => 'nullable|string',
        'text' => 'nullable|string',
        'order' => 'sometimes|integer',
    ]);

    $option = $destination->options()->create($data);

    return response()->json([
        'message' => 'Option added',
        'option' => $option,
    ], 201);
}



    /**
     * DELETE /api/destination-options/{option}
     * Admin — remove a single Resort/Camping option.
     */
    public function deleteOption(DestinationOption $option)
    {
        $option->delete();

        return response()->json([
            'message' => 'Option deleted',
        ]);
    }
    public function updateOption(Request $request, DestinationOption $option)
{
    $data = $request->validate([
        'type' => 'required|in:Resort,Camping,Hotel,Means of transport',
        'img' => 'nullable|string',
        'text' => 'nullable|string',
        'order' => 'sometimes|integer',
    ]);

    $option->update($data);

    return response()->json([
        'message' => 'Option updated',
        'option' => $option,
    ]);
}
}