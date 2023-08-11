
@extends('layout/template')

@section('title','Actors')
    
@section('content')


<main>
    <h1 class="text-light text-center">Actors</h1>
    <section class="container d-table">
        <a href="{{url('actor/create')}}" class="position-absloute top-0 end-0 translate-middle btn btn-primary">Create Actor</a>
        
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Date of birth</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
            <tr class="align-middle">
                <td><img class="img-responsive" src='{{ asset ('images/'.$actor->imageActor)}} 'alt="" style='height: 10vh'></td>
                <td> {{$actor->name}} </td>
                <td> {{$actor->date_of_birth}} </td>
                <td>
                    <a href={{url('actor/'.$actor->id.'/edit')}} class="btn btn-success me-3">Edit</a>
                </td>
                <td>
                    <form action="{{url('actor/'.$actor->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</section>
</main>
