<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;


class FirebaseController extends Controller
{
    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase_key.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();
        $newPost = $database
        ->getReference('alumno')
        ->push([
        'nombre' => 'Lucas A',
        'curso' => '1'        
        ]);
        $newPost = $database
        ->getReference('alumno')
        ->push([
        'nombre' => 'Pedro Fernandez',
        'curso' => '3'        
        ]);
        $newPost = $database
        ->getReference('materia')
        ->push([
        'nombre' => 'Matematicas',
        'curso' => '1'        
        ]);
        $newPost = $database
        ->getReference('materia')
        ->push([
        'nombre' => 'Quimica',
        'curso' => '1'        
        ]);
        $newPost = $database
        ->getReference('materia')
        ->push([
        'nombre' => 'Biologia',
        'curso' => '1'        
        ]);
        $newPost = $database
        ->getReference('recurso')
        ->push([
        'materia' => 'Biologia',
        'curso' => '1',
        'titulo' => 'Ejemplo de ecossitemas',  
        'descripcion'=>'ejemplo de descripcion de biologia',
        'archivo' => 'path del archivo',             
        ]);
        $newPost = $database
        ->getReference('recurso')
        ->push([
        'materia' => 'Biologia',
        'curso' => '1',
        'titulo' => 'Ejemplo de animales',  
        'descripcion'=>'ejemplo de descripcion de biologia',
        'archivo' => 'path del archivo',             
        ]);

        $newPost = $database
        ->getReference('recurso')
        ->push([
        'materia' => 'Matematicas',
        'curso' => '1',
        'titulo' => 'ejercicios de derivadas',  
        'descripcion'=>'ejemplo de descripcion de matematicas',
        'archivo' => 'path del archivo',             
        ]);
        $newPost = $database
        ->getReference('recurso')
        ->push([
        'materia' => 'Matematicas',
        'curso' => '1',
        'titulo' => 'Ejercicios de integrales',  
        'descripcion'=>'ejemplo de descripcion de matematicas',
        'archivo' => 'path del archivo',             
        ]);
        $newPost = $database
        ->getReference('recurso')
        ->push([
        'materia' => 'Quimica',
        'curso' => '1',
        'titulo' => 'Libro de quimica',  
        'descripcion'=>'ejemplo de descripcion de quimica',
        'archivo' => 'path del archivo',             
        ]);

        $newPost = $database
        ->getReference('actividad')
        ->push([
        'nombre' => 'Fracciones',
        'materia' => 'Matematicas',
        'curso' => '1',
        'descripcion' => 'Texto de prueba donde se escribira la descripcion de la tarea de fracciones.',  
        'archivo' => 'path del archivo',             
        ]);
        $newPost = $database
        ->getReference('actividad')
        ->push([
        'nombre' => 'Tarea de composicion',
        'materia' => 'Quimica',
        'curso' => '1',
        'descripcion' => 'Texto de prueba donde se escribira la descripcion de la tarea de composicion.',  
        'archivo' => 'path del archivo',             
        ]);
        $newPost = $database
        ->getReference('actividad')
        ->push([
        'nombre' => 'Tarea bichos',
        'materia' => 'Biologia',
        'curso' => '1',
        'descripcion' => 'Texto de prueba donde se escribira la descripcion de la tarea de bichos.',  
        'archivo' => 'path del archivo',             
        ]);


        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //$newPost->remove();
        echo"<pre>";
        print_r($newPost->getvalue());
        }

        public function getPost()
        {
           
            $posts = array();
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'./firebase_key.json');
            $firebase = (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://appeduca-55a94.firebaseio.com/')
                        ->create();
            $database = $firebase->getDatabase();
            $reference = $database->getReference('alumno');
            $snapshot = $reference->orderByKey()->getSnapshot()->getvalue();
            dd($snapshot);
    
            return $posts;
           
    
        }
        
}
