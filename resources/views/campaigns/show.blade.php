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




        <label class="col-md-4 control-label">
            <h3>Add a New Campaign</h3>
        </label>
        <div>
        <form method="POST" action="/campaigns/store" id="add_campaign_form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <label class="col-md-4 control-label">Name</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
                    <input  id="name" name="name" placeholder="Campaign Name" class="form-control"  type="text">
                </div>
            </div>

            <label class="col-md-4 control-label">Client</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-align-left"></i></span>
                    <input type="hidden" id="client_id" value="">
                    <input  id="client" name="client" placeholder="Client Name" class="typeahead form-control"  type="text" value="">
                </div>
            </div>

            <label class="col-md-4 control-label">Default Article Type</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                    <input  id="default_article_type" name="default_article_type" placeholder="Default Article Type" class="form-control"  type="text">
                </div>
            </div>

            <label class="col-md-4 control-label">Assign Date</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input  id="assigned_date" name="assigned_date" placeholder="Assigned Date" class="form-control"  type="text">
                </div>
            </div>

            <label class="col-md-4 control-label">Start Date</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input  id="start_date" name="start_date" placeholder="Start Date" class="form-control"  type="text">
                </div>
            </div>

            <label class="col-md-4 control-label">Due Date</label>
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input  id="due_date" name="due_date" placeholder="Due Date" class="form-control"  type="text">
                </div>
            </div>

            <label class="col-md-4 control-label"></label>
            <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <button type="submit" class="btn btn-primary"> Add campaign</button>
            </div>
            </div>

        </form>
    </div>

        </div>

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
                }).on('changeDate', function (e) {
                    $(this).focus();
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
                $('#client').html(map[item].first_name);
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
                                message: 'Please enter a name for the Campaign'
                            }
                        }
                    },

                    assign_date: {
                        validators: {
                            date: {
                                format: 'YYYY-MM-DD',
                                message:'That is not a valid date, enter a valid date, please! '
                            },
                            notEmpty: {
                                message: 'Please supply a valid date for this Campaign'
                            }
                        }
                    },

                    start_date: {
                        validators: {
                            date: {
                                format: 'YYYY-MM-DD',
                                message:'That is not a valid date, enter a valid date, please! '
                            },
                            notEmpty: {
                                message: 'Please supply a valid date for this Campaign'
                            }
                        }
                    },

                    due_date: {
                        validators: {
                            date: {
                                format: 'YYYY-MM-DD',
                                message:'That is not a valid date, enter a valid date, please! '
                            },
                            notEmpty: {
                                message: 'Please supply a valid date for this Campaign'
                            }
                        }
                    }
                }
            })

        });


    </script>


@stop


