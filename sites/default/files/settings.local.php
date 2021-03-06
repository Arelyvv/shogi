<?php

// @codingStandardsIgnoreFile

/**
 * @file
 * Local development override configuration feature.
 *
 * To activate this feature, copy and rename it such that its path plus
 * filename is 'sites/default/settings.local.php'. Then, go to the bottom of
 * 'sites/default/settings.php' and uncomment the commented lines that mention
 * 'settings.local.php'.
 *
 * If you are using a site name in the path, such as 'sites/example.com', copy
 * this file to 'sites/example.com/settings.local.php', and uncomment the lines
 * at the bottom of 'sites/example.com/settings.php'.
 */

/**
 * Assertions.
 *
 * The Drupal project primarily uses runtime assertions to enforce the
 * expectations of the API by failing when incorrect calls are made by code
 * under development.
 *
 * @see http://php.net/assert
 * @see https://www.drupal.org/node/2492225
 *
 * If you are using PHP 7.0 it is strongly recommended that you set
 * zend.assertions=1 in the PHP.ini file (It cannot be changed from .htaccess
 * or runtime) on development machines and to 0 in production.
 *
 * @see https://wiki.php.net/rfc/expectations
 */
assert_options(ASSERT_ACTIVE, TRUE);
\Drupal\Component\Assertion\Handle::register();

/**
 * Enable local development services.
 */
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

/**
 * Show all error messages, with backtrace information.
 *
 * In case the error level could not be fetched from the database, as for
 * example the database connection failed, we rely only on this value.
 */
$config['system.logging']['error_level'] = 'verbose';

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

/**
 * Disable the render cache.
 *
 * Note: you should test with the render cache enabled, to ensure the correct
 * cacheability metadata is present. However, in the early stages of
 * development, you may want to disable it.
 *
 * This setting disables the render cache by using the Null cache back-end
 * defined by the development.services.yml file above.
 *
 * Only use this setting once the site has been installed.
 */
$settings['cache']['bins']['render'] = 'cache.backend.null';

/**
 * Disable caching for migrations.
 *
 * Uncomment the code below to only store migrations in memory and not in the
 * database. This makes it easier to develop custom migrations.
 */
# $settings['cache']['bins']['discovery_migration'] = 'cache.backend.memory';

/**
 * Disable Internal Page Cache.
 *
 * Note: you should test with Internal Page Cache enabled, to ensure the correct
 * cacheability metadata is present. However, in the early stages of
 * development, you may want to disable it.
 *
 * This setting disables the page cache by using the Null cache back-end
 * defined by the development.services.yml file above.
 *
 * Only use this setting once the site has been installed.
 */
$settings['cache']['bins']['page'] = 'cache.backend.null';

/**
 * Disable Dynamic Page Cache.
 *
 * Note: you should test with Dynamic Page Cache enabled, to ensure the correct
 * cacheability metadata is present (and hence the expected behavior). However,
 * in the early stages of development, you may want to disable it.
 */
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

/**
 * Allow test modules and themes to be installed.
 *
 * Drupal ignores test modules and themes by default for performance reasons.
 * During development it can be useful to install test extensions for debugging
 * purposes.
 */
# $settings['extension_discovery_scan_tests'] = TRUE;

/**
 * Enable access to rebuild.php.
 *
 * This setting can be enabled to allow Drupal's php and database cached
 * storage to be cleared via the rebuild.php page. Access to this page can also
 * be gained by generating a query string from rebuild_token_calculator.sh and
 * using these parameters in a request to rebuild.php.
 */
$settings['rebuild_access'] = TRUE;

/**
 * Skip file system permissions hardening.
 *
 * The system module will periodically check the permissions of your site's
 * site directory to ensure that it is not writable by the website user. For
 * sites that are managed with a version control system, this can cause problems
 * when files in that directory such as settings.php are updated, because the
 * user pulling in the changes won't have permissions to modify files in the
 * directory.
 */
