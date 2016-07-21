{{--
 * Author: Archie, Disono (webmonsph@gmail.com)
 * Website: www.webmons.com
 * License: Apache 2.0
--}}
@extends('admin.layout.master')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h3 class="page-header">Albums</h3>

                <div class="admin-container">
                    @if(count($albums))
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($albums as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>{{str_limit($row->description, 22)}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{url('admin/album/edit/' . $row->id)}}">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/album/upload/create/' . $row->id)}}">Upload Photos</a>
                                                </li>
                                                <li><a href="{{url('admin/ajax/album/destroy/' . $row->id)}}"
                                                       class="delete-data">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$albums->appends($request->all())->render()}}
                    @else
                        <h1 class="text-center">No albums.</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('modals.delete')
@endsection