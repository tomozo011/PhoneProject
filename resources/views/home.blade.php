@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form">
    <form action="/HikakuPhone/form_common" method="get">
        <button type="submit">比較開始</button>
    </form>
    <form action="/HikakuPhone/Mypage" method="get">
        <button type="submit">マイページ</button>
    </form>
</div>
@endsection
