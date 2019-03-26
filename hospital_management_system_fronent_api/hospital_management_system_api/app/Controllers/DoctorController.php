<?php
namespace App\Controllers;

use App\Models\Doctor;
use App\Models\News;
use App\Controllers\Controller;

class DoctorController extends Controller{

  public function showDoctor($request, $response){
    if(!$this->auth->check()){
      return $response->withRedirect($this->router->pathFor('home'));
    }
    $getNews = Doctor::all();
    return $this->view->render($response, 'doctor.php', array('news' => $getNews));
  }


  public function addDoctor($request, $response){
    if(!$this->auth->check()){
      return $response->withRedirect($this->router->pathFor('home'));
    }

    $subrecipes = News::all();

    if($request->isGet()){
      return $this->view->render($response, 'adddoctor.php', array('recipes' => $subrecipes));
    }

    if($request->isPost()){
      $newsTitle = $request->getParam('news_title');
      $newsContent = $request->getParam('news_content');
      $newsDoctorId = $request->getParam('news_doctor_id');

      $recipeImage = $request->getUploadedFiles();
      if(empty($recipeImage['fileToUpload'])){
        throw new Exception('Expected a new file');
      }
      $mUploadedFile = $recipeImage['fileToUpload'];
      if($mUploadedFile->getError() === UPLOAD_ERR_OK){
        $filename = $mUploadedFile->getClientFileName();
        $mUploadedFile->moveTo("images/".$filename);

        //insert this information into the database.
        $filePath = "images/".$filename;

        $singleRecipe = new Doctor(array(
          'news_title' => $newsTitle,
          'news_image' => $filePath,
          'news_content' => $newsContent,
          'id' => $newsDoctorId
        ));

        $singleRecipe->save();
        return $this->view->render($response, 'adddoctor.php', array('message' => 'Successfully uploaded to database'));
      }else{
        return $this->view->render($response, 'adddoctor.php', array('message' => 'Image upload failed with an error'));
      }
    }
  }


 public function editDoctor($request, $response, $args){
   if(!$this->auth->check()){
     return $response->withRedirect($this->router->pathFor('home'));
   }

   $id = $args['id'];
   $singleNews = Doctor::where('news_id', $id)->first();

   $news = News::all();

   if($request->isGet()){
     return $this->view->render($response, 'editdoctor.php', array('news' => $news, 'singleNews' => $singleNews));
   }

   if($request->isPost()){
     $newsTitle = $request->getParam('news_title');
     $newsContent = $request->getParam('news_content');
     $newsDoctorId = $request->getParam('news_doctor_id');

     $recipeImage = $request->getUploadedFiles();
     if(empty($recipeImage['fileToUpload'])){
       return $this->view->render($response, 'editdoctor.php', array('recipe' => $recipes, 'recipes' => $subrecipes));
     }
     $filename = "";
     $mUploadedFile = $recipeImage['fileToUpload'];
     if($mUploadedFile->getError() === UPLOAD_ERR_OK){
         $filename = $mUploadedFile->getClientFileName();
         $mUploadedFile->moveTo("images/".$filename);
     }

     if(!empty($filename)){
       //insert this information into the database.
       $filePath = "images/".$filename;
       Doctor::where('news_id', $id)->update(['news_title' => $newsTitle, 'news_image' => $filePath, 'news_content' => $newsContent,
          'id' => $newsDoctorId]);
     }else{
       Doctor::where('news_id', $id)->update(['news_title' => $newsTitle, 'news_content' => $newsContent, 'id' => $newsDoctorId]);
     }
       return $this->view->render($response, 'editdoctor.php', array('message' => 'Successfully uploaded to database'));

   }

 }

 public function deleteDoctor($request, $response, $args){
   if(!$this->auth->check()){
     return $response->withRedirect($this->router->pathFor('home'));
   }

   $id = $args['id'];
   $deleteNews = Doctor::where('news_id', $id)->first();

   if($request->isGet()){
     return $this->view->render($response, 'deletedoctor.php', array('delete' => $deleteNews));
   }

   if($request->isPost()){
     $deleteNews->delete();
     return $this->view->render($response, 'deletedoctor.php', array('deleted' => '1'));
   }

 }

}
