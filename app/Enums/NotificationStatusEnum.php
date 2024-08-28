<?php

namespace App\Enums;

enum NotificationStatusEnum : string
{
    case NOT_SENT = 'NOT_SENT';
    case SENT = 'SENT';
    case FAILED = 'FAILED';

}
