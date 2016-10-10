@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="block-recette">
                                <div class="content-recette">
                                    <strong>Titre</strong>
                                    <p>Info</p>
                                </div>
                                <div class="block-add" data-toggle="modal" data-target="#delete">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="block-add" style="height: 100px; background: gold" data-toggle="modal" data-target="#myModal">
                                <i class="glyphicon glyphicon-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array(
             'action' => 'CahierController@store',
             'method' => 'POST',
             'class' => 'form-horizontal'
             ))
             !!}

                {!! Form::text('title',null,  ['class' => 'form-control', 'placeholder'=>'Titre']) !!}
                {!! Form::text('info',null,  ['class' => 'form-control', 'placeholder'=>'Information']) !!}
                {!! Form::text('collab_email',null,  ['class' => 'form-control', 'placeholder'=>'Emails des collaborateurs']) !!}
                {!! Form::hidden('user_id', \Illuminate\Support\Facades\Auth::user()->id) !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Créer le cahier', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Êtes-vous sûr de vouloir supprimer ce recettage ?</h4>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default non" data-dismiss="modal">Non</a>
                <a href="{{ url('/cahier/delete/') }}" type="button" class="btn btn-default oui" data-dismiss="modal">Oui</a>
            </div>
        </div>
    </div>
</div>
@endsection
