<!-- Favicon -->


<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/settings/favicon/'.App\Models\Settings::where('status',1)->where('type',1)->first()->image  )}}" />

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.5') }}" />