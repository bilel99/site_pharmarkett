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
                    <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('admin/fournisseur/create') }}"></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="datatable table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>siret</th>
                            <th>nom</th>
                            <th>adresse</th>
                            <th>cp</th>
                            <th>ville</th>
                            <th>phone</th>
                            <th>contact</th>
                            <th>commentaire</th>
                            <th>added</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fournisseur as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->siret }}</td>
                                <td>{{ $row->nom }}</td>
                                <td>{{ $row->adresse }}</td>
                                <td>{{ $row->cp }}</td>
                                <td>{{ $row->ville }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->contact }}</td>
                                <td>{{ $row->commentaire }}</td>
                                <td>{{ $row->created_at  }}</td>


                                <!-- debut du formulaire -->
                                <td>
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#myModal{{$row->id}}"></button>
                                </td>

                                <td>
                                    <p><a class="btn btn-primary glyphicon glyphicon-edit" href="{{route('admin.fournisseur.edit', $row->id)}}"></a></p>
                                </td>
                                <!-- Fin du formulaire -->

                            </tr>


                            <!-- Modal Confirmation de suppression -->
                            <div class="modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Fournisseur n° {{$row->siret}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vous êtes sur le point de supprimer définitivement le Fournisseur : {{$row->nom}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(array('route' => array('admin.fournisseur.destroy', $row->id), 'method' => 'delete')) !!}
                                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash "></button>
                                            {!!  Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Fin Modal -->

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

