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

namespace App\Website\Navigation;

use Pimcore\Model\DataObject\News;
use Pimcore\Model\Document;
use Pimcore\Translation\Translator;
use Pimcore\Twig\Extension\Templating\Placeholder;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class BreadcrumbHelperService
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var Placeholder
     */
    protected $placeholderHelper;

    /**
     * @var Translator
     */
    protected $translator;

    /**
     * @var UrlGeneratorInterface
     */
    protected $urlGenerator;

    /**
     * BreadcrumbHelperService constructor.
     *
     * @param RequestStack $requestStack
     * @param Placeholder $placeholderHelper
     * @param Translator $translator
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(RequestStack $requestStack, Placeholder $placeholderHelper, Translator $translator, UrlGeneratorInterface $urlGenerator)
    {
        $this->requestStack = $requestStack;
        $this->placeholderHelper = $placeholderHelper;
//        $this->categoryLinkGenerator = $categoryLinkGenerator;
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @return Document
     */
    protected function getCurrentDocument(): Document
    {
        return $this->requestStack->getCurrentRequest()->attributes->get('contentDocument');
    }

    /**
     * @param News $news
     */
    public function enrichNewsPage(News $news)
    {
        $document = $this->getCurrentDocument();
        $this->placeholderHelper->__invoke('addBreadcrumb')->append([
            'parentId' => $document->getId(),
            'id' => 'news-' . $news->getId(),
            'url' => '#',
            'label' => $news->getTitle()
        ]);
    }

    public function enrichGenericDynamicPage($label)
    {
        $document = $this->getCurrentDocument();
        $this->placeholderHelper->__invoke('addBreadcrumb')->append([
            'parentId' => $document->getId(),
            'id' => 'search-result',
            'label' => $label
        ]);
    }
}
