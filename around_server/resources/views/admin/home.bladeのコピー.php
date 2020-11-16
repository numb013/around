@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <table style="margin: 0 auto";>
                @foreach ($nanpa_list as $key => $value) 
                    <tr>
                        <td>ジャンル : </td>
                        <td>{{ $value["place_name"] }}</td>

                        <td><a href="/admin/home?id={{ $value['id'] }}">編集</a></td>

                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
