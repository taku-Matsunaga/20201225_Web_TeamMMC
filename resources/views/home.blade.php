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

                    {{-- {{ __('You are logged in!') }} --}}
                    <a href='{{ asset('/list') }}'>アルバムを見る</a>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <button><a href='{{ asset('/list') }}'>リストに戻る</a></button>
    </div>
</div>
@endsection
