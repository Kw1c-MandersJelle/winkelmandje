<?php

namespace App\Enums;
enum OrderStatus: string
{
    case CART = 'cart';
    case ORDERED = 'ordered';
    case PENDING = 'pending';
    case SHIPPED = 'shipped';
    case COMPLETED = 'completed';
}
