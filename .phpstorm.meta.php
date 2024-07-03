<?php

namespace PHPSTORM_META {

    use AndrewGos\TelegramBot\Api\Api;

    override(Api::buildClassForResponse(0), map(['' => '@|null']));
    override(Api::buildClassArrayForResponse(0), map(['' => '@[]']));
}
