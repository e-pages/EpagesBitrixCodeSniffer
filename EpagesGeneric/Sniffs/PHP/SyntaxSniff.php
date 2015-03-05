<?php
/**
 * EpagesGeneric_Sniffs_PHP_SyntaxSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Blaine Schmeisser <blainesch@gmail.com>
 * @author    Greg Sherwood <gsherwood@EpagesSquiz.net>
 * @copyright 2006-2014 EpagesSquiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/EpagesSquizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * EpagesGeneric_Sniffs_PHP_SyntaxSniff.
 *
 * Ensures PHP believes the syntax is clean.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Blaine Schmeisser <blainesch@gmail.com>
 * @author    Greg Sherwood <gsherwood@EpagesSquiz.net>
 * @copyright 2006-2014 EpagesSquiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/EpagesSquizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: 2.1.0
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class EpagesGeneric_Sniffs_PHP_SyntaxSniff implements PHP_CodeSniffer_Sniff
{


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_OPEN_TAG);

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in
     *                                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $phpPath = PHP_CodeSniffer::getConfigData('php_path');
        if ($phpPath === null) {
            return;
        }

        $fileName = $phpcsFile->getFilename();
        $cmd      = "$phpPath -l \"$fileName\" 2>&1";
        $output   = shell_exec($cmd);

        $matches = array();
        if (preg_match('/^.*error:(.*) in .* on line ([0-9]+)/', $output, $matches) === 1) {
            $error = trim($matches[1]);
            $line  = (int) $matches[2];
            $phpcsFile->addErrorOnLine("PHP syntax error: $error", $line, 'PHPSyntax');
        }

        // Ignore the rest of the file.
        return ($phpcsFile->numTokens + 1);

    }//end process()


}//end class
