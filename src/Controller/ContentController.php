<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;

/**
 * CMS Pages controller
 */
class ContentController extends BaseController
{
    #[Template('content/default.html.twig')]
    public function defaultAction(): array
    {
        return [];
    }
}
