<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserMessenger as UserMessengerResource;
use App\Models\Messenger;
use App\Models\User;
use Illuminate\Http\Request;

class UserMessengerController extends Controller
{

    /**
     * Get All User Messenger Configs
     */
    public function get(Request $request, $userId, User $user): UserMessengerResource
    {
        $this->authorize('update', $user);

        $userMessenger = Messenger::whereUserId($userId)->first();

        return new UserMessengerResource($userMessenger);
    }

}
