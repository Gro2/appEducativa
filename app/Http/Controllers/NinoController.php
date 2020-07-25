<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;


class NinoController extends Controller
{
    public function listaMateriasA(){
        $posts = array();
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'./firebase_key.json');
            $firebase = (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
                        ->create();
            $database = $firebase->getDatabase();
            $reference = $database->getReference('materia');
            $mats = $reference->getSnapshot()->getvalue();
       //dd($mats);
        return view('nino.materia',compact('mats'));
    } 
    public function listaTareas(){
     //   dd(gettype($_GET['curso']));
        $ind=0;
        $posts = array();
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'./firebase_key.json');
            $firebase = (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
                        ->create();
            $database = $firebase->getDatabase();
            $reference = $database->getReference('actividad');
            $tmp = $reference->getSnapshot()->getvalue();
         $tareas=array();
        foreach($tmp as $recurso){
            if($recurso['curso']===$_GET['curso']&&$recurso['materia']===$_GET['materia']){
                $tareas[$ind]=$recurso;
                $ind++;
            }
        }
     //  dd($tareas);
        
        return view('nino.tarea',compact('tareas'));
    } 
    public function respTarea(){
           $tarea=$_GET;
        //    $ind=0;
        //    $posts = array();
        //        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'./firebase_key.json');
        //        $firebase = (new Factory)
        //                    ->withServiceAccount($serviceAccount)
        //                    ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
        //                    ->create();
        //        $database = $firebase->getDatabase();
        //        $reference = $database->getReference('recurso');
        //        $tmp = $reference->getSnapshot()->getvalue();
        //     $tareas=array();
        //    foreach($tmp as $recurso){
        //        if($recurso['curso']===$_GET['curso']&&$recurso['materia']===$_GET['materia']){
        //            $tareas[$ind]=$recurso;
        //            $ind++;
        //        }
        //    }
        //  dd($tareas);
           
           return view('nino.respuesta',compact('tarea'));
       } 
       public function listaMateriasR(){
        $posts = array();
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'./firebase_key.json');
            $firebase = (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
                        ->create();
            $database = $firebase->getDatabase();
            $reference = $database->getReference('materia');
            $mats = $reference->getSnapshot()->getvalue();
       //dd($mats);
        return view('nino.recurso',compact('mats'));
    } 
    public function listaRecursos(){
         //  dd(($_GET));
           $ind=0;
           $posts = array();
               $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'./firebase_key.json');
               $firebase = (new Factory)
                           ->withServiceAccount($serviceAccount)
                           ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
                           ->create();
               $database = $firebase->getDatabase();
               $reference = $database->getReference('recurso');
               $tmp = $reference->getSnapshot()->getvalue();
            $tareas=array();
           foreach($tmp as $recurso){
               if($recurso['curso']===$_GET['curso']&&$recurso['materia']===$_GET['nombre']){
                   $tareas[$ind]=$recurso;
                   $ind++;
               }
           }
          //dd($tareas);
           
           return view('nino.recursoMat',compact('tareas'));
       } 
}
