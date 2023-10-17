@extends('layouts/app')

@section('content')


    <main>
        <h1 class="text-light text-center mt-5">Actors</h1>
        <section class="container d-table">
            <a href="{{ url('actor/create') }}" class="position-absloute top-0 ms-5 translate-middle btn btn-primary">Create
                Actor</a>

            <table class="table" style="opacity: 80%">
                <thead>
                    <tr>
                        {{-- <th scope="col"></th> --}}
                        <th scope="col">Name</th>
                        <th scope="col">Date of birth</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actors as $actor)
                        <tr class="align-middle">
                            {{-- <td><img class="img-responsive" src='{{ asset('images/' . $actor->imageActor) }} 'alt=""
                                    style='height: 10vh'></td> --}}
                            <td> {{ $actor->name }} </td>
                            <td> {{ $actor->date_of_birth }} </td>
                            <td>
                                <a  onclick="Livewire.emit('editActor',{{$actor->id}})" data-bs-toggle="modal" data-bs-target="#modalEditActor" class="btn btn-success mb-3">Edit</a>
                            </td>
                            <td>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <livewire:modal-edit/>
        </section>
    </main>
@endsection