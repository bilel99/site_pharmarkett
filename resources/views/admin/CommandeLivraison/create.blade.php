@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">

        <div>
            @include('admin.commandeLivraison.error')
        </div>

        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Création / Mise à jour</h3>
                </div><!-- /.box-header -->
                <!-- form start -->


                {!! Form::open(array('route'=>'admin.commandeLivraison.store')) !!}
                <div class="box-body">
                    <div class="form-group">


                        {!! Form::label('adresse', 'Adresse :') !!}
                        {!! Form::text('adresse', '', array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}

                        {!! Form::label('cp', 'CP :') !!}
                        {!! Form::text('cp', '', array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'cp :')) !!}

                        {!! Form::label('ville', 'Ville :') !!}
                        {!! Form::text('ville', '', array('class'=>'form-control', 'name'=>'ville', 'placeholder' => 'ville :')) !!}


                    </div>
                </div><!-- /.box-body -->


                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {!!  Form::close() !!}
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->


@stop
@section('footer')
    <!-- DATA TABES SCRIPT -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
@stop