<h1>hello, {{ $user->first_name }}</h1>

<p>
	Please click the following link to reset your account

	<a href="{{env('APP_URL')}}/reset/{{$user->email}}/{{$code}}">click here</a>

</p>
