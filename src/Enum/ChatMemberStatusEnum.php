<?php

namespace AndrewGos\TelegramBot\Enum;

enum ChatMemberStatusEnum: string
{
    case Creator = 'creator';
    case Administrator = 'administrator';
    case Member = 'member';
    case Restricted = 'restricted';
    case Left = 'left';
    case Kicked = 'kicked';
}
