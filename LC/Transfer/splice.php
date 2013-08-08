<?php



/**
 * Usage: php php-class-splitter.php [file] [dest]
 *
 * Splits a file containing multiple PHP classes up into multiple files with
 * one class per file. Overwrites any existing files in the destination path
 * with the same name, useful for handling redundant class definitions
 * across multiple files. Requires the tokenizer extension.
 *
 * [file] - path to a single PHP file containing multiple class definitions
 * [dest] - path to a directory to contain the new class files
 * @url https://github.com/elazar/php-class-splitter/blob/master/php-class-splitter.php
 */

$file = $argv[1];
$dest = rtrim($argv[2], '/');
$tokens = token_get_all(file_get_contents($file));
$buffer = false;
$useStatements= '';
    while ($token = next($tokens)) {
        if ($token[0] == T_NAMESPACE) {
            $namespace = $token[1];
            while ($innerToken = next($tokens))
                if (is_array($innerToken)) {
                    $namespace .= $innerToken[1];
                } else {
                    $namespace .= $innerToken;
                    if ($innerToken == ';') {
                        
                        $namespace.= PHP_EOL;
                        continue 2;
                    }
                }
        }
    if (is_array($token) && $token[0] == T_USE ) {
        $useStatements .= $token[1];
        while ($innerToken = next($tokens))
            if (is_array($innerToken)) {
                $useStatements .= $innerToken[1];
            } else {
                $useStatements .= $innerToken;
                if ($innerToken == ';') {

                    $useStatements.= PHP_EOL;
                    continue 2;
                }
            }

    }

    if ($token[0] == T_CLASS ||$token[0] == T_INTERFACE  ) {
        $buffer = true;
        $name = null;
        $code = '';
        $braces = 1;
        do {
            $code .= is_string($token) ? $token : $token[1];
            if (is_array($token)
                && $token[0] == T_STRING
                && empty($name)) {
                $name = $token[1];
            }
        } while (!(is_string($token) && $token == '{') && $token = next($tokens));
    } elseif ($buffer) {
        if (is_string($token)) {
            $code .= $token;
            if ($token == '{') {
                $braces++;
            } elseif ($token == '}') {
                $braces--;
                if ($braces == 0) {
                    $buffer = false;
                    $file = $dest . '/' . $name . '.php';
                    $code = '<?php' . PHP_EOL . $namespace . PHP_EOL .$useStatements . PHP_EOL . $code;
                    file_put_contents($file, $code);
                }
            }
        } else {
            $code .= $token[1];
        }
    }

}
