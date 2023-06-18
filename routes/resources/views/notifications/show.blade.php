@extends("layouts.app")

@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-center">
                <div class="card shadow-none">
                    <img src="assets/images/gallery/16.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Notification</h5>
                        <p class="card-text"><big>Dear</big> {{ Auth::user()->name }},
                            <br>We would like to inform you that <strong>{{ $notification->body }}</strong>. Please be advised that if the current
                            <br>threshold has been exceeded, you may want to consider creating a new scenario to handle the increased load.
                        </p>
                        <p>Thank you for your attention and prompt action.</p>
                    </div>
                    <div class="card-footer bg-white">
                        <small class="text-muted">Alert received {{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection