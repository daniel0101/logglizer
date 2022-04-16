<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\LogService;

class LuckyController extends AbstractController
{

    /**
     * @Route("/test")
     */
    public function test(): Response {
        $logs = file_get_contents('log/logs.txt');
        $logs = explode("\n",$logs);
        foreach($logs as $i => $log){
            //parse the file
            list($serviceName,$part) = explode(' - ', $log);
            $data[$i]['serviceName'] = $serviceName;
            $offset = (strpos($part,'[') + 1);
            $length = (strpos($part,']')) - $offset;
            $data[$i]['startDate'] = substr($part,$offset,$length);
            list($httpVerb, $uri, $httpVersion) = explode(' ',substr($part,(strpos($part,' "') +2), (strpos($part,'" ')) - strpos($part,'"')));
            $data[$i]['httpVerb'] = $httpVerb;
            $data[$i]['uri'] = $uri;
            $data[$i]['httpVersion'] = $httpVersion;
            $data[$i]['statusCode'] = substr($part,-3);
        }
        die();
        return (new Response())->setContent(json_encode([
            'message' => 'This is a test url'
        ]))
        ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @Route("/lucky/number")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return (new Response())->setContent(json_encode([
            'data' =>[
                'User' => [
                    'name' => 'dbidy',
                    'age' => 24,
                ]
            ]
        ]))
        ->setStatusCode(Response::HTTP_OK);
    }
}