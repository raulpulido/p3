@extends('layouts.default')

@section('content')
    <div id="form_container">
        <div id="title"><h2>Random User Generator</h2></div>
    </div>
    <div id="form_container"><!-- Begin Form_Container -->
        {!! Form::open(array('url' => 'randomuser')) !!}
        <div id="leftcol">
            <div class="howMany"><br><br>
                <div>{!!Form::label('howMany', 'Select a number of users to generate')!!}</div>
                {!! Form::select('howMany', array(1 =>1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10), 4) !!}
            </div>
            <br>
            <div>{!!Form::submit('Generate Users')!!}</div>
            <br>
        </div> <!-- End Left Column -->
        @if($_SERVER['REQUEST_METHOD']=='POST') 
        <div id="rightcol">
             <br>

                <?php $totUsers=count($user["results"]); ?>
                @for ($i = 0; $i < $totUsers; $i++)
                    <div class="flip3D">
                        <div class="front">
                            <div>Picture:<img src=" {{ $user["results"][$i]["user"]["picture"]["large"] }}" alt="Users" height="142" width="242"></div>
                            <div>First Name: {{ $user["results"][$i]["user"]['name']["first"] }} </div>
                            <div>Last  Name: {{ $user["results"][$i]["user"]['name']["last"] }} </div>
                        </div> 
                        <div class="back">
                            <div>Email   : {{ $user["results"][$i]["user"]['email'] }} </div>
                            <div>Phone   : {{ $user["results"][$i]["user"]['phone'] }}</div>
                            <div>Cell    : {{ $user["results"][$i]["user"]['cell'] }}</div>
                            <div>Username: {{ $user["results"][$i]["user"]['username'] }}</div>
                            <div>Password: {{ $user["results"][$i]["user"]['password'] }}</div>
                        </div>
                    </div>
                @endfor
        </div><!-- End Right Column -->
        @endif
        {!! Form::close() !!}
    </div><!-- End Form_Container -->
    <br><br>
@stop
