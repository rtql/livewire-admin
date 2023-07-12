<?php

namespace App\Services\Interfaces;

use App\Models\Room;

/**
 * Interface EventServiceInterface
 * @package App\Services\Interfaces
 */
interface EventServiceInterface
{
    public function createRecurringEvents($requestData);
    public function createEvent($requestData);
    public function isRoomTaken($requestData);
    public function chargeHourlyRate($requestData, Room $room);
}
