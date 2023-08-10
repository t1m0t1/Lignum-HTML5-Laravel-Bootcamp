
@extends('layout/template')

@section('title','Create new Actor')
    
@section('content')
<main>
   @if ($errors -> any())
       <ul>
        @foreach ($errors as $error)
        <li> {{$error}} </li>
        @endforeach
       </ul>
   @endif

   <form action="{{url('actor')}}" method="POST">
    @csrf
        <label for="name">Name Actor</label>
        <input type="text" name="name" id="name" value="{{old('name')}}">
        <label for="dateActor">Fecha de Nacimiento</label>
        <input type="date" name="dateActor" id="dateActor" value="{{old('dateActor')}}">
        <button type="submit">Create</button>
    </form>

</main>
