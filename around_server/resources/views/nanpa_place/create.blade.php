<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @section('head')  
            @include('layouts.head')  
        @show 

    </head>
    <body>
        <div class="flex-center position-ref full-height" style="padding-bottom: 70px">
            <div class="content">
                @section('header')
                    @include('layouts.header')  
                @show
                <br>
                <div class="flex-center position-ref full-height">
                    <div class="title m-b-md">
                        登録完了
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
