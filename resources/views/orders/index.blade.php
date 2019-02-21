@extends('layouts.app')

@section('content')

    <!-- Bootstrap 樣板... -->

    <div class="panel-body">
        <!-- 顯示驗證錯誤 -->
    @include('common.errors')

    <!-- 新任務的表單 -->
        <form action="/order" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 任務名稱 -->

        </form>
    </div>

    <!-- 目前任務 -->
    @if (count($orders) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>

            <div class="panel-body"style="font-size:x-large ">
                <table class="table table-striped task-table">

                    <!-- 表頭 -->
                    <thead>
                    <th style="text-align:center">目前訂單</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($orders as $order)
                        <tr>
                            <!-- 任務名稱 -->
                            <td class="table-text">
                                <div>{{ $order->address}}</div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection