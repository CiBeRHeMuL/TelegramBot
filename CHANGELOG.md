# Change log of Telegram Bot Library

## [Unreleased]

### Changed

- Change `Api::send()` visibility from `private` to `protected` to allow method overriding in subclasses

## [4.7.1] - 2026-06-15

### Fixed

- Disable `new_expression_parentheses` PHP-CS-Fixer rule entirely to prevent false positives across all PHP versions

## [4.7.0]

### Added

- Add full test suite infrastructure: TestHttpClient (PSR-18 mock), shared BaseFixtureGenerator, reflection-based generators for Entity/Request/Response/API fixtures
- Add 295 EntityDeserializationTest, 173 RequestConstructionTest, 84 ResponseConstructionTest via AbstractFixtureConstructionTest
- Add ApiUnitTest with DataProvider covering 177 API methods via TestHttpClient pipeline
- Add EntityComplexFixturesTest with real Telegram API responses: 28 Message entities (7 overlapping groups), 43 RichMessage blocks (all types, deep nesting to 4 levels)
- Add ValueObject tests for EncodedJson, CallbackData, IpV4, IpV6, Filename, Language (all 11 ValueObjects covered)
- Add Kernel unit tests: Request, LogMiddleware, LogPlugin, LogRequestHandler, Events, UpdateSources (Array, CustomInput)
- Add CI/CD pipeline (.github/workflows/ci.yml): PHP 8.2/8.3/8.4 matrix, cs-check, phpstan, phpunit+clover, codecov upload
- Add coverage configuration to phpunit.xml.dist (Clover + HTML reports, exclude Entity/Request/Response/Enum/HttpClient)
- Add README/COVERAGE.md with P0-P4 priority strategy
- Add CI and Codecov badges to README.md
- Add Bot API 10.1 support: 6 new enums (RichTextTypeEnum, RichBlockTypeEnum, ChatJoinRequestResultEnum, RichBlockTableCellAlignEnum, RichBlockTableCellVerticalAlignEnum, RichBlockListItemTypeEnum)
- Add 2 abstract base classes (AbstractRichText, AbstractRichBlock) and ~55 concrete entity classes for rich messages
- Add 4 request/response classes (SendRichMessageRequest/Response, SendRichMessageDraftRequest, AnswerChatJoinRequestQueryRequest, SendChatJoinRequestWebAppRequest)
- Add 4 new API methods (sendRichMessage, sendRichMessageDraft, answerChatJoinRequestQuery, sendChatJoinRequestWebApp)
- Add fields to existing entities: Message.rich_message, User.supports_join_request_queries, ChatFullInfo.guard_bot, ChatJoinRequest.query_id, PollMedia.link, EditMessageTextRequest.rich_message
- Add InputRichMessageContent to AbstractInputMessageContent inheritors, InputMediaLink to InputPollOptionMediaInterface inheritors
- Add semantic documentation markup across the entire codebase: `@moduleContract` PHPDoc blocks, `// region`/`// endregion` semantic tags, `GREP_SUMMARY`, and `STRUCTURE` mini block diagrams for all 686+ source files
- Create 24+ `_module_contract.php` namespace contract files for all namespaces under `src/`
- Add semantic markup to `src/Request/RequestInterface.php`
- Add PHPStan static analysis config (`phpstan.neon`, level 2) as dev dependency

### Changed

- Add `declare(strict_types=1)` to all 710 source files without it (now 100% coverage)
- Update dependencies: phpunit 11.5.46→11.5.55 (CVE fix), php-cs-fixer 3.95.2→3.95.5, class-builder 1.3.3→1.3.4, serializer 1.3.0→1.3.1
- Replace regex-based phone validation with `giggsey/libphonenumber-for-php` in `Phone` value object. Now accepts any readable format, normalizes to E.164. Country-specific validity delegated to Telegram API.

### Fixed

- Fix strict_types regression in `MessageCommandChecker`: `strpos()` returning `false` passed to `substr($length)`
- Fix PHPStan level 2 errors: `static::` private constant access, misplaced `@var` PHPDoc, HArray generics cleanup, `@return mixed` mismatch, undefined variables in `Utils.php` try/catch blocks
- Fix `Url` value object to normalize scheme-less URLs (e.g., `t.me/path` → `https://t.me/path`) in `Url::normalize()`

## [4.6.1]

### Fixed
- Fix http client implementation

