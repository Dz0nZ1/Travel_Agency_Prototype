<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\AccommodationModel;
use app\models\CityModel;
use app\models\CountryModel;
use app\models\IncomeModel;
use app\models\ReservationByMonthModel;
use app\models\TotalPriceByMonthModel;
use Exception;
use mysqli;


class AdministrationController extends Controller {


    //Crud methods

    public function index(){
        $this->view('dashboard', 'layout2', null);
    }

    public function addCountryProcess() {
       try{
           $country = new CountryModel();
           $country->mapData($this->router->request->all());
           $country->create();
           header('location:' . "/administration");
       }catch (Exception $e)
       {
           echo $this->view('errors', 'access', null);
       }

    }

    public function addCityProcess() {
        try {
            $city = new CityModel();
            $city->mapData($this->router->request->all());
            $city->create();
            header('location:' . "/administration");
        }catch (Exception $e)
        {
            echo $this->view('errors', 'access', null);
        }
    }

    public function addAccommodationProcess() {
        try {
            $accommodation = new AccommodationModel();
            $accommodation->mapData($this->router->request->all());
            $accommodation->create();
            header('location:' . "/administration");

        }catch (Exception $e)
        {
            echo $this->view('errors', 'access', null);
        }
    }

    public function updateCity(){
        try {
            $city = new CityModel();
            $city->mapData($this->router->request->all());
            echo $this->view('updateCityChange', 'dashboard', $city);

        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }
    }

    public function updateCityFinish(){
        try {
            $city = new CityModel();
            $city->mapData($this->router->request->all());
            $city->update("city_name = '$city->city_name', city_image = '$city->city_image'", "id = '$city->id'");
            header('location:' . "/administration");
        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }
    }


    public function updateAccommodation(){
        try {
            $accommodation = new AccommodationModel();
            $accommodation->mapData($this->router->request->all());
            echo $this->view('updateAccommodationChange', 'dashboard' , $accommodation);
        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }
    }

    public function updateAccommodationFinish(){
        try {
            $accommodation = new AccommodationModel();
            $accommodation->mapData($this->router->request->all());
            $accommodation->update("accommodation_name = '$accommodation->accommodation_name', accommodation_image = '$accommodation->accommodation_image'", "id = '$accommodation->id'");
            header('location:' . "/administration");
        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }
    }

    public function updateCountry(){
        try {
            $country = new CountryModel();
            $country->mapData($this->router->request->all());
            echo $this->view('updateCountryChange', 'dashboard' , $country);
        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }

    }

    public function updateCountyFinish(){
        try {
            $country = new CountryModel();
            $country->mapData($this->router->request->all());
            $country->update("country_name = '$country->country_name', country_image = '$country->country_image', country_description = '$country->country_description'", "id = '$country->id'");
            header('location:' . "/administration");
        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }
    }





    public function countryDelete() {
        try {
            $country = new CountryModel();
            $country->mapData($this->router->request->all());
            $country->delete("country_name = '$country->country_name'");
            header('location:' . "/administration");

        }catch (Exception $e){
            echo $this->view('errors', 'access', null);
        }

    }


    public function cityDelete() {

        try {
            $city = new CityModel();
            $city->mapData($this->router->request->all());
            $city->delete("city_name = '$city->city_name'");
            header('location:' . "/administration");

        }catch (Exception $e) {
            echo $this->view('errors', 'access', null);
        }


    }


    public function accommodationDelete() {
        try {
            $accommodation = new AccommodationModel();
            $accommodation->mapData($this->router->request->all());
            $accommodation->delete("accommodation_name = '$accommodation->accommodation_name'");
            header('location:' . "/administration");
        }catch (Exception $e) {
            echo $this->view('errors', 'access', null);
        }
    }


    //View methods

    public function addAccommodationView() {
        $this->view('addAccommodation', 'dashboard', null);
    }

    public function updateCityView(){
        $this->view('updateCity', 'dashboard', null);
    }

    public function updateAccommodationView(){
        $this->view('updateAccommodation', 'dashboard', null);
    }

    public function updateCountryView(){
        $this->view('updateCountry', 'dashboard', null);
    }


    public function addCountryView() {
        $this->view('addCountry', 'dashboard', null);
    }

    public function addCityView() {
        $this->view('addCity', 'dashboard', null);
    }


    public function deleteAccommodationView() {
        $this->view('deleteAccommodation', 'dashboard', null);
    }

    public function deleteCityView() {
        $this->view('deleteCity', 'dashboard', null);
    }

    public function deleteCountryView() {
        $this->view('deleteCountry', 'dashboard', null);
    }



    //getApi methods

    public function getCountriesApi() {

        $country = new CountryModel();

        $dbData = $country->countries();

        echo json_encode($dbData);


    }

    public function getReservationByMonthApi(){
        $model = new ReservationByMonthModel();
        $model->mapData($this->router->request->all());

        echo json_encode($model->getData());
    }

    public function getIncomeApi(){

        $priceFrom = $this->router->request->one('priceFrom');
        $priceTo = $this->router->request->one('priceTo');
        $model = new IncomeModel();
        $dbData = $model->getIncome($priceFrom,$priceTo);

        echo json_encode($dbData);
    }

    public function getIncomeByMonthApi(){
        $model = new TotalPriceByMonthModel();
        $model->mapData($this->router->request->all());
        echo json_encode($model->getData());
    }



    public function authorize()
    {
        return [
            "Admin"
        ];
    }
}