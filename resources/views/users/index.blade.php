@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2> Users in the DB</h2>

                @foreach ($users as $user)
                <ul class="list-group">

                    <li>
                        {{ $user->username }}
                    </li>
                    <li>
                        {{$user->address}}
                    </li>
                    <li>
                        {{$user->city}}
                    </li>
                    <li>
                        {{$user->state}}
                    </li>
                    <li>
                        {{$user->zip}}
                    </li>

                </ul>

            @endforeach
        </div>
    </div>
@stop
