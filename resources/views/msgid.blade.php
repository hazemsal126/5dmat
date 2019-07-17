<div class="msg_history">
    @foreach($data as $da)
        @if($da->user_id == 1)
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p>{{$da->message}}</p>
                    <span class="time_date"> {{$da->created_at->format('H:i:s')}}</span> </div>
            </div>
        @else
    <div class="incoming_msg">
        <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
        <div class="received_msg">
            <div class="received_withd_msg">
                <p>{{$da->message}}</p>
                <span class="time_date"> {{$da->created_at->format('H:i:s')}}</span> </div>
        </div>
    </div>
        @endif
        @endforeach

</div>
<div class="type_msg">
    <div class="input_msg_write">
        <input type="text" class="write_msg" id="msg{{$data[0]->session_id}}" placeholder="Type a message" />
        <button class="msg_send_btn" id="send{{$data[0]->session_id}}" pull-link="{{route('chatstore','admin')}}" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
    </div>
</div>

<script>
    $("#msg{{$data[0]->session_id}}").keypress(function(e) {
        if(e.which == 13) {
            $("#send{{$data[0]->session_id}}").click();
        }
    });

    $("#send{{$data[0]->session_id}}").click(function(){
        var url = $(this).attr('pull-link');
        var message=$('#msg{{$data[0]->session_id}}').val();
        var session_id="{{$data[0]->session_id}}";

        $.post(url,{
                _token: $('meta[name="csrf-token"]').attr('content'),
                message:message,
                session_id:session_id,
            } ,function () {
                $('#msg{{$data[0]->session_id}}').val('');
            }
            );
    });

</script>