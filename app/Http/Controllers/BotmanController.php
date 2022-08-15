<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
         $botman = app('botman');
         $botman->hears('{message}', function($botman, $message) {
         if ($message == 'hello')
          {
            $this->askName($botman);
          }
          else
          {
            $botman->reply("say 'hello' for start chatting..");
          }
       });
       $botman->listen();
    }
      public function askName($botman)
      {
          $botman->ask('Hello! Who are you looking for?', function(Answer $answer) {
          //$name = $answer->getText();
          $results = $answer->getText();
          $results = DB::table('users')
            ->where('name','LIKE','%'.$results.'%')
            ->get();
          if(count($results)>0){
              $botman->reply('I found a member for '.$results);
          }
          else{
              $botman->reply('Sorry! Member not found for'.$results);
              // send report
          }
        });
      }
