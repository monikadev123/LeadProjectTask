<?php
namespace App\Enums;

enum LeadStatus: string
{
    case NEW = 'new';
    case ACCEPTED = 'accepted';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';
    case INVALID = 'invalid';
}
