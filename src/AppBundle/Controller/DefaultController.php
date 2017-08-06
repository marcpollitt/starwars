<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Character;
use AppBundle\Service\StarwarsPorter;
use AppBundle\Service\StarwarsService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function fireAction(Request $request): Response
    {
        /** @var StarwarsService $characterService */
        $characterService = $this->container->get('starwars_service');
        $characterPorterService = $this->container->get('starwars_porter');

        $darkVadir = $characterService->findId(1);
        if( $darkVadir->getNumberOfHits() == 0 ){
            $data = [];
            $characters = $characterService->findAll();
            /** @var Character $character */
            foreach ($characters as $character) {
                $character->setNumberOfHits($character->getLives() * $character->getAmount());
                $cData =  $characterService->save($character);
                $data[] =  $characterPorterService->convert($cData);
            }

            $response = new JsonResponse($data);

            $response->headers->set('Access-Control-Allow-Origin', '*');

            return $response;
        }

        $darkside = $characterService->findId(rand(1,3));

        $darkside->setNumberOfHits($darkside->getNumberOfHits() - $darkside->getHit());
        $characterService->save($darkside);

        $darkVadir = $characterService->findId(1);

        if($darkVadir->getNumberOfHits() < 0 ){
            $characters = $characterService->findAll();
            /** @var Character $character */
            foreach ($characters as $character) {
                $character->setNumberOfHits(0);
                $characterService->save($character);
            }
        }

        $characters = $characterService->findAll();
        /** @var StarwarsPorter $characterPorterService */


        foreach ($characters as $character)
        {
            $data[] =  $characterPorterService->convert($character);
        }

        $response = new JsonResponse($data);

        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response ;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function setupAction(Request $request): Response
    {
        $charactersArray = json_decode($request->getContent(), true);

        $statusCode = JsonResponse::HTTP_CREATED;

        /** @var StarwarsService $characterService */
         $characterService = $this->container->get('starwars_service');
        /** @var StarwarsPorter $characterPorterService */
         $characterPorterService = $this->container->get('starwars_porter');

        try {
            if (!is_array($charactersArray)) {
                throw new \Exception('Not an array');
            }
            $data = [];
            foreach ($charactersArray as $characterArray) {
                if (!is_array($characterArray)) {
                    continue;
                }
                $character = $characterPorterService->create($characterArray);
                $cData = $characterService->save($character);
                $data[] =  $characterPorterService->convert($cData);
            }
        } catch (\Exception $exception) {
            $data = ['error' => ['message' => $exception->getMessage()]];
            $statusCode =  JsonResponse::HTTP_BAD_REQUEST;
        }

        return new JsonResponse($data, $statusCode);
    }

}
