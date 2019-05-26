{{--
 * @author      Archie Disono (webmonsph@gmail.com)
 * @link        https://github.com/disono/Laravel-Template
 * @license     https://github.com/disono/Laravel-Template/blob/master/LICENSE
 * @copyright   Webmons Development Studio
--}}

@extends('admin.layouts.master')

@section('content')
     <div class="container-fluid shadow-sm p-3 bg-white">
        <div class="row mb-3">
            <div class="col">
                <h3>{{ $view_title }}</h3>
                <hr>
                @include('admin.settings.menu')
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('admin.auth.role.update') }}" method="post" v-on:submit.prevent="onFormUpload">
                    <input type="hidden" name="role_id" value="{{ $role->id }}">

                    @foreach($routes as $route)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="route_name[]"
                                   value="{{ $route->value }}"
                                   id="{{ $route->id }}" {{ frmIsChecked('route_name', $route->value, $authorizations) }}>
                            <label class="custom-control-label" for="{{ $route->id }}">{{ $route->name }}</label>
                        </div>
                    @endforeach

                    <button class="btn btn-primary mt-3" type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection