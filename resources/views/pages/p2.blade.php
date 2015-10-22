@extends('layouts.default')
<?php require('logicp2.php'); ?>
@section('content')
    <div id="form_container">
      <div id="title"><h2>Password Generator</h2></div>
    </div>
    <div id="form_container"> <!-- Begin Form_Container -->
        {!! Form::open(array('route' => 'p2')) !!}
        <div id="leftcol"> <!-- Left Column Begin -->
            <br><br>
            <div class="options">
                <div>{!!Form::label('minWords', 'Minimum Words')!!}</div>
                {!! Form::select('minWords', array(2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9), 4) !!}
            </div>
            <br>
            <div class="separator">
                <div>{!!Form::label('separator', 'Separator')!!}</div>
                {!! Form::select('separator', array('' =>'', '-' => '-', 'space' => '(Space)'), '') !!}
            </div>  
            <br>
            <div>{!!Form::label('options', 'Options')!!}</div><br>
            <div id="checkOptions">
                <div>{!!Form::checkbox('ckFirstLetterUppercase');    !!}
                    {!!Form::label('ckFirstLetterUppercase', 'Make First Letter Uppercase')!!}
                </div>
                <div>{!!Form::checkbox('ckAddNumber' );    !!}
                    {!!Form::label('ckAddNumber', 'Add randon number to the end')!!}
                </div>
                <div>{!!Form::checkbox('ckSpecialChar');    !!}
                    {!!Form::label('ckSpecialChar', 'Add (Random Special characters !@#$%^&*()')!!}
                </div>
            </div>
            <br><br>
            <div>{!!Form::submit('Generate Password')!!}</div>
            <br><br><br>
        </div> <!-- End of Left Col --> 
        <div id="rightcol"> <!-- Right Column Begin -->
            <div class="displayPassword">
                <div><h3>New xkcd Password</h3></div>
                <div class="password"><h2>{{ $newPassword }}</h2></div>
            </div>
            <div>
                <img class="displayed" src="images/password_strength.png" alt="xkcd Style Password" height="280" width="600">
            </div>
            <br>
        </div> <!--End of Right Col -->
        <!--</form> -->
        {!! Form::close() !!}
    </div> <!--End Form_Container -->
    <br><br>
@stop