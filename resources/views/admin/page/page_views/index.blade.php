{{--
 * @author      Archie Disono (webmonsph@gmail.com)
 * @link        https://github.com/disono/Laravel-Template
 * @license     https://github.com/disono/Laravel-Template/blob/master/LICENSE
 * @copyright   Webmons Development Studio
--}}

@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid shadow-sm p-3 bg-white">
        <div class="row">
            <div class="col">
                <h3>{{ $view_title }}</h3>
                <hr>
                @include('admin.page.menu')
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <form method="get" action="{{ route('admin.page.view') }}" id="frmTableFilter">
                    <input type="submit" style="display: none;">

                    @include('vendor.app.toolbar')

                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead class="table-borderless">
                            <tr>
                                <th>#</th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" name="page_name"
                                           placeholder="Page Name" value="{{ $request->get('page_name') }}">
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" name="http_referrer"
                                           placeholder="Referrer" value="{{ $request->get('http_referrer') }}">
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" name="current_url"
                                           placeholder="URL" value="{{ $request->get('current_url') }}">
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" name="ip_address"
                                           placeholder="IP" value="{{ $request->get('ip_address') }}">
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" name="platform"
                                           placeholder="OS/Platform" value="{{ $request->get('platform') }}">
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" name="browser"
                                           placeholder="Browser" value="{{ $request->get('browser') }}">
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm date-picker-no-future"
                                           name="created_at"
                                           data-form-submit="#frmTableFilter"
                                           placeholder="Date" value="{{ $request->get('created_at') }}">
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($page_views as $row)
                                <tr id="parent_tr_{{$row->id}}">
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->page_name }}</td>
                                    <td>{{ $row->http_referrer }}</td>
                                    <td>{{ $row->current_url }}</td>
                                    <td>{{ $row->ip_address }}</td>
                                    <td>{{ $row->platform }}</td>
                                    <td>{{ $row->browser }}</td>
                                    <td>{{ humanDate($row->created_at) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>

                @include('vendor.app.pagination', ['_lists' => $page_views])
            </div>
        </div>
    </div>
@endsection