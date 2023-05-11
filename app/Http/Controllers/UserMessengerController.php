<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserMessengerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        $user = auth()->user();

        $this->authorize('api_messenger', $user);

        return view('users.messenger', ['user' => $user]);
    }

    /**
     * Generate a personal access messenger for the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $this->authorize('api_messenger', $user);

        $user->updateMessenger($request);

        return redirect()->route('users.messenger')->withSuccess(__('users.updated'));
    }
}
