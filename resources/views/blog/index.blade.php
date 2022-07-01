@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
   <div class="py-15 border-b border-gray-200">
      <h1 class="text-6xl">
         Blog Posts
      </h1>
   </div>
</div>

@if(session()->has('message'))
<div class="w-4/5 m-auto mt-10 pl-2">
   <p class="w-2/5 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
      {{session()->get('message')}}
   </p>
</div>
@endif

@if(Auth::check())
<div class="pt-15 w-4/5 m-auto">
   <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100
       text-xs font-extrabold py-3 px-5 rounded-3xl">
      Create post
   </a>
</div>
@endif

@foreach($posts as $post)
<div class="pc">
   <div class="fashion-2">
      <div class="overlap-group">
         <div class="rectangle-6 border-1px-dove-gray"></div>
         <div class="rectangle-2 border-1px-dove-gray"></div>
         <div class="topsbottomsshoes">
            <span class="segoeui-regular-normal-black-62px"></span><span class="span-1 segoeui-regular-normal-black-62px">Tops<br /></span><span class="segoeui-regular-normal-black-62px">・<br /></span><span class="span-1 segoeui-regular-normal-black-62px">Bottoms<br /></span><span class="segoeui-regular-normal-black-62px">・<br /></span><span class="span-1 segoeui-regular-normal-black-62px">Shoes<br /></span><span class="segoeui-regular-normal-black-62px">・</span>
         </div>
         <div class="overlap-group-1">
            <div class="rectangle-3-1 border-1px-diesel"></div>
            <div class="number">1</div>
         </div>
         <div class="title-1">{{$post->title}}</div>
      </div>
   </div>
</div>
@endforeach



@foreach($posts as $post)

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
   <div>
      <img src="images\{{$post->image_path}}" width="700px" halt="">

   </div>
   <div>
      <h2 class="text-gray-700 font-bold text-5xl pb-4">
         {{$post->title}}
      </h2>

      <span class="text-gray-500">
         By <span class="font-bold italic text-gray-800">{{$post->user->name}}
         </span>, Created on{{date('jS M Y', strtotime($post->updated_at))}}
      </span>

      <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
         {{$post->description}}
         {{Str::limit($post->description,20)}}
      </p>

      <a href="/blog/{{$post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4
                 px-8 rounded-3xl">
         Keep Reading
      </a>

      @if(isset(Auth::user()->id) && Auth::user()->id ==
      $post->user_id)
      <span class="float-right">
         <a href="/blog/{{$post->slug}}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 
                  border-b-2">
            Edit
         </a>
      </span>
      <span class="float-right">
         <form action="/blog/{{ $post->slug }}" method="POST">
            @csrf
            @method('delete')

            <button class="text-red-500 pr-3" type="submit">
               Delete
            </button>

         </form>
      </span>
      @endif
      @if($post->users()->where('user_id', Auth::id())->exists())
      <div class="pt-10 w-4/4 m-auto">
         <form action="{{ route('unfavorites', $post) }}" method="POST">
            @csrf
            <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger bg-red-500 uppercase bg-transparent text-gray-100
                   text-xs font-extrabold py-3 px-5 rounded-3xl">
         </form>
      </div>
      @else
      <div class="pt-10 w-4/4 m-auto">
         <form action="{{ route('favorites', $post) }}" method="POST">
            @csrf
            <input type="submit" value="&#xf164;いいね" class="fas btn btn-success bg-green-500 uppercase bg-transparent text-gray-100
                   text-xs font-extrabold py-3 px-5 rounded-3xl">
         </form>
      </div>
      @endif
   </div>
</div>


@endforeach

@endsection