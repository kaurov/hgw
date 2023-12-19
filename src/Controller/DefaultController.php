<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\Asset;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FrontendController
{
    /**
     *
     * @return array
     */
    #[Template('default/default.html.twig')]
    public function defaultAction(): array
    {
        return [];
    }

    /**
     * Renders AreaBrick Content
     * @param Request $request
     * @return Response
     */
    public function galleryRenderletAction(Request $request): Response
    {
        $params = [];
        if ($request->attributes->get('id') && $request->attributes->get('type') === 'asset') {
            $params['asset'] =  Asset::getById($request->attributes->getInt('id'));
        }

        return $this->render('default/gallery_renderlet.html.twig', $params);
    }
}
