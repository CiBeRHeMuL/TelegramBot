<?php

/*
 * @moduleContract
 * @purpose Implement PSR-7 StreamInterface and additional stream abstractions for HTTP message bodies.
 * @scope Stream, AppendStream, MultipartStream, MIME type detection, stream utilities.
 * @input Raw data, file resources, multipart form data
 * @output Stream implementations for HTTP message bodies
 * @links USES_API(8): PSR-7 StreamInterface; USES(8): PHP stream wrappers
 * @invariants
 * - MultipartStream supports file uploads with proper Content-Disposition
 * - Stream implements PSR-7 StreamInterface
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * CLASS [7][PSR-7 Stream implementation] => Stream
 * CLASS [6][Combine multiple streams into one] => AppendStream
 * CLASS [8][Multipart form data stream] => MultipartStream
 * CLASS [5][MIME type detection utilities] => MimeType
 * CLASS [5][Stream utility functions] => Utils
 */
