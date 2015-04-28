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

                {!! Form::open(['method' => 'put', 'url' => route('admin.commande.update', $commande->id)]) !!}

                <div class="box-body">
                    <div class="form-group">


                        {!! Form::label('exemplaire_id', 'exemplaire :') !!}
                        {!! Form::select('exemplaire_id', $exemplaire, $commande->exemplaire_id, ['class'=>'form-control']) !!}

                        {!! Form::label('livraison_id', 'livraison :') !!}
                        {!! Form::select('livraison_id', $livraison, $commande->livraison_id, ['class'=>'form-control']) !!}

                        {!! Form::label('paiement_id', 'paiement :') !!}
                        {!! Form::select('paiement_id', $paiement, $commande->paiement_id, ['class'=>'form-control']) !!}



                        {!! Form::label('user_id', 'user :') !!}
                        {!! Form::select('user_id', $user, $commande->user_id, ['class'=>'form-control']) !!}

                        {!! Form::label('devise_id', 'devise :') !!}
                        {!! Form::select('devise_id', $devise, $commande->devise_id, ['class'=>'form-control']) !!}

                        <!--
                        {!! Form::label('reference', 'reference :') !!}
                        {!! Form::text('reference', $commande->reference, array('class'=>'form-control', 'name'=>'reference', 'placeholder' => 'reference :')) !!}
                        -->

                        {!! Form::label('commande_at', 'commande_at :') !!}
                        {!!Form::input('', 'commande_at', $commande->commande_at, ['class' => 'form-control', 'name'=>'commande_at'])!!}

                        {!! Form::label('livraison_at', 'livraison_at :') !!}
                        {!!Form::input('', 'livraison_at', $commande->livraison_at, ['class' => 'form-control', 'name'=>'livraison_at'])!!}

                        {!! Form::label('statut', 'statut :') !!}
                        {!! Form::text('statut', $commande->statut, array('class'=>'form-control', 'name'=>'statut', 'placeholder' => 'statut :')) !!}

                        {!! Form::label('montant', 'montant :') !!}
                        {!! Form::text('montant', $commande->montant, array('class'=>'form-control', 'name'=>'montant', 'placeholder' => 'montant :')) !!}
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