<?php
/**
 * EpagesGeneric_Sniffs_Formatting_NoSpaceAfterCastSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@EpagesSquiz.net>
 * @author    Marc McIntyre <mmcintyre@EpagesSquiz.net>
 * @copyright 2006-2014 EpagesSquiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/EpagesSquizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * EpagesGeneric_Sniffs_Formatting_NoSpaceAfterCastSniff.
 *
 * Ensures there is no space after cast tokens.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@EpagesSquiz.net>
 * @author    Marc McIntyre <mmcintyre@EpagesSquiz.net>
 * @copyright 2006-2014 EpagesSquiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/EpagesSquizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: 2.1.0
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class EpagesGeneric_Sniffs_Formatting_NoSpaceAfterCastSniff implements PHP_CodeSniffer_Sniff
{


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return PHP_CodeSniffer_Tokens::$castTokens;

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
        $tokens = $phpcsFile->getTokens();

        if ($tokens[($stackPtr + 1)]['code'] !== T_WHITESPACE) {
            return;
        }

        $error = 'A cast statement must not be followed by a space';
        $fix   = $phpcsFile->addFixableError($error, $stackPtr, 'SpaceFound');
        if ($fix === true) {
            $phpcsFile->fixer->replaceToken(($stackPtr + 1), '');
        }

    }//end process()


}//end class
