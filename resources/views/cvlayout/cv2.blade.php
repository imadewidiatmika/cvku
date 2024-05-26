<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Template Resume</title>
    <link rel="stylesheet" type="text/css" href="../css/sheets-of-paper-a4.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js" integrity="sha512-vNrhFyg0jANLJzCuvgtlfTuPR21gf5Uq1uuSs/EcBfVOz6oAHmjqfyPoB5rc9iWGSnVE41iuQU4jmpXMyhBrsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: Georgia;
        }

        h1{
            text-transform: uppercase;
            font-weight: bolder;
            font-size: 15px;
        }
        
        section{
            margin-top: 15px;
        }

        h3{
            text-transform: capitalize;
            font-weight: bolder;
            font-size: 12px;
        }

        h2{
            font-weight: bolder;
            font-size: 12px;
        }

        p{
            font-size: 11px;
        }

        li{
            font-size: 11px;
        }

    </style>
</head>
<body class="document">
<div class="page" id="page">
<header>
    <h1>{{ $user->name }}</h1>
    <h5>{{ $user->profesion }}</h5>
    <p>
        @if(!empty($user->address)) {{ $user->address }} @endif
        @if(!empty($user->phoneNum)) @if(!empty($user->address)) | @endif {{ $user->phoneNum }} @endif
        @if(!empty($user->email)) @if(!empty($user->address) || !empty($user->phoneNum)) | @endif {{ $user->email }} @endif
        @if(!empty($user->linked)) @if(!empty($user->address) || !empty($user->phoneNum) || !empty($user->email)) | @endif {{ $user->linked }} @endif
        @if(!empty($user->portfolio)) @if(!empty($user->address) || !empty($user->phoneNum) || !empty($user->email) || !empty($user->linked)) | @endif {{ $user->portfolio }} @endif
    </p>    
</header>

<section id="ringkasan">
    <center><h2>RINGKASAN</h2></center>
    <hr>
    <p style="margin-top:-10px;">{!! $user->desc !!} </p>
</section>

@if($experiences->isNotEmpty())
<section id="pengalaman">
    <h2>PENGALAMAN PRIBADIKU</h2>
    <hr>
    @foreach ($experiences as $experience)
        <p style="font-weight: bold">{{ $experience->company }} - {{ $experience->locationCompany }}</p>
        <p>{{ $experience->position }} ({{ $experience->startMonthCompany }} {{ $experience->startYearCompany }} - {{ $experience->endMonthCompany ? $experience->endMonthCompany.' '.$experience->endYearCompany : $experience->isActiveCompany }}) </p>
        {!! $experience->portfolioWork !!}
    @endforeach
</section>
@endif


@if($educations->isNotEmpty())
<section id="pendidikan">
    <h2>PENDIDIKAN</h2>
    <hr>
    @foreach ($educations as $education)
        <p style="font-weight: bold">{{ $education->school }} ({{ $education->startYearSchool }} - {{ $education->endYearSchool ? $education->endYearSchool: $experience->isActiveEducation  }})</p>
        <p>{{ $education->lastEdu }} {{ $education->major }} {{ $education->ipk ? '- IPK '.str_replace('.', ',', rtrim(rtrim(number_format($education->ipk, 2), '0'), '.')) : '' }}</p>
        @if(!empty($education->activities))
            {{ $education->lastEdu }} 
            {!! $education->activities !!}
        @endif
    @endforeach
</section>
@endif

@if($organizations->isNotEmpty())
<section id="pengalaman">
    <h2>ORGANISASI</h2>
    <hr>
    @foreach ($organizations as $organization)
        <p style="font-weight: bold">{{ $organization->organization }} - {{ $organization->locationorganization }}</p>
        <p>{{ $organization->positionorganization }} ({{ $organization->startMonthorganization }} {{ $organization->startYearorganization }} - {{ $organization->endMonthorganization ? $organization->endMonthorganization.' '.$organization->endYearorganization : $organization->isActiveOrganization }}) </p>
        {!! $organization->descorganization !!}
    @endforeach
</section>
@endif


@if($certificates->isNotEmpty())
<section id="sertifikat">
    <h2>SERTIFIKAT</h2>
    <hr>
    <ul>
        @foreach ($certificates as $certificate)
        <li>{{ $certificate->certificate }}</li>
    @endforeach
    </ul>
</section>
@endif

@if($languages->isNotEmpty())
<section id="bahasa">
    <h2>BAHASA</h2>
    <hr>
    <ul>
    @foreach ($languanges as $language)
        <li>{{ $language->language }}</p>
    @endforeach
    </ul>
</section>
@endif

@if($skills->isNotEmpty())
<section id="kemampuan">
    <h2>KEMAMPUAN</h2>
    <hr>
    <ul>
        @foreach ($skills as $skill)
                    <li>{{ $skill->skill }}</li>
        @endforeach
    </ul>
</section>
@endif
</div>

</body>
</html>
