<?php

namespace App\Services;

use App\Mail\SubscriptionMail;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanSubscription;

class SubscriptionService
{

//    public function __construct($user, $param)
//    {
//        $this->user = $
//    }

    /**
     * @param User $user
     * @param $planId
     * @param $name
     * @return Subscription|false
     */
    public function create(User $user, $planId, $name)
    {
        $plan = Plan::findOrFail($planId);
        /** @var Subscription $subscription */
        $subscription = $user->newSubscription($name, $plan);
        try {
            Mail::to($user->email)
                ->send(new SubscriptionMail($subscription, $user));
            Log::info("Send subscription mail - subscription.id : " . $subscription->id);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return $subscription;
    }

    public function list(User $user)
    {
        return $user->activeSubscriptions();
    }


}
