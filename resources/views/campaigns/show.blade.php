@extends('layouts.app')

@section('content')

    <h1>Campaigns Here</h1>

    @foreach ($campaigns as $campaign)
        <div>
            {{$campaign->name}}
        </div>
    @endforeach


    <h3>Add a New Campaign</h3>

    <form method="POST" action="/campaigns/store">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <textarea id="name" name="name" class="form-control">{{ old('body') }}</textarea>

            <textarea id="default_article_type" id="default_article_type" class="form-control"></textarea>
            {{--<textarea id="assigned_date" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="start_date" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="due_date" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="word_count" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="body" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="body" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="body" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="campaign_cost_structure" class="form-control">{{ old('body') }}</textarea>--}}

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Add campaign</button>

        </div>

    </form>
@stop

