@extends('admin.layout.admin')

@section('header')
    <!-- DATA TABLES -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="row">

        <div>
            @if (Session::has('flash_message'))
                <div class="alert alert-success" role="alert">
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
        </div>

        <div class="col-xs-12">

            <div>
                <div class="box-header">
                    <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('admin/commande/create') }}"></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="datatable table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>nom de l'utilisateur</th>
                            <th>nom de la devise</th>
                            <th>reference</th>
                            <th>commande_at</th>
                            <th>livraison_at</th>
                            <th>statut</th>
                            <th>montant</th>

                            <th></th>
                            <th></th>
                            <th></th>

                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commande as $row)


                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->user->nom }}</td>
                                <td>{{ $row->devise->nom }}</td>
                                <td>{{ $row->reference }}</td>
                                <td>{{ $row->commande_at }}</td>
                                <td>{{ $row->livraison_at }}</td>
                                <td>{{ $row->statut }}</td>
                                <td>{{ $row->montant }}</td>


                                <td>
                                    <button type="submit" class="btn btn-primary glyphicon " data-toggle="modal" data-target="#myExemplaire{{$row->id}}">Exemplaire</button>
                                </td>

                                <td>
                                    <button type="submit" class="btn btn-primary glyphicon " data-toggle="modal" data-target="#myLivraison{{$row->id}}">Livraison</button>
                                </td>

                                <td>
                                    <button type="submit" class="btn btn-primary glyphicon " data-toggle="modal" data-target="#myPaiement{{$row->id}}">Paiement</button>
                                </td>


                                
                                <td>
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#myModal{{$row->id}}"></button>
                                </td>

                                <td>
                                    <p><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('admin.commande.edit', $row->id)}}"></a></p>
                                </td>
                                

                            </tr>







                            @foreach($commande_exemplaire as $expl)
                            <!-- Modal Exemplaire -->
                            <div class="modal fade" id="myExemplaire{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Commande n° {{$row->reference}}</h4>
                                        </div>

                                        <div class="modal-body">
                                            <p>Produit exemplaire : {{$expl->exemplaire->reference}}</p>
                                            <p>Devise : {{$row->devise->nom}}</p>
                                            <p>Quantite : {{$row->tableExemplaire->quantite}}</p>
                                            <p>Montant : {{$row->tableExemplaire->montant}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <p>
                                                <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-cog" href="{{ URL::to('admin/commandeExemplaire') }}"></a></h3>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Fin Modal -->














                            <!-- Modal Livraison -->
                            <div class="modal fade" id="myLivraison{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Commande n° {{$row->reference}}</h4>
                                        </div>

                                        <div class="modal-body">
                                            <p>Adresse : {{$row->livraison->adresse}}</p>
                                            <p>CP : {{$row->livraison->cp}}</p>
                                            <p>Ville : {{$row->livraison->ville}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <p>
                                                <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-cog" href="{{ URL::to('admin/commandeLivraison') }}"></a></h3>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Fin Modal -->























                            <!-- Modal Paiement -->
                            <div class="modal fade" id="myPaiement{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Commande n° {{$row->reference}}</h4>
                                        </div>

                                        <div class="modal-body">
                                            <p>montant : {{$row->paiement->montant}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <p>
                                                <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-cog" href="{{ URL::to('admin/commandePaiement') }}"></a></h3>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Fin Modal -->


















                            <!-- Modal Confirmation de suppression -->
                            <div class="modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Commande n° {{$row->reference}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vous êtes sur le point de supprimer définitivement la commande : {{$row->reference}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(array('route' => array('admin.commande.destroy', $row->id), 'method' => 'delete')) !!}
                                            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash "></button>
                                            {!!  Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Fin Modal -->

                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
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

