<p>Hola {{$llista->organitzador}},</p>

<p>has creat una llista de karaoke. Per poder gestionar-la has d'accedir mitjançant aquest enllaç:</p>

<p>{{url("/llista")}}/{{$llista->id}}/admin</p>

<p>En qualsevol moment pots veure les llistes que has creat accedint amb el teu email i recuperant la contrasenya:</p>

<p>{{url("/login")}}</p>

<p>Enjoy fieeeesta!</p>

<p style="color:blue">The Karaoke Team</p>
