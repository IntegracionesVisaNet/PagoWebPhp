<?php
    define("VISA_DEVELOPMENT", true);

    // Desarrollo Visa
    define('VISA_DEV_MERCHANT_ID', '522591303');
    define('VISA_DEV_USER', 'integraciones.visanet@necomplus.com');
    define('VISA_DEV_PWD', 'd5e7nk$M');
    define('VISA_DEV_URL_SECURITY', 'https://apitestenv.vnforapps.com/api.security/v1/security');
    define('VISA_DEV_URL_SESSION', 'https://apitestenv.vnforapps.com/api.ecommerce/v2/ecommerce/token/session/'.VISA_DEV_MERCHANT_ID);
    define('VISA_DEV_URL_JS', 'https://static-content-qas.vnforapps.com/v2/js/checkout.js?qa=true');
    define('VISA_DEV_URL_AUTHORIZATION', 'https://apitestenv.vnforapps.com/api.authorization/v3/authorization/ecommerce/'.VISA_DEV_MERCHANT_ID);

    // Producción Visa
    define('VISA_PRD_MERCHANT_ID', '527127703');
    define('VISA_PRD_USER', 'integraciones.visanet@necomplus.com');
    define('VISA_PRD_PWD', 'd5e7nk$M');
    define('VISA_PRD_URL_SECURITY', 'https://apiprod.vnforapps.com/api.security/v1/security');
    define('VISA_PRD_URL_SESSION', 'https://apiprod.vnforapps.com/api.ecommerce/v2/ecommerce/token/session/'.VISA_PRD_MERCHANT_ID);
    define('VISA_PRD_URL_JS', 'https://static-content.vnforapps.com/v2/js/checkout.js');
    define('VISA_PRD_URL_AUTHORIZATION', 'https://apiprod.vnforapps.com/api.authorization/v3/authorization/ecommerce/'.VISA_PRD_MERCHANT_ID);

    // Configuración visa
    define('VISA_MERCHANT_ID', VISA_DEVELOPMENT ? VISA_DEV_MERCHANT_ID : VISA_PRD_MERCHANT_ID);
    define('VISA_USER', VISA_DEVELOPMENT ? VISA_DEV_USER : VISA_PRD_USER);
    define('VISA_PWD', VISA_DEVELOPMENT ? VISA_DEV_PWD : VISA_PRD_PWD);
    define('VISA_URL_SECURITY', VISA_DEVELOPMENT ? VISA_DEV_URL_SECURITY : VISA_PRD_URL_SECURITY);
    define('VISA_URL_SESSION', VISA_DEVELOPMENT ? VISA_DEV_URL_SESSION : VISA_PRD_URL_SESSION);
    define('VISA_URL_JS', VISA_DEVELOPMENT ? VISA_DEV_URL_JS : VISA_PRD_URL_JS);
    define('VISA_URL_AUTHORIZATION', VISA_DEVELOPMENT ? VISA_DEV_URL_AUTHORIZATION : VISA_PRD_URL_AUTHORIZATION);