@extends('layouts.app')

@section('content')
    <div class="container">
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
                <div class="col-md-8 col-lg-offset-2 singlepitch" id="block_1">
                    <div class="btnsingle">
                    <br>
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
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pitch/Brief</h4>
                </div>
                <div class="modal-body modalpitch">
                    <select id="type_pitch">
                        <option>Pitch</option>
                        <option>Brief</option>
                    </select>
                    <br>
                    <textarea rows="6" cols="70" id="content_pitch"></textarea>
                    <br>
                    <button class="btn btn-default" id="sendPitch" onclick="sendPitch()" data-dismiss="modal">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendPitch(){
            var type, content, html;
            type = $('#type_pitch').val();
            content = $('#content_pitch').val();
            html = $('#wrap_pitch_content').html();
            html = html + '<div class="col-md-8 col-lg-offset-2">TYPE : '+type+'<br>Content :'+content+'</div>';
            $('#wrap_pitch_content').html(html);
        }

        function deletePitch(id){
            $('#block_'+id).hide();
        }

        function updatepitch(id){

            var cancel_html, content;
            content = $('#content_pitch_wrap').html();
            cancel_html =  $('#block_'+id).html();

            $('#block_'+id).html("<div class='updateblock row'><select id='update_type'>" +
                    "<option value='Pitch' class='Pitch'>Pitch</option>" +
                    "<option value='Pitch' class='Pitch'>Brief</option></select><br><textarea rows='6' cols='70' id='update_content'>"+content+"</textarea><br><button class='btn btn-default' onclick='update_pitch(1)'>Save</button><button class='btn btn-default' onclick='cancel_pitch(1,'"+cancel_html+"')'>Cancel</button></div>");
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
