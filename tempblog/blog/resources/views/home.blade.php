@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <a href="{{ url('/addPost') }}">
                    <button type="button" class="btn btn-primary">Add Post</button>
                </a>
                
                <div class="panel-body">
                    <div class="">
                        <div class="">
                         <table class="table table-hover">
                            <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>Topic Heading</th>
                                  <th>Topic Name</th>
                                  <th>Options</th>
                              </tr>
                            </thead>

                            <tbody>
                            @foreach($tableData as $data => $value)
                                <tr>
                                    <td>{{$tableData[$data]->id}}</td>
                                    <td>{{$tableData[$data]->heading}}</td>
                                    <td>{{$tableData[$data]->topic}}</td>
                                    <?php $urlLink = "/editPost/".$tableData[$data]->id; ?>
                                    <td><a href ="{{url("$urlLink")}}">Edit</a></td>

                                </tr>
                                
                            @endforeach
                              
                             
                            </tbody>
                          </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
