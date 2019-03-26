<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\News;
use App\Models\Doctor;
use App\Models\Book;
use App\Models\Semester;
use App\Models\Type;
use App\Models\File;
use App\Models\NewsCategory;

class MobileController extends Controller{

  public function getMobileNews($request, $response){
    $allNewsCategories = News::all();
    return $this->view->render($response, 'mobilenews.php', array("allnews" => $allNewsCategories));
  }
  
  public function getMobileSingleNews($request, $response){
    $allSingleNews = NewsCategory::all();
    return $this->view->render($response, 'mobilesinglenews.php', array("allsinglenews" => $allSingleNews));
  }

  public function getMobileChildNews($request, $response){
    $single_news_id = (int)$request->getParam("ID");
    $singleNews = NewsCategory::where('id', $single_news_id)->get();
    return $this->view->render($response, 'childnews.php', array('singleNews' => $singleNews));
  }

  public function getSingleMobileNews($request, $response){
    $news_id = $request->getParam("NEWS_ID");
    $singleNewsPost = NewsCategory::where('news_id', $news_id)->get();
    return $this->view->render($response, 'singlenewschild.php', array('singleNewsPost' => $singleNewsPost));
  }

  /**
   * Function for getting all Doctors
   */
  public function getDoctors($request, $response){
    $doctorListing = Doctor::all();
    return $this->view->render($response, 'response.php', array("responseData" => $doctorListing));
  }

  /**
   * Function for getting all Book
   */
  public function getBook($request, $response, $args){
    $doctor_id = (int)$request->getParam("ID");   
    //$doctor_id = $args['ID']; 
    $responseObject = Book::where('book_doctor_id', $doctor_id)->get();
    return $this->view->render($response, 'response.php', array('responseData' => $responseObject));
  }

  /**
   * Function for getting all Semester
   */
  public function getSemester($request, $response, $args){
    $book_id = (int)$request->getParam("ID");   
    // $book_id = $args['ID']; 
    $responseObject = Semester::where('semester_book_id', $book_id)->get();
    return $this->view->render($response, 'response.php', array('responseData' => $responseObject));
  }

  /**
   * Function for getting all Semester
   */
  public function getType($request, $response, $args){
    $semester_id = (int)$request->getParam("ID");   
    //$semester_id = $args['ID']; 
    $responseObject = Type::where('types_semester_id', $semester_id)->get();
    return $this->view->render($response, 'response.php', array('responseData' => $responseObject));
  }

  /**
   * Function for getting all Semester
   */
  public function getTypeFiles($request, $response, $args){
    $type_id = (int)$request->getParam("ID");   
    //$semester_id = $args['ID']; 
    $responseObject = File::where('file_type_id', $type_id)->get();
    return $this->view->render($response, 'response.php', array('responseData' => $responseObject));
  }
}
