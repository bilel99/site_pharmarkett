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
                    <h3 class="box-title"><a class="btn btn-info glyphicon glyphicon-pencil" href="{{ URL::to('admin/commandeLivraison/create') }}"></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="datatable table table-bordered table-striped" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Adresse</th>
                            <th>CP</th>
                            <th>Ville</th>
                            <th>Deliver_at</th>

                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commande_livraison as $row)


                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->adresse }}</td>
                                <td>{{ $row->cp }}</td>
                                <td>{{ $row->ville }}</td>
                                <td>{{ $row->deliver_at }}</td>


                                <td>
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="modal" data-target="#myModal{{$row->id}}"></button>
                                </td>

                                <td>
                                    <p><a class="btn btn-warning glyphicon glyphicon-edit" href="{{route('admin.commandeLivraison.edit', $row->id)}}"></a></p>
                                </td>
                                

                            </tr>








                            <!-- Modal Confirmation de suppression -->
                            <div class="modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Commande Livraison n° {{$row->id}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Vous êtes sur le point de supprimer définitivement la livraison N° : {{$row->id}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::open(array('route' => array('admin.commandeLivraison.destroy', $row->id), 'method' => 'delete')) !!}
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

