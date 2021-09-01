<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rinvex\Subscriptions\Models\PlanSubscription;
use Stripe\Service\SubscriptionService;

class Subscription extends PlanSubscription
{
    use HasFactory;
    /**
     * @var SubscriptionService
     */
    private $subscriptionService;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->subscriptionService = SubscriptionService::class;
    }



}
