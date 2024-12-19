<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Position Created Mail</title>
</head>

<body>

    <a href="{{route('jobPosition.show',$jobPosition->id)}}">
        <h3>Great Job!! You Have been created the {{ $jobPosition->title }} </h3>
    </a>

</body>

</html>
