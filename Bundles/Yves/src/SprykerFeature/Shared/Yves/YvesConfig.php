<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Shared\Yves;

use SprykerFeature\Shared\Library\ConfigInterface;

interface YvesConfig extends ConfigInterface
{

    const YVES_THEME = 'YVES_THEME';
    const YVES_TRUSTED_PROXIES = 'YVES_TRUSTED_PROXIES';
    const YVES_SSL_ENABLED = 'YVES_SSL_ENABLED';
    const YVES_COMPLETE_SSL_ENABLED = 'YVES_COMPLETE_SSL_ENABLED';
    const YVES_SSL_EXCLUDED = 'YVES_COMPLETE_SSL_ENABLED';
    const YVES_SESSION_SAVE_HANDLER = 'YVES_SESSION_SAVE_HANDLER';
    const YVES_SESSION_NAME = 'YVES_SESSION_NAME';
    const YVES_SESSION_COOKIE_DOMAIN = 'YVES_SESSION_COOKIE_DOMAIN';
    const YVES_ERROR_PAGE = 'YVES_ERROR_PAGE';

    const TRANSFER_USERNAME = 'TRANSFER_USERNAME';
    const TRANSFER_PASSWORD = 'TRANSFER_PASSWORD';
    const TRANSFER_SSL = 'TRANSFER_SSL';
    const TRANSFER_DEBUG_SESSION_FORWARD_ENABLED = 'TRANSFER_DEBUG_SESSION_FORWARD_ENABLED';
    const TRANSFER_DEBUG_SESSION_NAME = 'TRANSFER_DEBUG_SESSION_NAME';

    const YVES_AUTH_SETTINGS = 'YVES_AUTH_SETTINGS';

}
