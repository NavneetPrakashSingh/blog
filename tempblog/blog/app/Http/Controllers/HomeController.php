<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function main(){
        print_r("reached here");die;
        return view('main');
    }

    public function index()
    {
        // $simpleQuery=DB::table('topic_table')->where('',)->get();
         $tableData = DB::table('topic_table')->get();
        return view('home',["tableData"=>$tableData]);
    }

    public function addPost(){

         if(Auth::check()){
            $tableData = DB::table('images_table')->orderBy('id', 'desc')->get();
            // echo "<pre>";             
            $data = json_decode(json_encode((array) $tableData), true);
            
            return view('addPost',compact('tableData',$tableData));
         }else{
            print_r("You need to login before adding a new post");
         }
    }

    public function ImageUpload(Request $request){
        $currentId = $request->session()->get('postId');        
        //get the file from the post request
        $file=$request->file('file');
        //set the file name
        $filename=uniqid().$file->getClientOriginalName();
        //move the file to correct location
        $file->move('images',$filename);
        //save the image details into db
        DB::table('images_table')->insert(
            ['parent_id' => $currentId, 
             'image' => "images/".$filename,
             'mime_type' =>$file->getClientMimeType()
             ]
        );
        return 'images/'.$filename;
    }

    public function CoverImageUpload(Request $request){
        $currentId = $request->session()->get('postId');        
        $file=$request->file('file');
        $filename=uniqid().$file->getClientOriginalName();
        $file->move('images',$filename);
        $coverImageTable = DB::table('topic_table')
            ->where('id', $currentId)
            ->update(['cover_image' => 'images/'.$filename]);
        // return "Uploaded";
    }

    public function addTitle(Request $request){

        $data = $request->all();
        $title=$data['postTitle'];
        $intro = $data['postIntro'];
        $topic = $data['postTopic'];      

        DB::table('topic_table')->insert(
            ['heading' => $title, 'intro' => $intro, 'topic'=>$topic]
        );
        $maxId = DB::table('topic_table')->max('id');
        $request->session()->put('postId', $maxId);
        if($maxId){
            try {
                $tableTopic = DB::table('all_topics')->where('topic_name',$topic)->get();
                if ($tableTopic) {
                    # code...
                }else{
                    DB::table('all_topics')->insert(['parent_id'=>$maxId,'topic_name' => $topic]);
                }
                
            } catch (Exception $e) {
                
            }           
            return "data added successfully";
        }
        return $maxId;
    }

    public function addMainPost(Request $request){
       
        try {
            $data=$request->all();
            $parentId= $request->session()->get('postId');
            $author=$data['postAuthorName'];
            $mainBody=$data['postMainBody'];
            $insertMainPostData = DB::table('main_table')->insert(["parent_id"=>$parentId,"author"=>$author,"main_body"=>$mainBody]);
            echo "success";
        } catch (Exception $e) {
            echo $e;
        }

    }

    public function editPost($request){
        $mainData = DB::table('topic_table')->where(['topic_table.id'=>$request])->join('main_table','main_table.parent_id','=','topic_table.id')->get();        
        return view('editPost',["mainData"=>$mainData]);
    }

    public function updatePost(Request $request){
        try {
            $data = $request->all();
            $id = $data['id'];
            $heading = $data['heading'];
            $intro = $data['intro'];
            $topic = $data['topic'];
            $coverImage = $data['coverImage'];
            $author = $data['author'];
            $mainBody = $data['mainBody'];

            $topicTable = DB::table('topic_table')
                ->where('id', $id)
                ->update(['heading'=>$heading,"intro"=>$intro,"topic"=>$topic,"cover_image"=>$coverImage]);

            $mainTable =DB::table('main_table')
                ->where('parent_id',$id)
                ->update(['author'=>$author,'main_body'=>$mainBody]);

            print_r("data updated successfully");
            
        } catch (Exception $e) {
            print_r("error occured".$e);
        }
        


    }


    public function details(Request $request){
        print_r("reache here");
        // $blogId = $request->id;
    }

    public function latestInTech(Request $request){
        print_r("reached here");
    }
}
