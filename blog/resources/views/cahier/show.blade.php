@extends('layouts.app')

@section('content')
    <div class="container">
        <input type="hidden" value="{{$cahier->id}}" id="cahier_id">
        <div class="row" style="background: #FFFFFF; border: solid black">
            Titre: {{$cahier->title}}, info : {{$cahier->info}}

        </div>

        <div class="row" style="background: #FFFFFF; border: solid black">
            <div class="col-md-12"><strong>Pitch/Brief</strong></div>
            <div class="col-md-12">
                <div class="col-md-3 colrecette addrecette">
                    <div class="block-add" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
            </div>
            <div id="wrap_pitch_content">
                <div class="col-md-8 col-lg-offset-2" style="border: solid red" id="block_1">
                    <button onclick="deletePitch(1)">x</button><button onclick="updatepitch(1)">edit</button><br>
                    Texte :                  <div id="content_pitch_wrap">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <select id="type_pitch">
                        <option>Pitch</option>
                        <option>Brief</option>
                    </select>
                    <input type="text" id="content_pitch">
                    <button id="sendPitch" onclick="sendPitch()" data-dismiss="modal">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendPitch(){
            var type, content, html, cahier_id;
            cahier_id = $('#cahier_id').val();
            type = $('#type_pitch').val();
            content = $('#content_pitch').val();
            html = $('#wrap_pitch_content').html();
            html = html + '<div class="col-md-8 col-lg-offset-2" style="border: solid red">TYPE : '+type+'<br>Content :'+content+'</div>';
            $('#wrap_pitch_content').html(html);

            var dataT = {};
            dataT['cahier_id'] = cahier_id;
            dataT['type'] = type;
            dataT['content'] = content;
            var data = JSON.stringify(dataT);
            console.log(data);
            toJson =
            $.ajax({
                type: "POST",
                url: "http://localhost:7000/recette/Recettage/blog/public/pitch/store",
                data: data
            });

        }

        function deletePitch(id){
            $('#block_'+id).hide();
        }

        function updatepitch(id){

            var cancel_html, content;
            content = $('#content_pitch_wrap').html();
            cancel_html =  $('#block_'+id).html();
            $('#block_1').hide();

            $('#block_'+id).html("<select id='update_type'>" +
                    "<option value='Pitch' class='Pitch'>Pitch</option>" +
                    "<option value='Pitch' class='Pitch'>Brief</option></select><textarea id='update_content'>"+content+"</textarea><br><button onclick='update_pitch(1)'>save</button><button onclick='cancel_pitch(1,'"+cancel_html+ "')'>cancel</button>");
        }

        function cancel_pitch(id,cancel_html){


            console.log(cancel_html);
            $('#block_'+id).html(cancel_html);
        }

        function update_pitch(id){
            var type, content;
            type = $("#update_type").val();
            content = $("#update_content").val();

            $('#block_'+id).html("TYPE : "+type+" <button onclick='deletePitch(1)'>x</button><button onclick='updatepitch(1)'>edit</button><br>"+type+"<br>Content :"+content);
        }
    </script>
@endsection
