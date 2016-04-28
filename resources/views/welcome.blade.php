@extends('master')
@section('head')
  <style>
    body{
      width: 100%;
      height: 100%;
    }
    #panel1{
      background-color: #2ecc71;
      color: white;
      height: auto;
      padding: 50px;
    }
    #panel2{
      background-color: #3498db;
      color: white;
      height: auto;
      padding: 50px;
    }
    #panel3{
      background-color: #34495e;
      color: white;
      height: auto;
      padding: 50px;
    }
    #headpanel{
      background-color: #bdc3c7;
      color: #2c3e50;
      height: auto;
      padding: 30px;
      text-align: center;
    }
  </style>
@stop
@section('content')
  <div class="container-fluid">
    <div class="row" id='headpanel'>
      <p style="font-size: 50px;">WELCOME TO TOKOKU.COM</p>
      <h2>Chose Panel you want to Access...</h2>
    </div>
    <div class="row">
      <a href="{{url('admin')}}">
        <div id="panel1" align="center" class='col-md-4'>
          <h1>Admin</h1>
          <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Animum autem reliquis rebus ita perfecit, ut corpus; Sequitur disserendi ratio cognitioque naturae; Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Duo Reges: constructio interrete. An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? Sed tamen est aliquid, quod nobis non liceat, liceat illis.
          </p>
        </div>
      </a>
      <a href="{{url('user')}}">
        <div id="panel2" align="center" class='col-md-4'>
          <h1>User</h1>
          <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Animum autem reliquis rebus ita perfecit, ut corpus; Sequitur disserendi ratio cognitioque naturae; Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Duo Reges: constructio interrete. An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? Sed tamen est aliquid, quod nobis non liceat, liceat illis.
          </p>
        </div>
      </a>
      <a href="#guest">
        <div id="panel3" align="center" class='col-md-4'>
          <h1>Home Page</h1>
          <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Animum autem reliquis rebus ita perfecit, ut corpus; Sequitur disserendi ratio cognitioque naturae; Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Duo Reges: constructio interrete. An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? Sed tamen est aliquid, quod nobis non liceat, liceat illis.
          </p>
        </div>
      </a>
    </div>
  </div>
@stop
