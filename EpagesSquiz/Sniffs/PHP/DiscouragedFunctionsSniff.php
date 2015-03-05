<?php
/**
 * EpagesSquiz_Sniffs_PHP_DiscouragedFunctionsSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@EpagesSquiz.net>
 * @copyright 2006-2014 EpagesSquiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/EpagesSquizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

if (class_exists('EpagesGeneric_Sniffs_PHP_ForbiddenFunctionsSniff', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class EpagesGeneric_Sniffs_PHP_ForbiddenFunctionsSniff not found');
}

/**
 * EpagesSquiz_Sniffs_PHP_DiscouragedFunctionsSniff.
 *
 * Discourages the use of debug functions.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@EpagesSquiz.net>
 * @copyright 2006-2014 EpagesSquiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/EpagesSquizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: 2.1.0
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class EpagesSquiz_Sniffs_PHP_DiscouragedFunctionsSniff extends EpagesGeneric_Sniffs_PHP_ForbiddenFunctionsSniff
{

    /**
     * A list of forbidden functions with their alternatives.
     *
     * The value is NULL if no alternative exists. IE, the
     * function should just not be used.
     *
     * @var array(string => string|null)
     */
    public $forbiddenFunctions = array(
                                  'error_log' => null,
                                  'print_r'   => null,
                                  'var_dump'  => null,
                                 );

    /**
     * If true, an error will be thrown; otherwise a warning.
     *
     * @var bool
     */
    public $error = false;

}//end class
