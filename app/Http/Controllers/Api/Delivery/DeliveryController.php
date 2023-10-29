<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Http\Resources\DeliveryResponce;
use App\Models\Delivery;
use App\Service\DeliveryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DeliveryController extends Controller
{
    protected DeliveryService $deliveryService;

    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function index(): AnonymousResourceCollection
    {
        $deliveries = $this->deliveryService->index();
        return DeliveryResponce::collection($deliveries);
    }

    public function store(DeliveryRequest $request): DeliveryResponce
    {
        $delivery = $this->deliveryService->store($request->validated());
        return DeliveryResponce::make($delivery);
    }

    public function update(Delivery $delivery, DeliveryRequest $request): DeliveryResponce
    {
        $this->deliveryService->update($delivery, $request->validated());
        return DeliveryResponce::make($delivery);
    }

    public function destroy(Delivery $delivery): \Illuminate\Foundation\Application|Response|Application|ResponseFactory
    {
        $this->deliveryService->destroy($delivery);
        return response('delivery has been deleted', 400);
    }
}
