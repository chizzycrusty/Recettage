@extends('layouts.app')

@section('content')
    <div class="container">

        <input type="hidden" value="{{$cahier->id}}" id="cahier_id">

        <div class="row titleshow">
            <h3>{{$cahier->title}}</h3>
            <h5>{{$cahier->info}}</h5>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Pitch/Brief</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                @foreach($pitchs as $pitch)
                    <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_{{$pitch->id}}">
                        <div id="pitch_content_{{$cahier->id}}">


                            <div id="content_pitch_wrap_{{$pitch->id}}">
                                <div class="btnsingle">
                                    <span style="float: left"><strong id="type_pitch_wrap_{{$pitch->id}}">{{$pitch->type}}</strong></span>
                                    <button class="btn btn-default btnedit" onclick="updatepitch({{$pitch->id}})">Edit</button>
                                    <button class="btn btn-default btndelete" onclick="deletePitch({{$pitch->id}})">X</button>
                                </div>
                                <span id="pitch_content_text_{{$pitch->id}}">{{$pitch->content}}</span></div>


                            <div class="pitch_form" id="pitch_form_{{$pitch->id}}">
                                <div class='updateblock row'>
                                    <select id='update_type_{{$pitch->id}}'>
                                        <option value='Pitch' class='Pitch'>Pitch</option>
                                        <option value='Brief' class='Pitch'>Brief</option>
                                        <option value="Brief Metier">Brief Metier</option>
                                    </select>
                                    <br>
                                    <textarea rows='6' cols='70' id='update_content_{{$pitch->id}}'></textarea>
                                    <br>
                                    <button class='btn btn-default oui' onclick='update_pitch({{$pitch->id}})'>Save</button>
                                    <button class='btn btn-default non' onclick='cancel_pitch({{$pitch->id}})'>Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Cahier des Charges</strong></h4>
                </div>
                <div id="wrap_cdc_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    @if($cdc == null)
                        {!! Form::open(array(
                            'action' => 'CDCController@store',
                             'method' => 'POST',
                             'files' => true,
                             'class' => 'form-horizontal'
             ))
             !!}
                            <input type="hidden" name="cahier_id" value="{{$cahier->id}}">
                            <input type="file" name="cdc">
                        {!! Form::submit('Soumettre le formulaire', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    @else
                        CDC PDF:<a target ="_blank" href="{{url('/').'/'.$cdc->filelocation}}">Cahier des charges</a><br>
                    @endif
                </div>
            </div>
        </div>
</div>


        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Objectifs</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModalObj">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_obj_content">
                @foreach($objectifs as $objetctif)
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_obj_{{$objetctif->id}}">
                    <div id="objectif_content_wrap_{{$objetctif->id}}">
                    <div class="btnsingle">
                        <span style="float: left"><strong >Objectif</strong></span>
                        <button class="btn btn-default btnedit" onclick="updateobjectif({{$objetctif->id}})">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deleteobjectif({{$objetctif->id}})">X</button>
                    </div>
                    <div id="obj_content_text_{{$objetctif->id}}">
                        {{$objetctif->content}}
                    </div>

                </div>
                    <div class="pitch_form" id="objectif_form_{{$objetctif->id}}">
                        <div class='updateblock row'>
                            <textarea rows='6' cols='70' id='update_content_obj_{{$objetctif->id}}'></textarea>
                            <br>
                            <button class='btn btn-default oui' onclick='update_obj({{$objetctif->id}})'>Save</button>
                            <button class='btn btn-default non' onclick='cancel_objectif({{$objetctif->id}})'>Cancel</button>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Equipes</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Client :</strong>
                    <div id="content_pitch_wrap">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    >>>>>>> 51e2afec04a2e5e1e6c7b48130d9906e79a06708

                    <strong>Projet :</strong>
                    <div id="content_pitch_wrap">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Outils</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Texte :</strong>
                    <div id="content_pitch_wrap">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Calendrier</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Upload Fichier</strong>

                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Mots de Passe</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>
                    <strong>Nom :</strong>
                    <br>
                    <strong>Password :</strong>
                    <div id="content_pitch_wrap">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Comptes Rendus</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Upload Fichier :</strong>

                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Mail Thread</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Upload Fichier</strong>

                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Gestion des risques</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Nom :</strong>
                    <br>
                    <strong>Niveau de risque</strong> <br>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <br>
                    <strong>Action:</strong>

                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Livrables</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Upload Fichier :</strong>

                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Débugage</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Nom :</strong>
                    <br>
                    <strong>Texte :</strong>
                    <div id="content_pitch_wrap">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
        </div>

        <div class="row pitchshow">
            <div class="col-md-12 marginshow">
                <div class="col-md-11">
                    <h4><strong>Recettage</strong></h4>
                </div>

                <div class="col-md-1 addshow">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>

            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                        <button class="btn btn-default btnedit" onclick="updatepitch(1)">Edit</button>
                        <button class="btn btn-default btndelete" onclick="deletePitch(1)">X</button>
                    </div>

                    <strong>Upload Fichier</strong>

                </div>
            </div>
        </div>

        <div class="row pitchshow end">
            <div class="col-md-12 pdf">
                <button class="btn btn-default oui">Imprimer le PDF</button>
            </div>
        </div>

    </div>

    {{-- Modals --}}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pitch/Brief</h4>
                </div>
                <div class="modal-body modalpitch">
                    <select id="type_pitch">
                        <option value='Pitch' class='Pitch'>Pitch</option>
                        <option value='Brief' class='Pitch'>Brief</option>
                        <option value="Brief Metier">Brief Metier</option>
                    </select>
                    <br>
                    <textarea rows="6" cols="70" id="content_pitch"></textarea>
                    <br>
                    <button class="btn btn-default" id="sendPitch" onclick="sendPitch()" data-dismiss="modal">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModalObj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Objectif</h4>
                </div>
                <div class="modal-body modalpitch">
                    <textarea rows="6" cols="70" id="content_obj"></textarea>
                    <br>
                    <button class="btn btn-default" id="sendObj" onclick="sendObj()" data-dismiss="modal">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}

    <script>
        function sendPitch(){
            var type, content, html, cahier_id;
            type = $('#type_pitch').val();
            content = $('#content_pitch').val();
            cahier_id = $('#cahier_id').val();

            var dataT = {};
            dataT['cahier_id'] = cahier_id;
            dataT['content'] = content;
            dataT['type'] = type;
            var data = JSON.stringify(dataT);
            $.ajax({
                type: "POST",
                url: "http://localhost:7000/recette/Recettage/blog/public/pitch/store",
                data: data,
                success : function () {
                    var newpost;
                    $.ajax({
                        type: "GET",
                        url: "http://localhost:7000/recette/Recettage/blog/public/pitch/last",
                        data: newpost,
                        success : function(newpost){
                            newpost = JSON.parse(newpost);
                            html = $('#wrap_pitch_content').html();

                            $('#wrap_pitch_content').html(html + "<div class='col-md-8 col-lg-offset-2 singlepitch' id='block_"+newpost['id']+"'>"+
                                    "<div id='pitch_content_"+newpost['id']+"''>"+
                                    "<div id'content_pitch_wrap_"+newpost['id']+"'>"+
                                    "<div class='btnsingle'>"+
                                    "<span style='float: left'><strong id='type_pitch_wrap_"+newpost['id']+"'>"+newpost.type+"</strong></span>"+
                                    "<button class='btn btn-default btnedit' onclick='updatepitch("+newpost['id']+")'>Edit</button>"+
                                    "<button class='btn btn-default btndelete' onclick='deletePitch("+newpost['id']+")'>X</button>"+
                                    "</div>"+
                                    "<span id='pitch_content_text_"+newpost['id']+"''>"+newpost['content']+"</span></div>"+
                                    "<div class='pitch_form' id='pitch_form_"+newpost['id']+"'>"+
                                    "<div class='updateblock row'>"+
                                    "<select id='update_type_"+newpost['id']+"'>"+
                                    "<option value='Pitch' class='Pitch'>Pitch</option>"+
                                    "<option value='Brief' class='Pitch'>Brief</option>"+
                                    "<option value='Brief Metier'>Brief Metier</option>"+
                                    "</select>"+
                                    "<br>"+
                                    "<textarea rows='6' cols='70' id='update_content_"+newpost['id']+"'></textarea>"+
                                    "<br>"+
                                    "<button class='btn btn-default oui' onclick='update_pitch("+newpost['id']+")'>Save</button>"+
                                    "<button class='btn btn-default non' onclick='cancel_pitch("+newpost['id']+")'>Cancel</button>"+
                                    "</div>"+
                                    "</div>"+
                                    "</div>"+
                                    "</div>"
                            )
                        }
                    });
                }
            });

        }

        function deletePitch(id){
            $('#block_'+id).hide();
            $.ajax({
                type: "GET",
                url: "http://localhost:7000/recette/Recettage/blog/public/pitch/destroy/"+id
            });

        }

        function updatepitch(id){
            $('#pitch_form_'+id).show();
            $('#content_pitch_wrap_'+id).hide();

        }

        function cancel_pitch(id){
            $('#pitch_form_'+id).hide();
            $('#content_pitch_wrap_'+id).show();
        }

        function update_pitch(id){
            $('#pitch_form_'+id).hide();
            var type, content, cahier_id;
            cahier_id = $('#cahier_id').val();
            type = $('#update_type_'+id).val();
            content = $('#update_content_'+id).val();
            $('#type_pitch_wrap_'+id).html(type);
            $('#pitch_content_text_'+id).html(content);
            $('#content_pitch_wrap_'+id).show();
            var dataT = {};
            dataT['cahier_id'] = cahier_id;
            dataT['type'] = type;
            dataT['content'] = content;
            dataT['pitch_id'] = id;
            var data = JSON.stringify(dataT);
            toJson =
                    $.ajax({
                        type: "PUT",
                        url: "http://localhost:7000/recette/Recettage/blog/public/pitch/update",
                        data: data
                    });
        }


        //PDF Script:

        function uploadCdc(){
            var cahier_id = $('#cahier_id').val();

            var fileinput = document.getElementById('pdf-input');
            console.log(fileinput);
            var myfiles = fileinput.files[0];
            console.log(myfiles);
            var data = new FormData();
            var i = 0;
            for (i = 0; i < myfiles.length; i++) {
                data.append('file' + i, myfiles[i]);
                data.append('cahier_id', cahier_id);
            }

            console.log(data);
            $.ajax({
                url: 'http://localhost:7000/recette/Recettage/blog/public/cdc/store',
                type: 'POST',
                contentType: false,
                data: data,
                processData: false,
                cache: false
            }).success(function(msg) {
console.log('trhoug')            });
        }
//objectuif script

        function sendObj(){
            var type, content, html, cahier_id;
            cahier_id = $('#cahier_id').val();
            content = $('#content_obj').val();
            var dataT = {};
            dataT['cahier_id'] = cahier_id;
            dataT['type'] = type;
            dataT['content'] = content;
            var data = JSON.stringify(dataT);
            $.ajax({
                type: "POST",
                url: "http://localhost:7000/recette/Recettage/blog/public/objectif/store",
                data: data,
                success : function () {
                    var newpost;
                    $.ajax({
                        type: "GET",
                        url: "http://localhost:7000/recette/Recettage/blog/public/objectif/last",
                        data: newpost,
                        success : function(newpost){
                            newpost = JSON.parse(newpost);
                            html = $('#wrap_obj_content').html();

                            $('#wrap_obj_content').html(html + "<div class='col-md-8 col-lg-offset-2 singlepitch' id='block_"+newpost['id']+"'>"+
                                    "<div id='objectif_content_wrap_"+newpost['id']+"''>"+
                                    "<div id'content_obj_wrap_"+newpost['id']+"'>"+
                                    "<div class='btnsingle'>"+
                                    "<span style='float: left'><strong id='type_pitch_wrap_"+newpost['id']+"'>Objectif </strong></span>"+
                                    "<button class='btn btn-default btnedit' onclick='updateobjectif("+newpost['id']+")'>Edit</button>"+
                                    "<button class='btn btn-default btndelete' onclick='deleteobjectif("+newpost['id']+")'>X</button>"+
                                    "</div>"+
                                    "<span id='obj_content_text_"+newpost['id']+"''>"+newpost['content']+"</span></div>"+
                                    "<div class='pitch_form' id='objectif_form_"+newpost['id']+"'>"+
                                    "<div class='updateblock row'>"+
                                    "<textarea rows='6' cols='70' id='update_content_obj_"+newpost['id']+"'></textarea>"+
                                    "<br>"+
                                    "<button class='btn btn-default oui' onclick='update_obj("+newpost['id']+")'>Save</button>"+
                                    "<button class='btn btn-default non' onclick='cancel_objectif("+newpost['id']+")'>Cancel</button>"+
                                    "</div>"+
                                    "</div>"+
                                    "</div>"+
                                    "</div>"
                            )
                        }
                    });
                }
            });
        }
        function updateobjectif(id){
            $('#objectif_form_'+id).show();
            $('#objectif_content_wrap_'+id).hide();

        }

        function update_obj(id){
            $('#objectif_form_'+id).hide();
            var content, cahier_id;
            cahier_id = $('#cahier_id').val();
            content = $('#update_content_obj_'+id).val();
            $('#obj_content_text_'+id).html(content);
            $('#objectif_content_wrap_'+id).show();
            var dataT = {};
            dataT['cahier_id'] = cahier_id;
            dataT['content'] = content;
            dataT['obj_id'] = id;
            var data = JSON.stringify(dataT);
            toJson =
                    $.ajax({
                        type: "PUT",
                        url: "http://localhost:7000/recette/Recettage/blog/public/objectif/update",
                        data: data
                    });
        }

        function cancel_objectif(id){
            $('#objectif_form_'+id).hide();
            $('#objectif_content_wrap_'+id).show();

        }

        function deleteobjectif(id){
            $('#block_obj_'+id).hide();
            $.ajax({
                type: "GET",
                url: "http://localhost:7000/recette/Recettage/blog/public/objectif/destroy/"+id
            });
        }


    </script>
@endsection
