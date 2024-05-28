<?php

namespace PHPSTORM_META {

    use AndrewGos\TelegramBot\Api\Api;
    use AndrewGos\TelegramBot\Builder\ClassBuilderInterface;

    override(ClassBuilderInterface::build(0), map(['' => '@']));
    override(ClassBuilderInterface::buildArray(0), map(['' => '@[]']));
    override(Api::buildClassForResponse(0), map(['' => '@|null']));
    override(Api::buildClassArrayForResponse(0), map(['' => '@[]']));
}
