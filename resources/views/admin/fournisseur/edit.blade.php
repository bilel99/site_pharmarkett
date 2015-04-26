@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">

        <div>
            @include('admin.fournisseur.error')
        </div>

        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Création / Mise à jour</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                {!! Form::open(['method' => 'put', 'url' => route('admin.fournisseur.update', $fournisseur->id)]) !!}

                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('siret', 'siret :') !!}
                        {!! Form::text('siret', $fournisseur->siret, array('class'=>'form-control', 'name'=>'siret', 'placeholder' => 'siret :')) !!}

                        {!! Form::label('nom', 'nom :') !!}
                        {!! Form::text('nom', $fournisseur->nom, array('class'=>'form-control', 'name'=>'nom', 'placeholder' => 'nom :')) !!}

                        {!! Form::label('adresse', 'adresse :') !!}
                        {!! Form::text('adresse', $fournisseur->adresse, array('class'=>'form-control', 'name'=>'adresse', 'placeholder' => 'adresse :')) !!}

                        {!! Form::label('cp', 'cp :') !!}
                        {!! Form::text('cp', $fournisseur->cp, array('class'=>'form-control', 'name'=>'cp', 'placeholder' => 'code postal :')) !!}

                        {!! Form::label('ville', 'ville :') !!}
                        {!! Form::text('ville', $fournisseur->ville, array('class'=>'form-control', 'name'=>'ville', 'placeholder' => 'ville :')) !!}

                        {!! Form::label('phone', 'phone :') !!}
                        {!! Form::text('phone', $fournisseur->phone, array('class'=>'form-control', 'name'=>'phone', 'placeholder' => 'phone :')) !!}

                        {!! Form::label('contact', 'contact :') !!}
                        {!! Form::text('contact', $fournisseur->contact, array('class'=>'form-control', 'name'=>'contact', 'placeholder' => 'contact :')) !!}

                        {!! Form::label('commentaire', 'commentaire :') !!}
                        {!! Form::textarea('commentaire', $fournisseur->commentaire, array('class'=>'form-control', 'name'=>'commentaire', 'placeholder' => 'commentaire :')) !!}
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