## [4.6.0]

### Added
- Add Bot Api 10.0 (May 8, 2026)

## [4.5.1]

### Added
- Add \AndrewGos\TelegramBot\Kernel\UpdateSource\ArrayUpdateSource update source

## [4.5.0]

### Added
- Add Bot Api 9.6 (April 3, 2026) functionality

## [4.4.1]

### Changed
- Make $serializer parameter in Api required

### Removed
- Remove deprecations

## [4.4]

### Added
- Add Bot Api 9.5 (March 1, 2026) functionality

## [4.3]

### Added
- Add Bot Api 9.4 (February 9, 2026) functionality

## [4.2]

### Added
- Add functionality that allows you to stop request propagation

## [4.1]

### Added
- Add Bot Api 9.3 (December 31, 2025) functionality

## [3.1]

### Added
- Connect andrew-gos/serializer package for requests and entities serialization

### Removed
- Drop all toArray methods from entities and requests
- Remove AbstractEntity class to improve performance

## [3.0]

### Added
- Add Bot Api 9.2 (August 15, 2025) functionality

### Changed
- Rename has_protected_forwards property of ChatFullInfo to has_private_forwards
- Sync all models with documentation
- Add null as default value for all responses constructors

### Fixed
- Fix descriptions of classes and their parameters

### Removed
- Drop AndrewGos\TelegramBot\ValueObject\RequestId class

## [2.2]

### Added
- Add Bot Api 9.1 (July 3, 2025) functionality

### Fixed
- Fix comments on some entities

## [2.1.1]

### Added
- Add error throw on non 2xx responses

## [2.1.0.1]

### Fixed
- Fix documentation

## [2.1]

### Added
- Add setters for api and update handler for Telegram class
- Add setter for api for UpdateHandler class

## [2.0]

### Changed
- Change update processors, fixes

## [1.4.11]

### Fixed
- Fix purchased_paid_media update

## [1.4.10]

### Added
- Add Bot Api 9.0 (April 11, 2025) functionality

## [1.4.9]

### Added
- Add Bot Api 8.3 (February 12, 2025) functionality

## [1.4.8]

### Added
- Add Bot Api 8.2 (January 1, 2025) functionality

## [1.4.7]

### Added
- Add Bot Api 8.1 (December 4, 2024) functionality

## [1.4.6]

### Added
- Add Bot Api 8.0 (November 17, 2024) functionality

## [1.4.5]

### Added
- Add Bot Api 7.11 (October 31, 2024) functionality

## [1.4.4]

### Added
- Add Bot Api 7.10 (September 6, 2024) functionality
- Allow IpV4 to be used with mask (like 127.0.0.1/32)

## [1.4.3]

### Added
- Add Bot Api 7.9 (August 14, 2024) functionality

## [1.4.2]

### Added
- Add Bot Api 7.8 (July 31, 2024) functionality

## [1.4.1]

### Changed
- Small cosmetic fixes

## [1.4]

### Added
- Add Bot Api 7.7 (July 7, 2024) functionality

## [1.3]

### Changed
- Move ClassBuilder to external package
- Some cleaning and small fixes

## [1.2]

### Added
- Add Bot Api 7.6 (July 1, 2024) functionality

### Changed
- Small cosmetic fixes

[Unreleased]: https://github.com/CiBeRHeMuL/TelegramBot/compare/v4.7.0...HEAD
[4.7.0]: https://github.com/CiBeRHeMuL/TelegramBot/compare/v4.6.1...v4.7.0
[4.6.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.6.1
[4.6.0]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.6.0
[4.5.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.5.1
[4.5.0]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.5.0
[4.4.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.4.1
[4.4]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.4
[4.3]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.3
[4.2]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.2
[4.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v4.1
[3.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v3.1
[3.0]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v3.0
[2.2]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v2.2
[2.1.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v2.1.1
[2.1.0.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v2.1.0.1
[2.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v2.1
[2.0]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v2.0
[1.4.11]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.11
[1.4.10]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.10
[1.4.9]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.9
[1.4.8]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.8
[1.4.7]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.7
[1.4.6]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.6
[1.4.5]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.5
[1.4.4]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.4
[1.4.3]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.3
[1.4.2]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.2
[1.4.1]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4.1
[1.4]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.4
[1.3]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.3
[1.2]: https://github.com/CiBeRHeMuL/TelegramBot/releases/tag/v1.2
