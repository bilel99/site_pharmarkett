@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">

        <div>
            @include('admin.commande.error')
        </div>

        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Création / Mise à jour</h3>
                </div><!-- /.box-header -->
                <!-- form start -->


                {!! Form::open(array('route'=>'admin.commande.store')) !!}
                <div class="box-body">
                    <div class="form-group">


                        {!! Form::label('exemplaire_id', 'exemplaire :') !!}
                        {!! Form::select('exemplaire_id', $exemplaire, '', ['class'=>'form-control']) !!}

                        {!! Form::label('livraison_id', 'livraison :') !!}
                        {!! Form::select('livraison_id', $livraison, '', ['class'=>'form-control']) !!}

                        {!! Form::label('paiement_id', 'paiement :') !!}
                        {!! Form::select('paiement_id', $paiement, '', ['class'=>'form-control']) !!}



                        {!! Form::label('user_id', 'user :') !!}
                        {!! Form::select('user_id', $user, '', ['class'=>'form-control']) !!}

                        {!! Form::label('devise_id', 'devise :') !!}
                        {!! Form::select('devise_id', $devise, '', ['class'=>'form-control']) !!}


                        {!! Form::label('reference', 'reference :') !!}
                        {!! Form::text('reference', '', array('class'=>'form-control', 'name'=>'reference', 'placeholder' => 'reference :')) !!}

                        {!! Form::label('commande_at', 'commande_at :') !!}
                        {!!Form::input('date', 'commande_at', null, ['class' => 'form-control', 'name'=>'commande_at', 'placeholder' => 'Date'])!!}

                        {!! Form::label('livraison_at', 'livraison_at :') !!}
                        {!!Form::input('date', 'livraison_at', null, ['class' => 'form-control', 'name'=>'livraison_at', 'placeholder' => 'Date'])!!}

                        {!! Form::label('statut', 'statut :') !!}
                        {!! Form::text('statut', '', array('class'=>'form-control', 'name'=>'statut', 'placeholder' => 'statut :')) !!}

                        {!! Form::label('montant', 'montant :') !!}
                        {!! Form::text('montant', '', array('class'=>'form-control', 'name'=>'montant', 'placeholder' => 'montant :')) !!}


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