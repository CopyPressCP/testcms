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


        <form method="POST" action="/campaigns/store" id="add_campaign_form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            Name : <input type="text" id="name" name="name" class="form-control" placeholder="Name of the Campaign"></input>
        </div>

        <div class="form-group">
            <input type="hidden" id="client_id" value="">
            Client : <input type="text" id="client" class="typeahead form-control" placeholder="Client">
            {{--<select type="text" id="client" name="client" class="form-control">--}}
                        {{--@foreach($all_clients as $client)--}}
                            {{--<option>--}}
                                {{--{{$client->client_id}} | {{$client->first_name}} {{$client->last_name}}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
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
        @if (count($errors))

            <ul>@foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>

        @endif

    <script> $(function () {
            $('#assigned_date, #start_date, #due_date').each(function() {
                $(this).datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd'
                });
            });
        });

        var path = "{{ route('/clients_auto_complete') }}";
        $('#client').typeahead({
            minLength: 2,
            highlight: true,
//            hint: true,
            source: function (query, process) {
                clients=[];
                map = {};
                 $.get(path, { query: query }, function (data) {
                    $.each(data, function(i, client){
                        map[client.first_name] = client;
                        clients.push(client.first_name);
                    });
                     process(clients);
                     });
            },
            updater: function(item) {
                $('#client').html(map[item].client_id+" | "+ map[item].first_name);
                return item;
            }
        });

        $(document).ready(function() {
            $('#add_campaign_form').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        validators: {
                            stringLength: {
                                min: 2,
                            },
                            notEmpty: {
                                message: 'Please supply your first name'
                            }
                        }
                    },

                    comment: {
                        validators: {
                            stringLength: {
                                min: 10,
                                max: 200,
                                message:'Please enter at least 10 characters and no more than 200'
                            },
                            notEmpty: {
                                message: 'Please supply a description of your project'
                            }
                        }
                    }
                }
            })
                    .on('success.form.bv', function(e) {
                        $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                        $('#contact_form').data('bootstrapValidator').resetForm();

                        // Prevent form submission
                        e.preventDefault();

                        // Get the form instance
                        var $form = $(e.target);

                        // Get the BootstrapValidator instance
                        var bv = $form.data('bootstrapValidator');

                        // Use Ajax to submit form data
                        $.post($form.attr('action'), $form.serialize(), function(result) {
                            console.log(result);
                        }, 'json');
                    });
        });


    </script>


@stop


