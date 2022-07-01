@extends('layouts.app')

@section('content')
    @if(Auth::check())
<div class="pt-15 w-4/5 m-auto">
   <a href="/tweet/create" class="bg-red-500 uppercase bg-transparent text-gray-100
       text-xs font-extrabold py-3 px-5 rounded-3xl">
      Tweet
   </a>
</div>
@endif
  </div>
  @foreach($tweets as $tweet)

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
   <div>
      <span class="text-gray-500">
         By <span class="font-bold italic text-gray-800">{{$tweet->user->name}}
         </span>, Created on{{date('jS M Y', strtotime($tweet->updated_at))}}
      </span>

      <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
         {{$tweet->description}}
      </p>
   </div>
</div>


@endforeach


@endsection