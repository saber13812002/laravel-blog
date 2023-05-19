<?php

namespace App\Http\Controllers;

use App\Helpers\MessengerHelper;
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

        $messenger = $user->updateMessenger($request);

        if ($request['test_content'])
            MessengerHelper::send($request['test_content'], $user->id);

        return redirect()->route('users.messenger')->withSuccess(__('users.updated'));
    }
}
