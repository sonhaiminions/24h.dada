@if(session('key'))
    <h1>{{session('key')}}</h1>
@else
    <h1>session khong ton tai</h1>

@endif