
{{ Form::open() }}

  {{ Form::label('username', 'Username') }}
  {{ Form::text('username') }}

  {{ Form::label('password', 'Password')) }}
  {{ Form::password('password') }}

  {{ Form::label('remember_me', 'Remember Me') }}
  {{ Form::checkbox('remember_me') }}


  {{ Form::submit('Login') }}


{{ Form::close() }}