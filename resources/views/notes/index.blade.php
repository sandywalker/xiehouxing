@extends('def')
@section('id','note')
@section('title','游记')
@section('content')
    
<div class="note-banner">
           <img src="/img/banner-note.jpg" alt="" class="full-width"/>
       </div>
        <br/>

    <section class="container">
        <div class="row">
            <div class="col-md-12 section-title">
                <h3 class="note-list-title">超人气游记</h3>
            </div>
        </div>

        <div class="row">
                  @foreach($topNotes as $tnote)
                    <div class="col-md-3  col-xs-6 ">
                        <div class="travel-notes">
                            <div class="travel-notes-border"></div>
                            <div class="avatar"><img src="{{asset($tnote->user->avatar)}}" alt=""></div>
                            <a href="/notes/{{$tnote->id}}" target="_blank"><img src="{{asset($tnote->thumb)}}" alt=""></a>
                            <h5>{{$tnote->title}}</h5>
                            <p class="summary"><span>{{$tnote->created_at}}</span> &nbsp;&nbsp; <span> {{$tnote->hits}} 次浏览</span></p>
                            <p class="summary"> {{$tnote->place}}</p>
                        </div>
                    </div>
                @endforeach
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="adv">
                    <img src="/img/adv-banner1.jpg" alt=""/>
                </div>
            </div>
        </div>
    </section>

        <br/>

    <section class="container note-list">
        <div class="row">
            <div class="col-md-12 section-title">
                <h3 class="note-list-title">目的地</h3>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-md-12 ">
                <div class="note-filter">
                    <a href="#" class="btn btn-warning pull-right"> <i class="glyphicon glyphicon-edit"></i> 写游记</a>

                    <a href="#" class="link-filter">周 边</a>
                    <a href="#"  class="link-filter">国 内</a>
                    <a href="#" class="link-filter">国 际</a>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="subject-container" id="noteContainer">

                </div>
                <div class="clearfix"></div>
                <p>&nbsp;</p> 
                <div class="text-center">
                        <a href="#" id="btnMoreNotes" class="btn btn-lg btn-info" >显示更多...</a>
                </div>

            </div>
        </div>
    </section>
    <br/>
    <br/>
    <br/>
    		

@endsection

@section('js')
    
    
    <script>
        (function(){

            var $notesContainer = $('#noteContainer');
            var $btnMoreNotes = $('#btnMoreNotes');
            var notePage = 1;

            // $notesContainer.masonry({
            //         itemSelector : '.item'
            // })


            function loadNotes(page){
                $.ajax({
                    url:'/notes/notes',
                    dataType:'html',
                    data:{page:page},
                    success:function(html){
                        if (!html.length){
                            return;
                        }
                        $html =  $(html);
                        $html.appendTo($notesContainer);
                        window.getComputedStyle($html[0]).opacity;
                        $html.addClass('active');
                    }
                });
            }

            loadNotes(notePage);

            $btnMoreNotes.on('click',function(e){
                e.preventDefault();
                var $this = $(this);
                loadNotes(++notePage);
            });


        })();
    </script>
@endsection