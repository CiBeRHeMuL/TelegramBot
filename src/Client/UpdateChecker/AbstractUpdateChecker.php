<?php

namespace AndrewGos\TelegramBot\Client\UpdateChecker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

abstract class AbstractUpdateChecker implements UpdateCheckerInterface
{
    /**
     * Calculate update type from update
     *
     * @param Update $update
     *
     * @return UpdateTypeEnum|null
     */
    protected function getUpdateType(Update $update): UpdateTypeEnum|null
    {
        return match (true) {
            $update->getBusinessConnection() !== null => UpdateTypeEnum::BusinessConnection,
            $update->getBusinessMessage() !== null => UpdateTypeEnum::BusinessMessage,
            $update->getCallbackQuery() !== null => UpdateTypeEnum::CallbackQuery,
            $update->getChannelPost() !== null => UpdateTypeEnum::ChannelPost,
            $update->getChatBoost() !== null => UpdateTypeEnum::ChatBoost,
            $update->getChatJoinRequest() !== null => UpdateTypeEnum::ChatJoinRequest,
            $update->getChatMember() !== null => UpdateTypeEnum::ChatMember,
            $update->getChosenInlineResult() !== null => UpdateTypeEnum::ChosenInlineResult,
            $update->getDeletedBusinessMessages() !== null => UpdateTypeEnum::DeletedBusinessMessages,
            $update->getEditedBusinessMessage() !== null => UpdateTypeEnum::EditedBusinessMessage,
            $update->getEditedChannelPost() !== null => UpdateTypeEnum::EditedChannelPost,
            $update->getEditedMessage() !== null => UpdateTypeEnum::EditedMessage,
            $update->getInlineQuery() !== null => UpdateTypeEnum::InlineQuery,
            $update->getMessage() !== null => UpdateTypeEnum::Message,
            $update->getMessageReaction() !== null => UpdateTypeEnum::MessageReaction,
            $update->getMessageReactionCount() !== null => UpdateTypeEnum::MessageReactionCount,
            $update->getMyChatMember() !== null => UpdateTypeEnum::MyChatMember,
            $update->getPoll() !== null => UpdateTypeEnum::Poll,
            $update->getPollAnswer() !== null => UpdateTypeEnum::PollAnswer,
            $update->getPreCheckoutQuery() !== null => UpdateTypeEnum::PreCheckoutQuery,
            $update->getRemovedChatBoost() !== null => UpdateTypeEnum::RemovedChatBoost,
            $update->getShippingQuery() !== null => UpdateTypeEnum::ShippingQuery,
            default => null,
        };
    }
}
