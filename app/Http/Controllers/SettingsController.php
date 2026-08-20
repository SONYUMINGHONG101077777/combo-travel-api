<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
 
    private function defaults(): array
    {
        return [
            'notifications' => [
                'email' => true,
                'push' => true,
                'tripReminders' => true,
                'marketing' => false,
            ],
            'preferences' => [
                'language' => 'km',
                'currency' => 'USD',
                'theme' => 'light',
            ],
            'privacy' => [
                'profileVisible' => true,
            ],
        ];
    }

    /**
     * GET /api/settings
     * Returns the user's saved settings, merged on top of the defaults
     * so a partially-saved settings blob (e.g. after adding a new field)
     * never produces missing keys on the frontend. `twoFactor` is pulled
     * from the real column and merged into the `privacy` block.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $saved = $user->settings ?? [];
        $merged = array_replace_recursive($this->defaults(), $saved);
        $merged['privacy']['twoFactor'] = (bool) $user->two_factor;

        return response()->json([
            'settings' => $merged,
        ]);
    }

    /**
     * PUT /api/settings
     * Accepts the full settings object (as shown by the Settings page).
     * `privacy.twoFactor`, if present, is written to the real `two_factor`
     * column; everything else is stored in the `settings` JSON column.
     */
    public function update(Request $request)
    {
        $request->validate([
            'notifications' => 'sometimes|array',
            'notifications.email' => 'sometimes|boolean',
            'notifications.push' => 'sometimes|boolean',
            'notifications.tripReminders' => 'sometimes|boolean',
            'notifications.marketing' => 'sometimes|boolean',

            'preferences' => 'sometimes|array',
            'preferences.language' => 'sometimes|in:km,en',
            'preferences.currency' => 'sometimes|in:USD,KHR',
            'preferences.theme' => 'sometimes|in:light,dark',

            'privacy' => 'sometimes|array',
            'privacy.twoFactor' => 'sometimes|boolean',
            'privacy.profileVisible' => 'sometimes|boolean',
        ]);

        $user = $request->user();
        $incoming = $request->all();

        // Pull twoFactor out before it touches the JSON blob — it belongs
        // to the real column instead.
        $twoFactor = $incoming['privacy']['twoFactor'] ?? null;
        unset($incoming['privacy']['twoFactor']);

        $merged = array_replace_recursive(
            array_replace_recursive($this->defaults(), $user->settings ?? []),
            $incoming
        );

        $update = ['settings' => $merged];
        if ($twoFactor !== null) {
            $update['two_factor'] = $twoFactor;
        }

        $user->update($update);

        $merged['privacy']['twoFactor'] = (bool) $user->two_factor;

        return response()->json([
            'message' => 'Settings updated',
            'settings' => $merged,
        ]);
    }
}