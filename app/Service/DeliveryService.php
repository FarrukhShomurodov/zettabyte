<?php

namespace App\Service;

use App\Models\Delivery;

class DeliveryService
{
    public function index()
    {
        return Delivery::query()->get();
    }

    public function store($validated)
    {
        return Delivery::query()->create($validated);
    }

    public function update(Delivery $delivery, $validated)
    {
        $delivery->update($validated);
        return $delivery;
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return $delivery;
    }
}
