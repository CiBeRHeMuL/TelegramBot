# Coverage Strategy

## Status

Full test suite with **891+ tests**, **1300+ assertions**. CI/CD pipeline with PHP 8.2/8.3/8.4 matrix, code style check, PHPStan, and Codecov.

## Priority Matrix

| Priority | Namespace | Current | Target | Method |
|---|---|---|---|---|
| P0 | Entity (deserialization) | ~90% | 90%+ | Auto-generated DataProvider (295 fixtures) |
| P0 | Api (unit) | ~85%+ lines | 85%+ lines | TestHttpClient + DataProvider (177 methods) |
| P0 | ValueObject | 11/11 | 11/11 | Unit tests with valid/invalid data providers |
| P1 | Request (construction) | ~90% | 90%+ | Auto-generated DataProvider (173 fixtures) |
| P1 | Response (construction) | ~90% | 90%+ | Auto-generated DataProvider (84 fixtures) |
| P2 | Kernel (core) | 7/8 | 8/8 | Unit tests |
| P2 | Http | ~50% | 70%+ | Unit tests |
| P2 | Serializer | 0% | 70%+ | Unit tests |
| P3 | Filesystem | 4/5 | 5/5 | Unit tests |
| P3 | Helper | 0% | 100% | Unit test |
| P4 | Enum | Covered by PHPStan | - | Static analysis |
| P4 | Http/Client | Local integration | - | Integration tests with real Telegram |

## Key Components

- **TestHttpClient** — PSR-18 mock returning configurable JSON responses. Covers full Api send() pipeline.
- **Auto-generated fixtures** — Reflection-based generators for all Entity (295), Request (173), Response (84) classes.
- **Complex fixtures** — Real Telegram API responses covering overlapping entities (28 entities, 7 overlapping groups) and RichMessage (43 Blocks, all types, deep nesting to 4 levels).
