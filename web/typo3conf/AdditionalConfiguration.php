<?php
// We let the loader load context and environment specific configuration
// No other code must go in here!
$configLoader = \Pfaffenrodt\TYPO3\Distribution\ConfigLoaderFactory::buildLoader(
    $context = \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->isProduction() ? 'production' : 'development',
    $rootDir = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'private',
    $fixedCacheIdentifier = getenv('CONFIGURATION_CACHE_IDENTIFIER')
);
$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    $configLoader->load()
);
