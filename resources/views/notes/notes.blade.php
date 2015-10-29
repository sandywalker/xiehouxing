                   
@foreach($notes as $note)
<div class="item">
    <div class="subject">
        <div class="subject-pic">
            <a href="/notes/{{$note->id}}" target="_blank"><img src="{{asset($note->thumb)}}" alt=""/></a>
        </div>
        {{-- <h3 ></h3> --}}
        <br>
        {{-- <p><span class="text-gray">标签：文化 档案：文书档案</span></p> --}}
        <p class="subject-title"><a href="#"> <span class="text-main"> [{{$note->place}}]</span> {{$note->title}}  </a></p>
        <div class="item-footer">
            <div class="pull-right">
                <a href="#"><i class="glyphicon glyphicon-heart"></i></a> {{$note->hits}} &nbsp;&nbsp;&nbsp;
                <a href="#"><i class="glyphicon glyphicon-comment"></i></a> {{$note->cmts}}&nbsp;&nbsp;&nbsp;
            </div>
            <div class=" item-avatar"><img src="{{asset($note->user->avatar)}}" alt=""> {{$note->user->name}}</div>
        </div>
    </div>

</div>
@endforeach
