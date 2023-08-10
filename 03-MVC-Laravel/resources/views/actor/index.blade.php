
@extends('layout/template')

@section('title','Actors')
    
@section('content')


<main>
    <h1>Actors</h1>
    <a href="{{url('actor/create')}}">Create Actor</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of birth</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
            <tr>
                <td> {{$actor->name}} </td>
                <td> {{$actor->date_of_birth}} </td>
                <td><a href={{url('actor/'.$actor->id.'/edit')}}>Edit</a></td>
                <td><a href={{url('actor/'.$actor->id.'/delete')}}>Delete</a></td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</main>
