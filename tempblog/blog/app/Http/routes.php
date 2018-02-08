<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$tableData = DB::table('all_topics')->get();
	$dataArray=array();
	

	foreach ($tableData as $key => $value) {		
		// $mainData = DB::table('topic_table')->where(['topic'=>'Data Science'])->join('main_table','main_table.parent_id','=','topic_table.id')->get();
		$mainData=DB::table('topic_table')->where(['topic'=>$value->topic_name])->get();
		$index=0;		
		foreach ($mainData as $allData => $allDataValues) {
			$dataArray[$value->topic_name][$index]=array(				
					"id"=>$allDataValues->id,
					"heading"=>$allDataValues->heading,
					"intro"=>$allDataValues->intro,
					"topic"=>$allDataValues->topic,
					"coverImage"=>$allDataValues->cover_image,
					"createdAt"=>$allDataValues->created_at				
			);
			$index++;
		}		
	}

	$latestPost = DB::table('topic_table')->orderBy('id','desc')->first();	
    return view('main',['dataArray'=>$dataArray,'latestPost'=>$latestPost]);
});

Route::auth();
Route::get('/blog/{id}',function($id){
	try {
		$mainData = DB::table('topic_table')->where(['topic_table.id'=>$id])->join('main_table','main_table.parent_id','=','topic_table.id')->get();
		return view('detailsPage',['mainData'=>$mainData]);
	} catch (Exception $e) {
		print_r($e);
		// return view to 404 page once its completed
	}
});

Route::get('/blog/topic/{topicName}',function($topicName){
	try{
		$dataArray = DB::table('topic_table')->where('topic',$topicName)->get();
		
		return view('topics',['dataArray'=>$dataArray]);
	}catch (Exception $e){
		//redirect to 404 page
	}
});



Route::get('/admin', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/addPost','HomeController@addPost');
Route::get('editPost/{postId}','HomeController@editPost');
Route::post('/addImage','HomeController@ImageUpload');
Route::post('/addCoverImage','HomeController@CoverImageUpload');
Route::post('/addTitle','HomeController@addTitle');
Route::post('/addMainPost','HomeController@addMainPost');
Route::post('/updatePost','HomeController@updatePost');
Route::get('/latest-in-tech',function(){
	return view("latestInTech");
});

