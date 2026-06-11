<?php

/*
 * @moduleContract
 * @purpose Abstract filesystem operations: file/dir/path handling, filesystem interface.
 * @scope File and directory operations, path manipulation, filesystem abstraction.
 * @input File paths, directory paths
 * @output Filesystem operation results (bool, string, array)
 * @links USES(6): PHP native filesystem functions
 * @invariants
 * - FilesystemInterface defines the contract; Filesystem provides the implementation
 * @rationale
 * Q: Why abstract the filesystem?
 * A: Enables testability via mock filesystem implementations.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * INTERFACE [7][Filesystem contract] => FilesystemInterface
 * CLASS [8][Filesystem implementation] => Filesystem
 * CLASS [6][Directory abstraction] => Dir
 * CLASS [6][File abstraction] => File
 * CLASS [5][Path manipulation utilities] => Path
 * CLASS [5][Filesystem utility functions] => Utils
 */
