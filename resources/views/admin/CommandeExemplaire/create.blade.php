@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">

        <div>
            @include('admin.commandeExemplaire.error')
        </div>

        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Création / Mise à jour</h3>
                </div><!-- /.box-header -->
                <!-- form start -->


                {!! Form::open(array('route'=>'admin.commandeExemplaire.store')) !!}
                <div class="box-body">
                    <div class="form-group">


                        {!! Form::label('exemplaire_id', 'Exemplaire :') !!}
                        {!! Form::select('exemplaire_id', $exemplaire, '', ['class'=>'form-control']) !!}


                        {!! Form::label('quantite', 'Quantite :') !!}
                        {!! Form::text('quantite', '', array('class'=>'form-control', 'name'=>'quantite', 'placeholder' => 'Quantite :')) !!}

                        {!! Form::label('montant', 'Montant :') !!}
                        {!! Form::text('montant', '', array('class'=>'form-control', 'name'=>'montant', 'placeholder' => 'Montant :')) !!}


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