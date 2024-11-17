@php
    use Knuckles\Scribe\Tools\WritingUtils as u;
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{!! $metadata['title'] !!}</title>

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{!! $assetPathPrefix !!}css/theme-default.style.css" media="screen">
    <link rel="stylesheet" href="{!! $assetPathPrefix !!}css/theme-default.print.css" media="print">

    <script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/lodash.js/4.17.21/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/styles/github-dark.min.css">
    <script src="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/highlight.min.js"></script>
    <script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/languages/javascript.min.js"></script>
    <script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/languages/php.min.js"></script>
    <script src="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/languages/python.min.js"></script>
    <script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/languages/http.min.js"></script>
    <script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/highlight.js/11.4.0/languages/bash.min.js"></script>

    <script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/jets/0.14.1/jets.min.js"></script>

@if(isset($metadata['example_languages']))
    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
        @foreach($metadata['example_languages'] as $lang)
            body .content .{{ $lang }}-example code { display: none; }
        @endforeach
    </style>
@endif

@if($tryItOut['enabled'] ?? true)
    <script>
        var tryItOutBaseUrl = "{!! $tryItOut['base_url'] ?? config('app.url') !!}";
        var useCsrf = Boolean({!! $tryItOut['use_csrf'] ?? null !!});
        var csrfUrl = "{!! $tryItOut['csrf_url'] ?? null !!}";
    </script>
    <script src="{{ u::getVersionedAsset($assetPathPrefix.'js/tryitout.js') }}"></script>
@endif

    <script src="{{ u::getVersionedAsset($assetPathPrefix.'js/theme-default.js') }}"></script>
    <script src="{{ u::getVersionedAsset($assetPathPrefix.'js/highlightjs-curl.dist.curl.min.js') }}"></script>

</head>

<body data-languages="{{ json_encode($metadata['example_languages'] ?? []) }}">

@include("scribe::themes.default.sidebar")

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        {!! $intro !!}

        {!! $auth !!}

        @include("scribe::themes.default.groups")

        {!! $append !!}
    </div>
    <div class="dark-box">
        @if(isset($metadata['example_languages']))
            <div class="lang-selector">
                @foreach($metadata['example_languages'] as $name => $lang)
                    @php if (is_numeric($name)) $name = $lang; @endphp
                    <button type="button" class="lang-button" data-language-name="{{$lang}}">{{$name}}</button>
                @endforeach
            </div>
        @endif
    </div>
</div>
</body>
</html>
