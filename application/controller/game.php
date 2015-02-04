<?php

class Game extends Controller
{

    public $measure_unit = 'kilometers';
    public $measure_state = false;
    public $measure = 0;
    public $error = '';

    /**
     * PAGE: index
     * This method handles showing the image upload form
     */
    public function index()
    {
        $this->view->render('game/index');
    }

    public function play($id = false)
    {
        $this->model = $this->loadModel('Game');
        if (!$id) {
            $this->view->game = $this->model->getRandomPhoto();
        }else{
            $this->view->game = $this->model->getImage($id);
        }
        $this->view->render('game/play');
    }

    public function guess()
    {
        $this->model = $this->loadModel('Game');

        $guess = new stdClass();

        $guess->lat = $_POST['lat'];
        $guess->long = $_POST['long'];
        $this->view->guess = $guess;

        $this->view->image = $this->model->getImage($_POST['id']);

        $this->view->render('game/result');

    }

    public function result()
    {
        $lat_a = $_POST['lat'];
        $lon_a = $_POST['long'];

        $game_model = $this->loadModel('Game');

        $this->image = $game_model->getImage($_POST['id']);

        $lat_b = $this->image->lat;
        $lon_b = $this->image->long;

        $this->view->distance = $this->DistAB($lat_a, $lon_a, $lat_b, $lon_b);
        $this->view->positions = array($lat_a, $lon_a, $lat_b, $lon_b);
        $this->view->points = $game_model->getPoints($this->view->distance);
       
        $this->view->render('game/result');
    }

    private function DistAB($lat_a, $lon_a, $lat_b, $lon_b)
    {
        $delta_lat = $lat_b - $lat_a;
        $delta_lon = $lon_b - $lon_a;

        $earth_radius = 6372.795477598;

        $alpha    = $delta_lat / 2;
        $beta     = $delta_lon / 2;
        $a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat_a)) * cos(deg2rad($lat_b)) * sin(deg2rad($beta)) * sin(deg2rad($beta));
        $c        = asin(min(1, sqrt($a)));
        $distance = 2 * $earth_radius * $c;
        $distance = round($distance, 4);

        return $distance;
    }
}


