@section('links')
    <link rel="stylesheet" href="{{asset('css/dashboard_style.css')}}">
@endsection

@section('content')
    <div class="items-container">
        <div class="dashboard-item">
            <span class="single">Your Profile</span>
            <i class="fas fa-user-circle"></i>
            <a class="link" href="/profile/{{auth()->user()->id}}">More info</a>
        </div>
        <div class="dashboard-item">
            <span class="number">{{$students}}</span>
            <i class="fas fa-user-graduate"></i>
            <span>Total students</span>
            <a class="link" href="{{route('students')}}">More Info</a>
        </div>
        <div class="dashboard-item">
            <span class="number">{{$mentors}}</span>
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Total mentors</span>
            <a class="link" href="{{route('mentors')}}">More Info</a>
        </div>
        <div class="dashboard-item">
            <span class="number">{{$supervisors}}</span>
            <i class="fas fa-user-tie"></i>
            <span>Total supervisors</span>
            <a class="link" href="{{route('supervisors')}}">More Info</a>
        </div>
        <div class="dashboard-item">
            <span class="single">Payments</span>
            <i class="fas fa-money-check-alt"></i>
            <a class="link" href="#">More Info</a>
        </div>
    </div>
@endsection
