@extends('layouts.default')

@section('content')
    <div id="form_container">
        <div id="title"><h2>Lorem Ipsum Generator</h2></div>
    </div>
    <div id="form_container">
        {!! Form::open(array('url' => 'loremipsum')) !!}
        <div id="leftcol">
            <div class="howMany"><br><br>
                <div>{!!Form::label('howMany', 'Select a number')!!}</div>
                {!! Form::select('howMany', array(1 =>1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10), 4) !!}
            </div>
            <br>
            <div>{!!Form::label('generate', 'Generate')!!}</div>
            <div id="checkOptions">
                <div>
                    {!! Form::radio('generate', 'Words',true)!!}
                    {!!Form::label('ckWords', 'Words')!!}
                </div>
                <div>
                    {!! Form::radio('generate', 'Sentences')!!}
                    {!!Form::label('ckSentence', 'Sentences')!!}
                </div>
                <div>
                    {!! Form::radio('generate', 'Paragraphs')!!}
                    {!!Form::label('ckParagraph', 'Paragraphs')!!}
                </div>
                <div>
                    {!! Form::radio('generate', 'Lists')!!}
                    {!!Form::label('ckList', 'Lists')!!}
                </div>
            </div>
            <br>
            <div>{!!Form::label('options', 'Options')!!}</div>
            <div id="checkOptions">
                <div>{!!Form::checkbox('ckArticle');    !!}
                    {!!Form::label('ckWords', 'Add article and paragraph tags')!!}
                </div>
                <div>{!!Form::checkbox('ckItalic' );    !!}
                    {!!Form::label('ckSentence', 'Add italic tags(<i>)')!!}
                </div>
                 <div>{!!Form::checkbox('ckBold' );    !!}
                    {!!Form::label('ckSentenceList', 'Add bold tags (<b>)')!!}
                </div>
            </div>
            <br>
            <div>{!!Form::submit('Generate')!!}</div>
            <br>
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div> <!-- End Left Column -->
        <div id="rightcol">
             <br>
            <div id="textarea">
                {!!Form::textarea('lorimgenerated',$result , ['size' => '82x18'])   !!}
            </div>
             <br>
        </div><!-- End Right Column -->
        {!! Form::close() !!}
    </div><!-- End wrapper -->
    <br><br>
@stop
