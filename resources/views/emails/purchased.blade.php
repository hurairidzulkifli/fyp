<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Email</title>
</head>
<body>

        <div style="text-align: center"><img src="{{ URL::to('img/qr-code.png') }}"
            width="300px" height="300px"></div>
     $qr = QrCode::format('png')->size(200)->generate('//http://127.0.0.1:8000/.com');
     Mail::send(
         'emails.purchased',
         [
             'time' => $post->created_at,
             'description' => $description,
             'qr' => $qr
         ],
         function ($m) use ($post) {
             $m->to($post->user->email, $post->user->name)
                 ->subject('Thank You for purchasing via Stripe!,Flash this email to the person in charge to get in!')
                 ->from('whatsup@example.com', 'WhatsUp!Admin');

         }
     );
</body>
</html>