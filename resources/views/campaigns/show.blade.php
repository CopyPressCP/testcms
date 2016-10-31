@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <div class="col-md-6 col-sm-6 col-xs-12">

        <h1>Campaigns</h1>

        @foreach ($campaigns as $campaign)
            <div>
            {{$campaign->name}}
            </div>
        @endforeach


        <h3>Add a New Campaign</h3>

        <form method="POST" action="/campaigns/store">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            Name : <input type="text" id="name" name="name" class="form-control">{{ old('name') }}</input>
        </div>

        <div class="form-group">
            Client : <select type="text" id="client" name="client" class="form-control">{{ old('client') }}</select>
        </div>

        <div class="form-group">
           Default Article Type: <input type="text" id="default_article_type" id="default_article_type" class="form-control"></input>
        </div>

        <div class="form-group">
            <div class="input-group date" id="assigned_date_picker_class">
               Assigned Date: <input type="text" id="assigned_date" name="assigned_date" class="form-control"/>{{ old('assigned_date') }}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group date" id="start_date_picker_class">
                Start Date: <input type="text" id="start_date" name="start_date" class="form-control"/>{{ old('start_date') }}
            </div>
        </div>

        <div class="form-group">
            <div class="input-group date" id="due_date_picker_class">
                Due Date: <input type="text" id="due_date" name="due_date" class="form-control"/>{{ old('due_date') }}
            </div>
        </div>

            {{--<textarea id="word_count" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="body" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="body" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="body" class="form-control">{{ old('body') }}</textarea>--}}
            {{--<textarea id="campaign_cost_structure" class="form-control">{{ old('body') }}</textarea>--}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Add campaign</button>
        </div>
    </div>

        </form>

    <script> $(function () {
            $('#assigned_date, #start_date, #due_date').each(function() {
                $(this).datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd'
                });
            });
        });
    </script>
@stop