$settings['skip_permissions_hardening'] = TRUE;

/**
 * Database
 */
//$databases['default']['default'] = array (
//  'database' => 'local_planeta_smsb',
//  'username' => 'webadmin',
//  'password' => '1234asdf',
//  'prefix' => '',
//  'host' => '192.16.252.57',
//  'port' => '',
//  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
//  'driver' => 'mysql',
//);
$databases['default']['default'] = array (
  'database' => 'local_planeta_smsb',
  'username' => 'root',
  'password' => '',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

/**
 * Public and private folder
 */
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = 'sites/default/files/private';

/**
 * Debug mode
 */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


/**
 * SITE CONFIGURATION
 */

/**
 * Database: external
 */
$databases['external']['default'] = array (
  'database' => 'smsb_external',
  'username' => 'root',
  'password' => '',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

/**
 * STGEO
 */
$settings['stgeo_webservice']['login'] = 'https://stgeo.psoplaneta.com/login';
$settings['stgeo_webservice']['iploc'] = 'https://stgeo.psoplaneta.com/service/iploc/';
$settings['stgeo_webservice']['countries'] = 'https://stgeo.psoplaneta.com/service/countries/';
$settings['stgeo_webservice']['provinces'] = 'http://stgeo.psoplaneta.com/service/country/subdivision/';
$settings['stgeo_webservice']['usr'] = 'toto';
$settings['stgeo_webservice']['pwd'] = 'toto';

/**
 * STLOPD
 */
$config['stlopd.config']['web_service'] = 'http://prews-stlopd.grupoplaneta.es/STLOPD.asmx?WSDL';
$config['stlopd.config']['external_database'] = 1;
$config['stlopd.config']['database_mapping'] = [
  'rgpd_text_table' => 'stlopd_texts',		// Tabla de los textos
  'rgpd_fields' => [		// Mapeo de los campos de la tabla de textos.
    'id' => 'id',
    'idFormulario' => 'idForm',
    'formName' => 'formName',
    'idEmpresa' => 'idCompany',
    'companyName' => 'companyName',
    'society' => 'society',
    'socialDenomination' => 'socialDenomination',
    'cif' => 'cif',
    'address' => 'address',
    'email' => 'email',
    'ARCOPemail' => 'ARCOPemail',
    'webSource' => 'webSource',
    'IdClausula' => 'idClause',
    'IdClausulaPie' => 'idClauseFooter',
    'cabeceraTexto' => 'headerText',
    'contenidoTexto' => 'contentText',
    'pieTexto' => 'footerText',
    'fecha_actualizacion' => 'updateDate',
    'language' => 'language',
    'campus' => 'campus',
  ],
  'stlopd_leads_table' => 'stlopd_leads',
  'stlopd_fields' => [
    'id' => 'id',
    'leadID' => 'leadId',
    'rgpdId' => 'textId',
    'FAceptacion' => 'acceptanceDate',
    'rgpd_checked' => 'rgpdChecked',
    'IdSession' => 'sessionId',
    'correoE_Usuario' => 'userEmail',
    'IP_Usuario' => 'userIP',
    'FGrabacion' => 'storeDate',
    'traspasado_ws' => 'processed',
    'type' => 'type',
  ],
  'leads_table' => 'ulises_leads',
  'leads_fields' => [
    'user_idcard' => 'user_idcard',
    'user_address_street' => 'user_address_street',
    'user_address_number' =>    'user_address_number',
    'user_address_city' =>     'user_address_city',
    'user_address_province' =>    'user_address_province',
    'user_address_province_name' =>    'user_address_province_name',
    'user_address_country' =>     'user_address_country',
    'user_phone1_countrycode' =>     'user_phone1_countrycode',
    'user_phone1_citycode' =>     'user_phone1_citycode',
    'user_phone1_number' =>    'user_phone1_number',
    'id' =>     'id'
  ],
];
