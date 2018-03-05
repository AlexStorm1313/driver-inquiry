Name: {{ $inquiry->name }} <br>
Email: {{ $inquiry->email }} <br>
Phone: {{ $inquiry->phone }} <br>
<br>
Date: {{ $inquiry->date_time }} <br>
Private Car: @if($inquiry->private_car) Yes @else No @endif <br>
Comments: {{ $inquiry->comments }} <br>
Locations: <br>
@foreach($inquiry->locations as $location)
    {{ $location->index }} {{ $location->location}} <br>
@endforeach
