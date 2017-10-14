@extends('layouts.admin')




@section('content')

    @if(Session::has('deleted_post'))
        <p class="text-center bg-danger">{{session('deleted_post')}}</p>
    @elseif(Session::has('updated_post'))
        <p class="text-center bg-success">{{session('updated_post')}} <i class="fa fa-check" aria-hidden="true"></i></p>
    @elseif(Session::has('deleted_post'))
        <p class="text-center bg-info">{{session('created_post')}} <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img style="height: 45px; width: 45px;"  src="{{$post->photo ? $post->photo->file : '/images/default-post.png'}}" class="img-responsive img-rounded" alt="no photo"></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->body, 13)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
     </table>


@endsection



