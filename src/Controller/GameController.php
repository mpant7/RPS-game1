<?php
/**
 * Created by PhpStorm.
 * User: mpant
 * Date: 1/24/2018
 * Time: 12:52 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function defaultPage(){
        return $this->render('gamePages/defaultPage.html.twig');
    }

    /**
     * @Route("/play-page")
     */
    public function playPage() {

        return $this->render('gamePages/playPage.html.twig');
    }

    /**
     * @Route("/result-page/{slug}")
     */
    public function resultPage($slug) {
        $randNum = mt_rand(0,2);
        $choices = array('ROCK','PAPER', 'SCISSOR');
        $resultOptions = array('WIN', 'LOSE', 'TIE', 'NIL');
        $gameResult = $resultOptions[3];

        if ( $slug==$choices[$randNum] ){
            $gameResult = $resultOptions[2];
        }
        elseif ($slug=='ROCK' && $choices[$randNum]=='PAPER') {
            $gameResult = $resultOptions[1];
        }
        elseif ($slug=='ROCK' && $choices[$randNum]=='SCISSOR') {
            $gameResult = $resultOptions[0];
        }
        elseif ($slug=='PAPER' && $choices[$randNum]=='SCISSOR') {
            $gameResult = $resultOptions[1];
        }
        elseif ($slug=='PAPER' && $choices[$randNum]=='ROCK') {
            $gameResult = $resultOptions[0];
        }
        elseif ($slug=='SCISSOR' && $choices[$randNum]=='PAPER') {
            $gameResult = $resultOptions[0];
        }
        elseif ($slug=='SCISSOR' && $choices[$randNum]=='ROCK') {
            $gameResult = $resultOptions[1];
        }

        return $this->render('gamePages/resultPage.html.twig', [
            'userPick' => $slug,
            'computerPick' => $choices[$randNum],
            'gameResult' => $gameResult,
        ]);
    }

    /**
     * @Route("/watch-page")
     */
    public function watchPage() {
        return $this->render('gamePages/watchPage.html.twig', [
            'watchResult' => "TO-DO",
        ]);

    }

}