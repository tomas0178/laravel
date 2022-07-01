@extends('layouts.app')

@section('content')
  <div class="w-4/5 m-auto text-left">
      <div class="py-15">
          <h1 class="text-6xl">
              Creat tweet
          </h1>
      </div>
  </div>

@if($errors->any())
  <div class="w-4/5 m-auto">
      <ul>
           @foreach($errors->all() as $error)
             <li class="w-1/5 mg=4 text-gray-50 bg-red-700
                 rounded-2x py-4">
                  {{$error}}
             </li>
           @endforeach
      </ul>
  </div>
@endif

  <div class="w-4/5 m-auto pt-10">
    <form action="/tweet"
          method="POST"
          enctype="multipart/form-data">

            <textarea 
                name="description"
                placeholder="Description..."
                class="py-30 bg-transparent block border-b-3 w-full h-60
                text-xl outline-none"> 
            </textarea>


            <button
               type="submit"
               class="uppercase mt-15 bg-red-500 text-gray-100
               text-lg font-extrabold py-4 px-8 rounded-3xl">
               tweet
            </button>    
    </form>
  </div>

@endsection