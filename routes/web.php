<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

interface CarService {
    public function getCost();

    public function getDescription();
}

class Basic implements CarService {
    public function getCost(){
        
        return 25;
    }

    public function getDescription()
    {
    	return 'this is basic description';
    }
}


class Oil implements CarService {
    protected $carService;
    
    public function __construct(CarService $carSrv) {
        
        $this->carService = $carSrv;
    }
    
    public function getCost(){
        
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
    	return $this->carService->getDescription() . ' and this is oil';
    }
}

class Tired implements CarService {
    protected $carService;
    
    public function __construct(CarService $carSrv) {
        
        $this->carService = $carSrv;
    }
    
    public function getCost(){
        
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
    	return $this->carService->getDescription() . ' and this is tired';
    }
}

Route::get('/decorator', function () {
	echo (new Tired(new Oil(new Basic())))->getDescription();
});

Route::get('/', function () {
    return view('welcome');
})->middleware('can:access-dashboard');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
